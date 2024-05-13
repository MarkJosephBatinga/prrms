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

    public function import(Request $request)
    {
        if ($request->hasFile('csv_file')) {
            $path = $request->file('csv_file')->getRealPath();
            $handle = fopen($path, "r");
            if ($handle !== false) {
                fgetcsv($handle); // Skip the header row
                while (($row = fgetcsv($handle, 0, ",")) !== false) {
                    if (count($row) >= 0) { // Check if the row has at least 3 columns
                        $semester = new Semester();
                        $semester->semester = $row[0];
                        $semester->save();
                    } else {
                        return redirect()->route('semester')->with('error', 'Invalid CSV file: Row does not contain all required columns');
                    }
                }
                fclose($handle);
                return redirect()->route('semester')->with('success', 'CSV data imported successfully');
            } else {
                return redirect()->route('semester')->with('error', 'Failed to open CSV file');
            }
        }
        return redirect()->route('semester')->with('error', 'No CSV file found');
    }
}
