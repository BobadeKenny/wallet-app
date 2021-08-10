<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function updateUser()
    {
        $user = User::find(Auth::user()->id);
        $username = request('username');
        $email = request('email');
        $firstname = request('firstname');
        $lastname = request('lastname');
        if($username){
            $userbyusername = User::where('username', $username)->first();
            if($userbyusername){
                return view('success')->with('message','This username has already been taken.');
            } else {
                $user->username = $username;
            }
        }
        if($email){
            $userbyemail = User::where('email', $email)->first();
            if($userbyemail){
                return view('success')->with('message','This email has already been registered.');
            } else {
                $user->email = $email;
            }
        }
        if($firstname){
            $user->firstname = $firstname;
        }
        if($lastname){
            $user->lastname = $lastname;
        }
        $user->save();
        return view('success')->with('message','User details updated successfully.');

    }
}