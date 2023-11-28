<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        $data['courses'] = Course::all();

        return view('courses.index', $data);
    }

    public function add_course() {
        return view('courses.add_course');
    }

    public function get_course() {
        return view('login');
    }

    public function view($id) {
        return view('courses.details');
    }
}
