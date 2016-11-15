<?php

namespace App\Models\Ecommerce;

// dependencies
use App\Http\Controllers\Ecommerce\CartController as Cart;
use Illuminate\Database\Eloquent\Model;
use Mail;
use Auth;
// models
use App\Models\Ecommerce\OrderItem;
use App\Models\Address\Address;
use App\User;

class Order extends Model
{	
	/*---------- VARAIBLES ----------*/

    // protected $fillable = [
    // 		'user_id', 'comment', 'session', 'purchased_at', 'discount_id', 'total', 'discount', 'status'
    // 	];

    protected $dates = [ 'created_at', 'updated_at', 'purchased_at' ];

    protected $guarded = [ 'id' ];

    protected $totalQuantity = 0;


	/*---------- SET<>ATTRIBUTE ----------*/
	/*---------- GET<>ATTRIBUTE ----------*/

    public function getTotalAttribute( $total ){
        
        return $this->attributes['total'] = number_format((double)$total, 2);
    }

    public function getShippingFeeAttribute( $shipping_fee ){
        
        return $this->attributes['shipping_fee'] = number_format((double)$shipping_fee, 2);
    }

    public function getGrandTotalAttribute( $grand_total ){
        
        return $this->attributes['grand_total'] = number_format((double)$grand_total, 2);
    }

	/*---------- SCOPES ----------*/

    public function scopeReceived( $query ){
        
        $query->where([
                ['purchased_at', '!=', 0 ],
                ['status', '=', 0]
            ]);
    }


    public function scopeOnProcess( $query ){
        
        $query->where([
                ['purchased_at', '!=', 0 ],
                ['status', '=', 1]
            ]);
    }

    public function scopeOnTransit( $query ){
        
        $query->where([
                ['purchased_at', '!=', 0 ],
                ['status', '=', 2]
            ]);
    }

    public function scopeShipped( $query ){
        
        $query->where([
                ['purchased_at', '!=', 0 ],
                ['status', '=', 3]
            ]);
    }

    
	/*---------- RELATIONS ----------*/

	public function orderitems(  ){
		return $this->hasMany(OrderItem::class);
	}

    public function user(  ){
        return $this->belongsTo(User::class);
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

        $cart = null;
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

        if($this->attributes['total'] >= 500){
            $this->attributes['shipping_fee'] = 0;
        }else{
            $this->attributes['shipping_fee'] = 50.00;
        }

        $grand_total = $this->attributes['total'];
        $grand_total += $this->attributes['shipping_fee'];
        $this->attributes['grand_total'] = $grand_total;

        $this->save();
    }

    public function getItemFromProduct( $id ){
        
        return $this->orderitems()->fromProduct($id)->first();
    }

    public function setTotalQuantity(  ){
        
        $this->totalQuantity = 0;
        foreach ($this->orderitems as $oi) {
            $this->totalQuantity += $oi->quantity;
        }
    }

    public function getTotalQuantity( ){
        $this->setTotalQuantity();
        unset($this->orderitems);
        return $this->totalQuantity;
    }

    public function matchMegaventoryStructure(  ){
        // "mvSalesOrder":{
        //     "SalesOrderId":0,
        //     "SalesOrderNo":"String",
        //     "SalesOrderReferenceNo":"String",
        //     "SalesOrderReferenceApplication":"String",
        //     "SalesOrderDate":"\/Date(-62135596800000-0000)\/",
        //     "SalesOrderCustomOrderDate1":"\/Date(-62135596800000-0000)\/",
        //     "SalesOrderCustomOrderDate2":"\/Date(-62135596800000-0000)\/",
        //     "SalesOrderCurrencyCode":"String",
        //     "SalesOrderClientID":0,
        //     "SalesOrderBillingAddress":"String",
        //     "SalesOrderShippingAddress":"String",
        //     "SalesOrderContactPerson":"String",
        //     "SalesOrderInventoryLocationID":0,
        //     "SalesOrderComments":"String",
        //     "SalesOrderTags":"String",
        //     "SalesOrderTotalQuantity":0,
        //     "SalesOrderAmountSubtotalWithoutTaxAndDiscount":0.00,
        //     "SalesOrderAmountShipping":0.00,
        //     "SalesOrderAmountTotalDiscount":0.00,
        //     "SalesOrderAmountTotalTax":0.00,
        //     "SalesOrderAmountGrandTotal":0.00,
        //     "SalesOrderDetails":[
        //         {
        //             "SalesOrderRowProductSKU":"String",
        //             "SalesOrderRowProductDescription":"String",
        //             "SalesOrderRowQuantity":0,
        //             "SalesOrderRowShippedQuantity":0,
        //             "SalesOrderRowInvoicedQuantity":0,
        //             "SalesOrderRowUnitPriceWithoutTaxOrDiscount":0,
        //             "SalesOrderRowTaxID":0,
        //             "SalesOrderTotalTaxAmount":0,
        //             "SalesOrderRowDiscountID":0,
        //             "SalesOrderRowTotalDiscountAmount":0,
        //             "SalesOrderRowTotalAmount":0
        //         }
        //     ],
        //     "SalesOrderStatus":"ValidStatus"
        // }

        $this->load('user');
        $this->setTotalQuantity();
        // salesItem is equivalent to orderitem
        $salesItem = array();
        foreach ($this->orderitems as $key => $oi) {
            // $this->orderitems[$key]->product = $oi->getProduct(); 
            $product = $oi->getProduct();
            $salesItem[] = array(
                    "SalesOrderRowProductSKU"=>$product->sku,
                    "SalesOrderRowProductDescription"=>$product->body,
                    "SalesOrderRowQuantity"=>$oi->quantity,
                    "SalesOrderRowShippedQuantity"=>0,
                    "SalesOrderRowInvoicedQuantity"=>0,
                    "SalesOrderRowUnitPriceWithoutTaxOrDiscount"=>$oi->price,
                    "SalesOrderRowTaxID"=>0,
                    "SalesOrderTotalTaxAmount"=>0,
                    "SalesOrderRowDiscountID"=>0,
                    "SalesOrderRowTotalDiscountAmount"=>0,
                    "SalesOrderRowTotalAmount"=>($oi->quantity * $oi->price)
                );
        }



        $sales = array(
                "SalesOrderId"=>$this->id,
                "SalesOrderNo"=>(string)$this->id,
                "SalesOrderReferenceNo"=>(string)$this->id,
                "SalesOrderReferenceApplication"=>"tienda",
                "SalesOrderDate"=>(string)$this->purchased_at,
                "SalesOrderCustomOrderDate1"=>(string)$this->created_at,
                "SalesOrderCustomOrderDate2"=>(string)$this->updated_at,
                "SalesOrderCurrencyCode"=>"Peso",
                "SalesOrderClientID"=>$this->user_id,
                "SalesOrderBillingAddress"=>$this->user->getBillingAddress()->onelineString(),
                "SalesOrderShippingAddress"=>$this->user->getShippingAddress()->onelineString(),
                "SalesOrderContactPerson"=>$this->user->getFullname(),
                "SalesOrderInventoryLocationID"=>0,
                "SalesOrderComments"=>$this->comment,
                "SalesOrderTags"=>"String",
                "SalesOrderTotalQuantity"=>$this->totalQuantity,
                "SalesOrderAmountSubtotalWithoutTaxAndDiscount"=>0.00,
                "SalesOrderAmountShipping"=>$this->shipping_fee,
                "SalesOrderAmountTotalDiscount"=>0.00,
                "SalesOrderAmountTotalTax"=>0.00,
                "SalesOrderAmountGrandTotal"=>$this->grand_total,
                "SalesOrderDetails"=>$salesItem,
                "SalesOrderStatus"=>(string)$this->status
            );

        // dd($sales);

        return $sales;
    }


    public function emailInvoice( $order=null ){

        if(!$order){
            $order = $this;
        }

        $order->load('orderitems');
        $order->shippingAddress = $order->user->getShippingAddress();
        $order->billingAddress = $order->user->getBillingAddress();
        $order->status = Status::asString('order', $order->status);

        $admin = array();
        $admin['shippingAddress'] = Address::where('user_id', 0)->shipping()->first();
        $admin['billingAddress'] = Address::where('user_id', 0)->billing()->first();
        $admin = (object)$admin;
        
        Mail::send( 'emails.invoice', 
                    [
                     'order'=>$order,
                     'admin'=>$admin
                    ], 
                    function ($message) {
                        $message->subject("Your order on Tienda.ph was received");
                        $message->to(Auth::user()->email);
                    }
            );   
    }  
}
