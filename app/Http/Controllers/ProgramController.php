<?php

namespace App\Http\Controllers;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index() {
        $data['programs'] = Program::all();

        return view('programs.index', $data);
    }


    public function add_program() {
        return view('programs.add_program');
    }
}
