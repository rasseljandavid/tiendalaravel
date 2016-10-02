<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orderitem;

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

	public function orderitems(  ){
		
		return $this->hasMany(Orderitem::class);
	}


	/*---------- CUSTOM METHODS ----------*/

    public function addOrderitem( $request ){
		
		$oi = $this->orderitems()->where('product_id', $request['product_id'])->first();

		if(!$oi){
			$this->orderitems()->save(new Orderitem($request));
			return true;
		}

		$oi->quantity = $oi->quantity+$request['quantity'];
		$oi->price = $request['price'];
		$oi->save();   	
    	
    }
}
