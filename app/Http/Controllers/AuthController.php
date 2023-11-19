<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function register() {
        return view('register');
    }

    public function loginPost(Request $req) {
        $credentials = [
            'email' => $req->email,
            'password' => $req->password,
        ];

        if(Auth::attempt($credentials)) {
            return redirect('/dashboard')->with('success', 'Login Successfull');
        }

        return back()->with('error', 'Invalid Password or Email, Please Try Again');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    }
}
