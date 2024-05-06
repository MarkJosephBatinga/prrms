<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\ProgramCourse;
use App\Models\Program;
use App\Models\Course;
use App\Models\ApprovalLog;
use App\Models\User;
use App\Models\SchoolYear;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class RecordController extends Controller
{
    public function index() {

        if(Auth::user()->user_type == 'dean' && Auth::user()->staff_college == 'college of information technology'){
            $data['students'] = Student::with(['user_info', 'program_info'])->whereHas('program_info', function ($query) {$query->where('program_name', 'Master in Information Technology');})->get();
        } else if(Auth::user()->user_type == 'program chairman'){
            $data['students'] = Student::with(['user_info', 'program_info'])->whereHas('program_info', function ($query) {$query->where('id', Auth::user()->staff_program);})->get();
        }else{
            $data['students'] = Student::with(['user_info', 'program_info'])->get();
        }

        return view('records.index', $data);
    }

    public function filter_student($status) {
        $student_ids = ApprovalLog::where('status', $status)->pluck('student_id');

        $data['students'] = Student::whereIn('id', $student_ids)
            ->with(['user_info', 'program_info'])->get();

        return view('records.index', $data);
    }

    public function pre_register() {
        $data['programs'] =  Program::where('listing_status', 1)->get();

        return view('records.preregister', $data);
    }

    public function edit_record($id) {
        $data['programs'] =  Program::where('listing_status', 1)->get();
        $data['school_years'] = SchoolYear::all();
        $data['semesters'] = Semester::all();
        $data['student'] = Student::with('course.course')->find($id);

        return view('records.edit_records', $data);
    }

    public function view($id) {
        $data['student'] = Student::with('program_info', 'course.course', 'approval_log', 'school_year_info', 'semester_info')->find($id);

        return view('records.details', $data);
    }

    public function get_courses($program_id, $student_id) {
        $courses = ProgramCourse::with(['course'])->where('program_id', $program_id)->get();
        $student_courses = StudentCourse::where('student_id', $student_id)->get();
        $selected_courses = null;

        foreach ($courses as $course) {
            if($student_courses !== null) {
                $is_selected = $student_courses->contains('course_id', $course->course->id);
            } else {
                $is_selected = false;
            }

            $selected_courses[] = [
                'course_id' => $course->course->id,
                'descriptive_title' => $course->course->descriptive_title,
                'is_selected' => $is_selected ? 'checked' : '',
            ];
        }

        return response()->json($selected_courses);
    }

    public function update_record(Request $req) {
        if($req->file('file_record') !== null) {
            $filePath = $this->saveFileRecord($req->file('file_record'));
            $req->file_record = $filePath;
        }

        $student = Student::find($req->id);
        $student->update($req->except(['courses']));
        $studentId = $student->id;
        $courses = $req->input('courses');

        $this->saveStudentCourses($studentId, $courses);

        $user = User::where('student_id', $req->id)->get();
        $student->update(['name' => $req->input('name')]);

        return redirect()->route('records')->with('success', 'Student Information updated successfully');
    }

    public function delete_record($id) {
        Student::where('id', $id)->delete();
        User::where('student_id', $id)->delete();

        return redirect()->route('records')->with('success', 'Program deleted successfully');;
    }

    private function saveFileRecord($file) {
        return Storage::putFile('file_records', $file);
    }

    private function saveStudentCourses($studentId, $courseIds) {
        StudentCourse::where('student_id', $studentId)->delete();

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

    public function student_record() {
        $student_id = Auth::user()->student_id;
        $data['student'] = Student::with('program_info', 'course.course.schedules', 'approval_log', 'school_year_info', 'semester_info')->find($student_id);

        return view('records.stud_view_preregister', $data);
    }

    public function edit_approval(Request $req) {
        $approval_log = ApprovalLog::where('student_id', $req->id)->first();;
        $approval_log->update(['notes' => $req->input('notes'), 'status' => $req->input('status')]);

        return redirect()->route('view_record', $req->id)->with('success', 'Student Apprval Log Updated Successfully');
    }
}
