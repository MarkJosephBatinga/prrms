<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Program;
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

    public function view($id) {
        $data['student'] = Student::with('program_info', 'course.course')->find($id);

        return view('records.details', $data);
    }
}
