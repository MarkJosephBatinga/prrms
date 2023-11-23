<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function get_course() {
        return view('login');
    }
}
