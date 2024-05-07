<?php

namespace App\Http\Controllers;

use App\Events\OrderShippedEvent;
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

    public function orderPlaced(Request $request){
        $order =Order::create($request);
        //run event manually or define event in model which triggered automatically when created
        event(new OrderShippedEvent($order));

        return redirect()->back()->with('status','Your deposit was successful!');
    }


    public function markAsRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
