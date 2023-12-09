<?php

namespace App\Http\Controllers;
use App\Models\EnStudent;
use App\Models\StudentsGrade;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    public function grades_index() {
        $data['students'] = EnStudent::all();

        return view('registrar.grades_index', $data);
    }

    public function view_grades($id) {
        $data['grades'] = StudentsGrade::where('term', 'First Semester')->where('student_id', $id)->get();
        $data['student'] = EnStudent::find($id);;

        return view('registrar.view_grades', $data);
    }

    public function student_grades() {
        return view('registrar.student_grade');
    }
}
