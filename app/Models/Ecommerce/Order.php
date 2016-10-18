<?php

namespace App\Models\Ecommerce;

// dependencies
use App\Http\Controllers\Ecommerce\CartController as Cart;
use Illuminate\Database\Eloquent\Model;
use Auth;
// models
use App\Models\Ecommerce\OrderItem;

class Order extends Model
{	
	/*---------- VARAIBLES ----------*/

    protected $fillable = [
    		'user_id', 'comment', 'session', 'purchased_at', 'discount_id', 'total', 'discount'
    	];


	/*---------- SET<>ATTRIBUTE ----------*/
	/*---------- GET<>ATTRIBUTE ----------*/
	/*---------- SCOPES ----------*/

	/*---------- RELATIONS ----------*/

	public function orderitems(  ){
		return $this->hasMany(OrderItem::class);
	}

    public function orderstatus(  ){
        return $this->hasOne(OrderStatus::class);    
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

            // if mass update? for checkout? how...
			$oi->quantity = $oi->quantity+$request->quantity;
			$oi->price = $request->price;
			$oi->save(); 

    	}else{

    		$oi = $this->orderitems()->where('product_id', $request['product_id'])->first();

			if(!$oi){
				$oi = $this->orderitems()->save(new OrderItem($request));
                // $product = $oi->getProduct();
                // flash('success', 'Added '.$request['quantity'].' '.$product->title.' to your cart');
				return true;
			}

            if(isset($request['update']))
                $oi->quantity = $request['quantity'];
            else
                $oi->quantity = $oi->quantity+$request['quantity'];

			$oi->price = $request['price'];
			$oi->save();
            // $product = $oi->getProduct();
            // flash('success', 'Updated the quantity of '.$product->title. ' to '.$oi->quantity);   
    	}
    }

    public function removeOrderitem( OrderItem $oi ){
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
    	OrderItem::where('order_id', $cart->id)->delete();
    	$cart->delete();

    }

    public function compute(  ){
        // reload orderitems
        $this->load('orderitems');
        $this->attributes['total'] = 0;
        foreach ($this->orderitems as $oi) {
            $this->attributes['total'] += ($oi->quantity * $oi->price);
        }

        $this->save();
    }

    public function getItemFromProduct( $id ){
        
        return $this->orderitems()->fromProduct($id)->first();
    }
}
