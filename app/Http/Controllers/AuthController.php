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
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function register() {
        $data['programs'] = Program::all();
        return view('register', $data);
    }

    public function new_student() {
        return view('new_student');
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
            'student_status' => $req->input('student_status'),
            'years_stop' => $req->input('years_stop'),
            'name' => $req->input('name'),
            'nationality' => $req->input('nationality'),
            'address' => $req->input('address'),
            'mobile_number' => $req->input('mobile_number'),
            'program' => ($req->input('program') != null) ? $req->input('program') : 'No Program',
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

        return redirect()->route('show_credentials', [
            'student_id' => $data['student_id'],
            'password' => $data['password'],
        ]);
    }

    public function show_credentials($student_id, $password) {
        return view('authenticate', compact('student_id', 'password'));
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    }

    public function get_courses($program_id) {
        $courses = ProgramCourse::with(['course'])->where('program_id', $program_id)->get();

        return response()->json($courses);
    }

    public function profile_view() {
        $user_id = Auth::user()->student_id;
        $data['student'] = Student::with(['program_info'])->where('id', $user_id)->first();
        return view('profile.student_profile', $data);
    }

    private function generateStudentId() {
        $currentYear = Carbon::now()->format('Y');
        $lastStudent = User::whereYear('created_at', '=', Carbon::now()->year)->orderByDesc('id')->first();

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
