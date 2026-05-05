<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;

class Message extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
