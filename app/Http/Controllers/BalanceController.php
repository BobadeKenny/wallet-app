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
        // $id = request('id');
        // $deposit = request('amt');
        // $user = User::find($id);
        // $user->deposit($deposit);
        // $user->save();
        // return redirect()->route('profile');
        return view('deposit');
    }

    public function fund()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = User::find(Auth::user()->id);
        $deposit = request('amount');
        $user->deposit($deposit);
        $user->save();
        return view('success')->with('message','Wallet credited successfully.');
    }

    public function withdraw()
    {
        //GET Method
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('withdraw');
    }

    public function withdrawal()
    {
        //POST Method
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = User::find(Auth::user()->id);
        $withdrawal = request('amount');
        if ($user->balance >= $withdrawal){
            $user->withdraw($withdrawal);
            $user->save();
            return view('success')->with('message','Withdrawal Successful.');
        } else {
            return view('success')->with('message','Insufficient Balance.');
        }
    }

    public function transfer()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
    //     $id = request('id');
    //     $rid = request('rid');
    //     $user = request('name');
    //     $transfer = request('amt');
    //     $sender = User::find($id);
    //     $receiver = User::where('name', $rid)->first();
    //     if($user == $rid){
    //         return('You cannot transfer to yourself.');
    //     }
    //     if(! $receiver){
    //         return('User not found. Please check username and try again.');
    //     }
    //     if ($sender->balance >= $transfer){
    //         $sender->transfer($receiver, $transfer);
    //         return redirect()->route('profile');
    //     } else {
    //         return "Error please try again";
    //     }
    // }
    return view('transfer');
    }

    public function maketransfer()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $transfer = request('amount');
        $username = request('username');
        $sender = User::find(Auth::user()->id);
        $receiver = User::where('username', $username)->first();
        if($sender == $receiver){
            return view('success')->with('message','You cannot transfer to yourself.');
        }
        if(! $receiver){
            return view('success')->with('message','User not found. Please check username and try again.');
        }
        if ($sender->balance >= $transfer){
            $sender->transfer($receiver, $transfer);
            return view('success')->with('message','Transfer Successful.');
        } else {
            return view('success')->with('message','Error. Please try again.');
        }
    }

    public function transactions()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = User::find(Auth::user()->id);
        return view('transactions')->with('user',$user);
    }
}
