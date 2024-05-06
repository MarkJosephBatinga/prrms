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

        $userInfo = Auth::user();
        $userType = $userInfo->user_type;
        $userCollege = $userInfo->staff_college;
        $userProgram = $userInfo->staff_program;

        $programModel = new Program();
        $courseModel = new Course();

        if ($userType === 'admin') {
            $data['student_count'] = User::where('student_id', '!=', 0)->count();
            $data['program_count'] = Program::count();
            $data['course_count'] = Course::count();
            $data['prereg_count'] = ApprovalLog::where('status', 1)->count();
            $data['endorsed_count'] = ApprovalLog::where('status', 2)->count();
            $data['approved_count'] = ApprovalLog::where('status', 3)->count();

            return view('dashboard.admin', $data);

        } else if($userType === 'program chairman'){

            $data['courses'] = $courseModel->course_student_count_chairman($userProgram);
            return view('dashboard.program_chairman', $data);

        } else if($userType === 'dean'){
            $data['programs'] = $programModel->program_student_count($userCollege);
            $data['courses'] = $courseModel->course_student_count($userCollege);
            
            return view('dashboard.dean', $data);
        }  else if($userType === 'registrar'){
            $data['student_count'] = User::where('student_id', '!=', 0)->count();
            $data['program_count'] = Program::count();
            $data['course_count'] = Course::count();
            $data['prereg_count'] = ApprovalLog::where('status', 1)->count();
            $data['endorsed_count'] = ApprovalLog::where('status', 2)->count();
            $data['approved_count'] = ApprovalLog::where('status', 3)->count();

            return view('dashboard.registrar', $data);
        } else{
            $student_id = Auth::user()->student_id;
            $data['student'] = Student::with('program_info', 'course.course.schedules', 'approval_log')->find($student_id);

            return view('dashboard.student', $data);
        }
    }
}
