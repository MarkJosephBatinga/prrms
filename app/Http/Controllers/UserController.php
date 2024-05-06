<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index() {

        $data['users'] = User::whereIn('user_type', ['dean', 'registrar', 'program chairman'])->get();
        return view('users.index', $data);
    }

    public function add_user() {

        $data['programs'] = Program::all();
        $data['user_types'] = array('Program Chairman', 'Dean', 'Registrar');
        $data['colleges'] = array('College of Graduates', 'College of Information Technology');
        return view('users.add_user', $data);
    }

    public function create_user(Request $req) {
    
        if($this->userAccountLimit($req->user_type, $req->staff_program, $req->staff_college, null)){
            return redirect()->route('add_user')->with('alert_message', 'User account limit reached for ' . $req->user_type);
        } else{
            
            $existingUser = User::where('email', $req->email)->first();

            if ($existingUser) {
                return redirect()->route('add_user')->with('alert_message', 'Email address already exists. Please choose a different one.');
            } else {

                User::create([
                    'user_type' => $req->user_type,
                    'name' => $req->name,
                    'email' => $req->email,
                    'staff_program' => $req->staff_program,
                    'staff_college' => $req->staff_college,
                    'password' => Hash::make($req->new_pass),
                ]);
                return redirect()->route('users')->with('success', 'User added successfully');
            }
        }
    }

    public function edit_user($id) {

        $data['programs'] = Program::all();
        $data['user_types'] = array('Program Chairman', 'Dean', 'Registrar');
        $data['colleges'] = array('College of Graduates', 'College of Information Technology');
        $data['user'] = User::find($id);

        return view('users.edit_user', $data);
    }

    public function update_user(Request $req) {

        $userInfo = User::find($req->id);
    
        if($this->userAccountLimit($req->user_type, $req->staff_program, $req->staff_college, $req->id)){
            return redirect()->route('edit_user', ['id' => $req->id])->with('alert_message', 'User account limit reached for ' . $req->user_type);
        } else{

            $existingUser = User::where('email', $req->email)->where('id', '!=', $req->id)->first();

            if ($existingUser) {
                return redirect()->route('edit_user', ['id' => $req->id])->with('alert_message', 'User account limit reached for ' . $req->user_type);
            } else {

                User::where('id', $req->id)->update([
                    'user_type' => $req->user_type, 
                    'name'  => $req->name, 
                    'email'  => $req->email, 
                    'staff_program'  => $req->staff_program, 
                    'staff_college' => $req->staff_college,
                    'password'  => !empty($req->new_pass) ? Hash::make($req->new_pass) : $userInfo->password,
                ]);
                return redirect()->route('users')->with('success', 'User updated successfully');
            }

        }

    }

    public function delete_user($id) {

        User::where('id', $id)->delete();
        return redirect()->route('users')->with('success', 'User deleted successfully');;
    }

    private function userAccountLimit($userType, $userProgram, $userCollege, $userId) {

        switch($userType) {
            case 'program chairman':
                $userCount = User::where('user_type', $userType)->where('id', '!=', $userId)->count();
                if ($userCount > 0) {
                    $chairProgramCount = User::where('user_type', $userType)
                        ->where('staff_program', $userProgram)
                        ->where('id', '!=', $userId)
                        ->count();
                    return $chairProgramCount > 0;
                }
                break;
    
            case 'dean':
                $userCount = User::where('user_type', $userType)->where('id', '!=', $userId)->count();
                if ($userCount > 0) {
                    $deanCollegeCount = User::where('user_type', $userType)
                        ->where('staff_college', $userCollege)
                        ->where('id', '!=', $userId)
                        ->count();
                    return $deanCollegeCount > 0;
                }
                break;
    
            case 'registrar':
                return User::where('user_type', $userType)->where('id', '!=', $userId)->count() > 0;
    
            default:
                return true;
        }
    
        return false;
    }
    
    
}
