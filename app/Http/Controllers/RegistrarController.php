<?php

namespace App\Http\Controllers;
use App\Models\EnStudent;
use App\Models\StudentsGrade;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrarController extends Controller
{
    public function grades_index() {
        $data['students'] = EnStudent::all();

        return view('registrar.grades_index', $data);
    }

    public function view_grades($id) {
        $data['grades'] = StudentsGrade::where('term', 'First Semester')->where('student_id', $id)->get();
        $data['student'] = EnStudent::find($id);

        return view('registrar.view_grades', $data);
    }

    public function student_grades() {
        $student_id = Auth::user()->student_id;

        $data['grades'] = StudentCourse::with(['course'])->where('student_id', $student_id)->get();

        // echo json_encode($data['course']);
        return view('registrar.student_grade', $data);
    }

    public function get_filtered_grades($term, $id) {
        $grades = StudentsGrade::where('term', $term)->where('student_id', $id)->get();

        return $grades;
    }

    public function grades_remarks_by_course(){

        $gradeModel = new StudentsGrade();

        $data['grades'] = $gradeModel->grades_remarks_by_course(Auth::user()->staff_college);
        return view('registrar.dean_grades_index', $data);
    }


}
