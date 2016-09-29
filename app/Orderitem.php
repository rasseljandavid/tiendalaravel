<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{

	/*---------- PROTECTED VARAIBLES ----------*/
	
    protected $fillable = [
    		'order_id', 'quantity', 'price', 'product_id', 'title'
    	];

    
	/*---------- SET<>ATTRIBUTE ----------*/
	/*---------- GET<>ATTRIBUTE ----------*/
	/*---------- SCOPES ----------*/
	/*---------- RELATIONS ----------*/
	/*---------- CUSTOM METHODS ----------*/
}
