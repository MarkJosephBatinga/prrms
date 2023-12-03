<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index() {
        $data['students'] = Student::with(['user_info', 'program_info'])->get();

        return view('records.index', $data);
    }

    public function pre_register() {
        return view('records.preregister');
    }

    public function view($id) {
        $data['student'] = Student::with('program_info', 'course.course')->find($id);

        return view('records.details', $data);
    }
}
