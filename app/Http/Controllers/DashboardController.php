<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $userType = Auth::user()->user_type;

        if ($userType === 'admin') {
            return view('dashboard.admin');
        } else {
            return view('dashboard.student');
        }
    }
}
