<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\ProgramCourse;
use App\Models\Program;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\User;
use App\Models\ApprovalLog;
use App\Models\SchoolYear;
use App\Models\Semester;
use App\Mail\Gmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function register() {
        $data['programs'] = Program::where('listing_status', 1)->get();
        $data['school_years'] = SchoolYear::all();
        $data['semesters'] = Semester::all();

        return view('register', $data);
    }

    public function new_student() {
        $data['programs'] = Program::where('listing_status', 1)->get();
        $data['school_years'] = SchoolYear::all();
        $data['semesters'] = Semester::all();

        return view('new_student', $data);
    }

    public function login_post(Request $req) {
        $credentials = [
            'email' => $req->id_number,
            'password' => $req->password,
        ];

        if(Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Login Successfull');
        }

        return back()->with('error', 'Invalid Password or Email, Please Try Again');
    }

    public function register_post(Request $req) {
        $filePath = $this->saveFileRecord($req->file('file_record'));
        $birthCert = $this->saveBirthCert($req->file('birth_cert'));
        $letterIntent = $this->saveLetterIntent($req->file('letter_intent'));
        $recLetter = $this->saveRecLetter($req->file('rec_letter'));

        $student = Student::create([
            'student_type' => $req->input('student_type'),
            'years_stop' => $req->input('years_stop'),
            'name' => $req->input('name'),
            'nationality' => $req->input('nationality'),
            'address' => $req->input('address'),
            'mobile_number' => $req->input('mobile_number'),
            'email_address' => $req->input('email_address'),
            'program' => ($req->input('program') != null) ? $req->input('program') : 'No Program',
            'school_year' => $req->input('school_year'),
            'semester' => $req->input('semester'),
            'file_record' => $filePath,
            'birth_cert' => $birthCert,
            'letter_intent' => $letterIntent,
            'rec_letter' => $recLetter,
            'payment_mode' => $req->input('payment_mode'),
        ]);

        $studentId = $student->id;
        $courses = $req->input('courses');

        if($courses !== null) {
            $this->saveStudentCourses($studentId, $courses);
        }

        $data['student_id'] = $this->generateStudentId();
        $data['password'] = 'pass';

        User::create([
            'name' => $req->input('name'),
            'user_type' => 'student',
            'email' => $data['student_id'],
            'student_id' => $studentId,
            'password' => Hash::make($data['password']),
        ]);

        ApprovalLog::create([
            'student_id' => $studentId,
            'status' => 1,
        ]);

        // Send login credentials via gmail
        $subject = 'Student Login Credentials';
        $emailData = [
            'student_id' => $data['student_id'],
            'password' => $data['password'],
            'name' => $req->input('name')
        ];
        Mail::to($req->input('email_address'))->send(new Gmail($emailData, $subject));

        return redirect()->route('show_credentials', [
            'student_id' => $data['student_id'],
            'password' => $data['password'],
        ]);
    }

    public function edit_post(Request $req) {
        $student = Student::find($req->input('id'));

        if ($student) {
            $updateData = [
                'student_type' => $req->input('student_type'),
                'years_stop' => $req->input('years_stop'),
                'name' => $req->input('name'),
                'nationality' => $req->input('nationality'),
                'address' => $req->input('address'),
                'mobile_number' => $req->input('mobile_number'),
                'program' => ($req->input('program') != null) ? $req->input('program') : 'No Program',
                'payment_mode' => $req->input('payment_mode'),
            ];

            if ($req->hasFile('file_record')) {
                $updateData['file_record'] = $this->saveFileRecord($req->file('file_record'));
            }

            if ($req->hasFile('birth_cert')) {
                $updateData['birth_cert'] = $this->saveBirthCert($req->file('birth_cert'));
            }

            if ($req->hasFile('letter_intent')) {
                $updateData['letter_intent'] = $this->saveLetterIntent($req->file('letter_intent'));
            }

            if ($req->hasFile('rec_letter')) {
                $updateData['rec_letter'] = $this->saveRecLetter($req->file('rec_letter'));
            }

            $student->update($updateData);
        }

        $studentId = $student->id;
        $courses = $req->input('courses');

        if($courses !== null) {
            $this->saveStudentCourses($studentId, $courses);
        }

        if($req->input('new_pass') !== null) {
            $data['student_id'] = $req->input('email');
            $data['password'] = $req->input('new_pass');

            $user = User::find(Auth::user()->id); // Replace $userId with the actual user ID you want to update

            if ($user) {
                $user->update([
                    'email' => $req->input('email'),
                    'password' => Hash::make($data['password']),
                ]);
            }
        }

        return redirect()->route('profile_view');
    }

    public function show_credentials($student_id, $password) {
        return view('authenticate', compact('student_id', 'password'));
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    }

    public function get_courses($program_id) {
        $courses = ProgramCourse::with('course')->whereHas('course', function ($query) {
                $query->where('listing_status', 1);
            })->where('program_id', $program_id)->get();

        return response()->json($courses);
    }

    public function profile_view() {
        $user_id = Auth::user()->student_id;
        $data['student'] = Student::with(['program_info', 'school_year_info', 'semester_info'])->where('id', $user_id)->first();
        return view('profile.student_profile', $data);
    }

    public function profile_edit() {
        $user_id = Auth::user()->student_id;
        $data['student'] = Student::with(['program_info'])->where('id', $user_id)->first();
        $data['programs'] = Program::all();
        $data['student_status'] = ApprovalLog::where('student_id', $user_id)->first();
        return view('profile.edit_profile', $data);
    }

    public function profile_update(Request $req) {

        $student = Student::find($req->input('id'));

        if ($student) {
            $updateData = [
                'name' => $req->input('name'),
                'nationality' => $req->input('nationality'),
                'address' => $req->input('address'),
                'mobile_number' => $req->input('mobile_number'),
            ];

            $student->update($updateData);
        }

        if($req->input('new_pass') !== null) {

            $data['password'] = $req->input('new_pass');

            $user = User::find(Auth::user()->id); // Replace $userId with the actual user ID you want to update

            if ($user) {
                $user->update([
                    'password' => Hash::make($data['password']),
                ]);
            }
        }

        return redirect()->route('profile_view');
    }

    public function get_notification() {

        if(Auth::user()->user_type === 'student') {
            $studentId = Auth::user()->student_id;
            $approvalLog = ApprovalLog::where('student_id', $studentId)->latest()->first();
            if($approvalLog) {
                return $approvalLog->notes;
            }
        }
        return 'No Notification';
    }

    private function generateStudentId() {

        $currentYear = Carbon::now()->format('Y');
        $lastStudent = User::whereYear('created_at', '=', Carbon::now()->year)->where('user_type', 'student')->orderByDesc('id')->first();
        
        if ($lastStudent) {
            $lastId = (int)explode('-', $lastStudent->email)[1];
            $newId = str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newId = '001';
        }

        return $currentYear . '-' . $newId;
    }

    private function generateRandomPassword() {
        $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $specialCharacters = '!@#$%^&*()_-+=<>?';

        $password = '';

        $password .= $letters[rand(0, strlen($letters) - 1)];
        $password .= $specialCharacters[rand(0, strlen($specialCharacters) - 1)];
        $password .= str_pad(mt_rand(1, 99999999), 6, '0', STR_PAD_LEFT);

        // Shuffle the password to randomize the positions of the letter and special character
        $passwordArray = str_split($password);
        shuffle($passwordArray);
        $password = implode('', $passwordArray);

        return $password;
    }

    private function saveFileRecord($file) {
        return Storage::putFile('file_records', $file);
    }

    private function saveBirthCert($file) {
        return Storage::putFile('birt_certs', $file);
    }

    private function saveLetterIntent($file) {
        return Storage::putFile('letter_intents', $file);
    }

    private function saveRecLetter($file) {
        return Storage::putFile('recco_letters', $file);
    }

    private function saveStudentCourses($studentId, $courseIds) {
        foreach ($courseIds as $courseId) {
            $course = Course::find($courseId);

            if ($course) {
                StudentCourse::create([
                    'student_id' => $studentId,
                    'course_id' => $courseId,
                ]);
            }
        }
    }

}
