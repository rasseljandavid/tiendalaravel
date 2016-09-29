<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{	
	/*---------- PROTECTED VARAIBLES ----------*/

    protected $fillable = [
    		'user_id', 'comment', 'session', 'purchased_at', 'discount_id', 'total', 'discount'
    	];


	/*---------- SET<>ATTRIBUTE ----------*/
	/*---------- GET<>ATTRIBUTE ----------*/
	/*---------- SCOPES ----------*/
	/*---------- RELATIONS ----------*/
	/*---------- CUSTOM METHODS ----------*/
    
}
