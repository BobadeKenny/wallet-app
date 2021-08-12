<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function profile(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('profile');
    }
}
