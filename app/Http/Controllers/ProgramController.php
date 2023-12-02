<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\Course;
use App\Models\ProgramCourse;
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

    public function edit_program($id) {
        $data['program'] = Program::with(['program_courses.course'])->find($id);
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

        return view('programs.edit_program', $data);
    }

    public function create_program(Request $req) {
        $program = Program::create($req->except(['program_courses']));
        $courses = $req->program_courses;

        foreach($courses as $course) {
            ProgramCourse::create([
                'program_id' => $program->id,
                'course_id' => $course,
            ]);
        }

        return redirect()->route('programs');
    }

    public function update_program(Request $req) {
        $program = Program::find($req->id);
        $program->update($req->except(['program_courses']));
        ProgramCourse::where('program_id', $program->id)->delete();
        $courses = $req->program_courses;

        foreach($courses as $course) {
            ProgramCourse::create([
                'program_id' => $program->id,
                'course_id' => $course,
            ]);
        }

        return redirect()->route('programs');
    }

    public function delete_program($id) {
        Program::where('id', $id)->delete();

        return redirect()->route('programs');
    }

    public function view($id) {
        $data['program'] = Program::with('program_courses.course')->find($id);

        // Organize courses by category
        $data['coreCourses'] = $data['program']->program_courses->where('course.course_category', 'Core Subjects');
        $data['majorCourses'] = $data['program']->program_courses->where('course.course_category', 'Major Subjects');
        $data['electiveCourses'] = $data['program']->program_courses->where('course.course_category', 'Elective Subjects');
        $data['institutionalCourses'] = $data['program']->program_courses->where('course.course_category', 'Institutional Requirement');

        // Calculate total units for each category
        $data['totalCoreUnits'] = $data['coreCourses']->sum('course.units');
        $data['totalMajorUnits'] = $data['majorCourses']->sum('course.units');
        $data['totalElectiveUnits'] = $data['electiveCourses']->sum('course.units');
        $data['totalInstitutionalUnits'] = $data['institutionalCourses']->sum('course.units');

        $data['oveallUnits'] = $data['program']->program_courses->sum('course.units');

        return view('programs.details', $data);
    }
}
