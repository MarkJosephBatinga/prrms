<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    public function grades_index() {
        return view('registrar.grades_index');
    }
}
