<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Order;
use App\Orderitem;
use App\Product;


class CartController extends Controller
{
    // this is generally an order
    private static $cart = null;

    public function show() {
    	return view('cart.show');
    }

    public function checkout() {
    	return view('cart.checkout');
    }

    public function compare() {
    	return view('cart.compare');
    }

    public function wishlist() {
    	return view('cart.wishlist');
    }

    public function addItem( Request $request ){
        
        $this->validate($request, [
                'cart_item_quantity' => "required|numeric|min:1",
                'product_id' => "required|numeric"
            ]);

        if(!self::$cart){
            $this->makeCart();
        }

        $product = Product::find($request['product_id']);

        // check product quantity
        if($request['cart_item_quantity'] > $product->quantity){
            redirect(url('/'));
        }

        $request['quantity'] = $request['cart_item_quantity'];
        $request['price'] = ($product->salePrice ? $product->salePrice : $product->price);

        self::$cart->addOrderitem($request->all());

        $cart = self::$cart;
        return redirect()->back();
    }

    private function makeCart(  ){

        $order = null;

        if(session()->get('tienda-cart')){
             $order = Order::where([
                ['user_id', '=', User::getUserId()],
                ['session', '=', session()->get('tienda-cart')], 
                ['purchased_at', '=', null],
            ])->first();
        }
        
        if(!$order){
            $session = $this->setCartSession();
        
            $order = new Order;
            $order->user_id = User::getUserId();
            $order->session = $session;
            $order->save();
        }

        self::$cart = $order;
        unset($order);
    }


    private function setCartSession(){

        $session = hash('ripemd160', $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        session()->set('tienda-cart', $session);
        return session()->get('tienda-cart');
    }

    
}
