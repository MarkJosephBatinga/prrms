<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\Course;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index() {
        $data['programs'] = Program::all();

        return view('programs.index', $data);
    }


    public function add_program() {
        $courses = Course::get();

        foreach ($courses as $course) {
           if($course->course_category === 'Core Subjects') {
                $data['core_courses'][] = $course;
           } else if($course->course_category === 'Major Subjects') {
                $data['major_courses'][] = $course;
           } else if($course->course_category === 'Elective Subjects') {
                $data['elective_courses'][] = $course;
           } else if($course->course_category === 'Institutional Requirement') {
                $data['institutional_reqs'][] = $course;
           }
        }

        return view('programs.add_program', $data);
    }

    public function view($id) {
        $data['program'] = Program::with('program_courses')->find($id);

        return view('programs.details', $data);
    }
}
