<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function searchUsername(){
        $user = User::where('username', request('q'))->first();
        if(!$user){
           return(''); 
        } else {
            return('Username already exists!');
        }
    }

    public function searchEmail(){
        $user = User::where('email', request('q'))->first();
        if(!$user){
           return(''); 
        } else {
            return('Email already exists!');
        }
    }

    public function searchUser(){
        $user = User::where('username', request('q'))->first();
        $suggestion = request('q');
        if(!$suggestion){
            $users = User::all();
           return($users); 
        } else {
            $data=User::where('username','LIKE', '%'.$suggestion.'%')->get('username');
            return($data);
        }
    }
}
