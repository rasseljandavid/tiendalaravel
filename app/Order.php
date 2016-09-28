<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    		'user_id', 'comment', 'session', 'purchased_at', 'discount_id', 'total', 'discount'
    	];
}
