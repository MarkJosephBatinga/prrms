<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Program;
use App\Models\Schedule;
use App\Models\StudentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index() {

        $courseModel = new Course();

        if(Auth::user()->user_type == 'dean'){
            $data['courses'] = $courseModel->course_student_count(Auth::user()->staff_college);
            return view('courses.dean_course', $data);
        } else{
            $data['courses'] = Course::all();
            return view('courses.index', $data);
        }
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

        if(Auth::user()->user_type == 'admin'){
            return redirect()->route('courses')->with('success', 'Course updated successfully');
        } else{
            return redirect()->route('pre_register_setup')->with('success', 'Course updated successfully');
        }
    }

    public function delete_course($id) {
        Course::where('id', $id)->delete();

        if(Auth::user()->user_type == 'admin'){
            return redirect()->route('courses')->with('success', 'Course deleted successfully');
        } else{
            return redirect()->route('pre_register_setup')->with('success', 'Course deleted successfully');
        }
    }

    public function view($id) {
        $data['course'] = Course::with('schedules')->find($id);

        return view('courses.details', $data);
    }

    public function student_course() {
        $student_id = Auth::user()->student_id;

        $data['courses'] = StudentCourse::with(['course'])->where('student_id', $student_id)->get();

        return view('courses.stud_course', $data);
    }

    public function student_view($id) {
        $data['course'] = Course::with('schedules')->find($id);

        return view('courses.s_course_details', $data);
    }

    public function update_course_listing_status(Request $req)
    {
        $course = Course::findOrFail($req->id);
        $course->update(['listing_status' => $req->status]);
    
        return response()->json(['success' => true]);
    }

}
