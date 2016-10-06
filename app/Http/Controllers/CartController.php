<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Order;
use App\Orderitem;
use App\Product;
use Auth;


class CartController extends Controller
{
    // this is an instace of an order
    public $cart = null;

    public function __construct(  ){
        $this->middleware('admin', ['only' => ['index']]);
    }

    public function index(  ){
        $cart = self::getCart();
        if(!$cart)
            return 'no cart';
        $cart['orderitems'] = $cart->orderitems;
        return $cart;
    }

    public function show() {
        $cart = self::getCart(true);
    	return view('cart.show', compact('cart'));
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

        if(!$this->cart){
            $this->makeCart();
        }

        $product = Product::find($request['product_id']);

        // check product quantity
        if($request['cart_item_quantity'] > $product->quantity){
            flash('warning', 'Insufficient stock for '.$product->title);
            return redirect()->back();
        }

        $request['quantity'] = $request['cart_item_quantity'];
        $request['price'] = ($product->salePrice ? $product->salePrice : $product->price);


        $cart = $this->cart;
        try{
            $cart->addOrderitem($request->all());
            $cart->compute();
            $cart['orderitems'] = $cart->orderitems;
        }catch(Exception $e){
            flash('error', 'Error occured: Please try again');
        }
        
        return redirect()->back();
    }

    public function removeItem( Request $request ){
        
        $cart = self::getCart();
        $oi = $cart->orderitems()->where('id', $request['item-id'])->first();

        // do not delete when orderitem doesn't belong to current cart
        if(!$oi){
            flash('error', 'You cannot delete the item');
            return redirect()->back();
        }
     
        $prod = $oi->getProduct();
        $cart->removeOrderitem($oi);

        flash('success', 'Removed '.$oi->quantity.' '. $prod->title .'from your cart');
        return redirect()->back();
    }

    public static function getCart( $oi=false ){
        
        if(Auth::check()){
            $order = Order::where([
                ['user_id', '=', User::getUserId()],
                ['purchased_at', '=', null],
            ])->first();
            return ( $oi ? $order->load(['orderitems' => 
                function($query){$query->orderBy('updated_at','desc');}]) : $order);
        }

        if(self::getCartSession()){
            $order = Order::where([
                ['user_id', '=', User::getUserId()],
                ['session', '=', self::getCartSession()], 
                ['purchased_at', '=', null],
            ])->first();
            return ( $oi ? $order->load(['orderitems' => 
                function($query){$query->orderBy('updated_at','desc');}]) : $order);
        }
        
        return null;
    }

    private function makeCart(  ){

        $order = self::getCart();
        
        if(!$order){
            $session = $this->setCartSession();
        
            $order = new Order;
            $order->user_id = User::getUserId();
            $order->session = $session;
            $order->save();
        }

        $this->cart = $order;
        unset($order);
    }

    public function combine(){

        Order::mergeWithPrevious();
        flash('success', 'Welcome back '.Auth::user()->getFullname());
        return redirect('/');
    }

    private function setCartSession(){

        $session = hash('ripemd160', $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        session()->set('tienda-cart', $session);
        return session()->get('tienda-cart');
    }

    public static function getCartSession(  ){
        return session()->get('tienda-cart', null);
    }

    
}
