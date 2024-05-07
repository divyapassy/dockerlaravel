<?php

namespace App\Models;

use App\Events\OrderShippedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
//evenet triggered automatically when user created
    protected $dispatchesEvents =[
        "created_at"=>OrderShippedEvent::class
    ];
}
