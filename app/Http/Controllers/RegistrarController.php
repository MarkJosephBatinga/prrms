<?php

namespace App\Http\Controllers;
use App\Models\EnStudent;
use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    public function grades_index() {
        $data['students'] = EnStudent::all();

        return view('registrar.grades_index', $data);
    }

    public function view_grades($id) {
        return view('registrar.view_grades');
    }

    public function student_grades() {
        return view('registrar.student_grade');
    }
}
