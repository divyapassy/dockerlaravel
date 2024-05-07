<?php

namespace App\Http\Controllers;
use App\Models\Deposit;
use App\Models\User;
use App\Notifications\DepositeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositeController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function deposit(Request $request){
        $deposit = Deposit::create([
            'user_id' =>Auth::user()->id,
            'amount'  => $request->amount
        ]);
        User::find(Auth::user()->id)->notify(new DepositeNotification($deposit->amount));

        //for all users
        // $users=User::all();
        // Notifications::send($users,$deposite->amount);
    
        return redirect()->back()->with('status','Your deposit was successful!');
    }


    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
