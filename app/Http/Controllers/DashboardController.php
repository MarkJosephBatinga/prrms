<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $userType = Auth::user()->user_type;

        if ($userType === 'admin') {
            return view('dashboard.admin');
        } else {
            $student_id = Auth::user()->student_id;
            $data['student'] = Student::with('program_info', 'course.course', 'approval_log')->find($student_id);


            return view('dashboard.student', $data);
        }
    }
}
