<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\ProgramCourse;
use App\Models\Program;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index() {
        $data['students'] = Student::with(['user_info', 'program_info'])->get();

        return view('records.index', $data);
    }

    public function pre_register() {
        $data['programs'] = Program::all();

        return view('records.preregister', $data);
    }

    public function edit_record($id) {
        $data['programs'] = Program::all();
        $data['student'] = Student::with('course.course')->find($id);

        return view('records.edit_records', $data);
    }

    public function view($id) {
        $data['student'] = Student::with('program_info', 'course.course')->find($id);

        return view('records.details', $data);
    }

    public function get_courses($program_id, $student_id) {
        $courses = ProgramCourse::with(['course'])->where('program_id', $program_id)->get();
        $student_courses = StudentCourse::where('student_id', $student_id)->get();

        foreach ($courses as $course) {
            $is_selected = $student_courses->contains('course_id', $course->course->id);

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
}
