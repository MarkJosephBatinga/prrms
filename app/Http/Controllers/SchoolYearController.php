<?php

namespace App\Http\Controllers;
use App\Models\SchoolYear;
use Illuminate\Http\Request;

class SchoolYearController extends Controller
{

    public function index() {
        $data['school_years'] = SchoolYear::all();

        return view('school_year.index', $data);
    }
    
    public function add_school_year() {
        return view('school_year.add_school_year');
    }

    public function create_school_year(Request $req) {
 
        $isUnique = SchoolYear::where('school_year', $req->school_year)->first();

        if ($isUnique) {
            return redirect()->route('add_school_year')->with('alert_message', 'School Year already exists');
        } else {

            SchoolYear::create([
                'school_year' => $req->school_year,
                'start_date' => $req->start_date,
                'end_date' => $req->end_date,
            ]);
            return redirect()->route('school_year')->with('success', 'School Year added successfully');
        }
    }

    public function edit_school_year($id) {
        $data['school_year'] = SchoolYear::find($id);

        return view('school_year.edit_school_year', $data);
    }

    public function update_school_year(Request $req) {

        $isUnique = SchoolYear::where('school_year', $req->school_year)->where('id', '!=', $req->id)->first();

        if ($isUnique) {
            return redirect()->route('edit_school_year', ['id' => $req->id])->with('alert_message', 'School Year already exists');
        } else {

            SchoolYear::where('id', $req->id)->update([
                'school_year' => $req->school_year,
                'start_date' => $req->start_date,
                'end_date' => $req->end_date,
            ]);

            return redirect()->route('school_year')->with('success', 'School Year updated successfully');
        }
    }

    public function delete_school_year($id) {

        SchoolYear::where('id', $id)->delete();
        return redirect()->route('school_year')->with('success', 'School Year deleted successfully');;
    }
}
