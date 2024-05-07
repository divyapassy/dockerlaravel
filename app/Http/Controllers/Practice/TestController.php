<?php

namespace App\Http\Controllers;
use App\Models\Deposit;
use App\Models\User;
use App\Notifications\DepositeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public static function encdatawithkeypair(){
        $data=["name"=>"divya","mobile"=>9582927754];
        $method="AES-256-ECB";
        $key=openssl_random_pseudo_bytes(32);
        $encrypted_data=openssl_encrypt(json_encode($data),$method,$key,OPENSSL_RAW_DATA);
        //again encrypt with public key
        openssl_public_encrypt();

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

}
