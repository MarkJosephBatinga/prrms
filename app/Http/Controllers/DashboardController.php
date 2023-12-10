<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Program;
use App\Models\User;
use App\Models\ApprovalLog;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $userType = Auth::user()->user_type;

        if ($userType === 'admin') {
            $data['user_count'] = User::where('student_id', '!=', 0)->count();
            $data['program_count'] = Program::count();
            $data['course_count'] = Course::count();
            $data['prereg_count'] = ApprovalLog::where('status', 1)->count();
            $data['endorsed_count'] = ApprovalLog::where('status', 2)->count();
            $data['approved_count'] = ApprovalLog::where('status', 3)->count();

            return view('dashboard.admin', $data);
        } else {
            $student_id = Auth::user()->student_id;
            $data['student'] = Student::with('program_info', 'course.course', 'approval_log')->find($student_id);


            return view('dashboard.student', $data);
        }
    }
}
