<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    protected $fillable = [
    		'order_id', 'quantity', 'price', 'product_id', 'title'
    	];
}
