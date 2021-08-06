<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class BalanceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deposit()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $id = request('id');
        $deposit = request('amt');
        $user = User::find($id);
        $user->deposit($deposit);
        $user->save();
        return redirect()->route('profile');
    }

    public function withdraw()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $id = request('id');
        $withdrawal = request('amt');
        $user = User::find($id);
        if ($user->balance >= $withdrawal){
            $user->withdraw($withdrawal);
            $user->save();
            return redirect()->route('profile');
        } else {
            return "Insufficient Balance.";
        }
    }
    public function transfer()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $id = request('id');
        $rid = request('rid');
        $user = request('name');
        $transfer = request('amt');
        $sender = User::find($id);
        $receiver = User::where('name', $rid)->first();
        if($user == $rid){
            return('You cannot transfer to yourself.');
        }
        if(! $receiver){
            return('User not found. Please check username and try again.');
        }
        if ($sender->balance >= $transfer){
            $sender->transfer($receiver, $transfer);
            return redirect()->route('profile');
        } else {
            return "Error please try again";
        }
    }
}
