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

    public function edit_course($id) {
        $data['course'] = Course::with(['schedules'])->find($id);

        return view('courses.edit_course', $data);
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
        return redirect()->route('courses')->with('success', 'Course added successfully');
    }

    public function update_course(Request $req) {
        $course = Course::find($req->id);
        $course->update($req->except(['day', 'time']));
        Schedule::where('course_id', $course->id)->delete();

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

        return redirect()->route('courses')->with('success', 'Course updated successfully');;
    }

    public function delete_course($id) {
        Course::where('id', $id)->delete();

        return redirect()->route('courses')->with('success', 'Course deleted successfully');
    }

    public function view($id) {
        $data['course'] = Course::with('schedules')->find($id);

        return view('courses.details', $data);
    }
}
