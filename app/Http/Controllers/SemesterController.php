<?php

namespace App\Http\Controllers;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{

    public function index() {
        $data['semesters'] = Semester::all();

        return view('semester.index', $data);
    }
    
    public function add_semester() {
        return view('semester.add_semester');
    }

    public function create_semester(Request $req) {
 
        $isUnique = Semester::where('semester', $req->semester)->first();

        if ($isUnique) {
            return redirect()->route('add_semester')->with('alert_message', 'Semester already exists');
        } else {

            Semester::create([
                'semester' => $req->semester,
            ]);
            return redirect()->route('semester')->with('success', 'Semester added successfully');
        }
    }

    public function edit_semester($id) {
        $data['semester'] = Semester::find($id);

        return view('semester.edit_semester', $data);
    }

    public function update_semester(Request $req) {

        $isUnique = Semester::where('semester', $req->semester)->where('id', '!=', $req->id)->first();

        if ($isUnique) {
            return redirect()->route('edit_semester', ['id' => $req->id])->with('alert_message', 'Semester already exists');
        } else {

            Semester::where('id', $req->id)->update([
                'semester' => $req->semester,
            ]);

            return redirect()->route('semester')->with('success', 'Semester updated successfully');
        }
    }

    public function delete_semester($id) {

        Semester::where('id', $id)->delete();
        return redirect()->route('semester')->with('success', 'Semester deleted successfully');;
    }
}
