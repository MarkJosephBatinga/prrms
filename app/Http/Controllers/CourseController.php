<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Program;
use App\Models\Schedule;
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

    public function create_course(Request $req) {
        $course = Course::create($req->except(['day[]', 'time[]']));

        $days = $req->day;
        $times = $req->time;
        $count = count($days);

        for ($i = 0; $i < $count; $i++) {
            $day = $days[$i];
            $time = $times[$i];

            Schedule::create([
                'course_id' => $course->id,
                'day' => $day,
                'time' => $time,
            ]);
        }
        return redirect()->route('courses');
    }

    public function view($id) {
        $data['course'] = Course::with('schedules')->find($id);

        return view('courses.details', $data);
    }
}
