<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

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
	
	public function order(  ){
		
		return $this->belongsTo(Order::class);
	}



	/*---------- CUSTOM METHODS ----------*/
}
