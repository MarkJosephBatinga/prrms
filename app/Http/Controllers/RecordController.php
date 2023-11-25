<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function index() {
        $data['students'] = Student::with(['user_info', 'program_info'])->get();

        // echo json_encode($data['students']);

        return view('records.index', $data);
    }
}
