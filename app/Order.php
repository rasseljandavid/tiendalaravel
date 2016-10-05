<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Orderitem;
use Auth;
use App\Http\Controllers\CartController as Cart;

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
		
        // is it object coming from combime cart
    	if(is_object($request)){
    		$oi = $this->orderitems()->where('product_id', $request->product_id)->first();

    		if(!$oi){
				$this->orderitems()->save($request);
				return true;
			}

			$oi->quantity = $oi->quantity+$request->quantity;
			$oi->price = $request->price;
			$oi->save(); 

    	}else{

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

    public function removeOrderitem( Orderitem $oi ){
        $oi->delete();
        $this->compute();
    }

    public static function mergeWithPrevious(  ){

        // get current cart if any
    	if(Cart::getCartSession()){
	    	$cart = Order::where([
	            ['user_id', '=', 0],
	            ['session', '=', Cart::getCartSession()], 
	            ['purchased_at', '=', null],
	        ])->first();
		}

		// retrieves the previous unpurchased order of the user
    	$previous = Cart::getCart();
    	
    	// exit when both are empty
    	if(!$cart && !$previous)
    		return false;

    	// when current cart is empty or no session
    	if(!$cart){
    		if(Cart::getCartSession()){
    			$previous->session = Cart::getCartSession();
    			$previous->save();
    		}
    		return false;
    	}

    	// no previous cart ? use the current cart
    	if(!$previous){
    		$cart->user_id = Auth::user()->id;
    		$cart->save();
    		return false;
    	}

        // update previous cart items with the current cart items
    	foreach ($cart->orderitems as $oi) {
    		$previous->addOrderitem($oi);
    	}
    	// update session
    	$previous->session = $cart->session;
    	$previous->save();


    	// delete temporary/current cart and items within
    	// Note: this approach for single query deletion
    	Orderitem::where('order_id', $cart->id)->delete();
    	$cart->delete();

    }

    public function compute(  ){
        // relaod orderitems
        $this->load('orderitems');
        $this->attributes['total'] = 0;
        foreach ($this->orderitems as $oi) {
            $this->attributes['total'] += ($oi->quantity * $oi->price);
        }

        $this->save();
    }
}
