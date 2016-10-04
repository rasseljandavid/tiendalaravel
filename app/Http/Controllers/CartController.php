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

        if(!$this->cart){
            $this->makeCart();
        }

        $product = Product::find($request['product_id']);

        // check product quantity
        if($request['cart_item_quantity'] > $product->quantity){
            flash('warning', 'Please add a valid quantity for '.$product->title);
            redirect(url('/'));
        }

        $request['quantity'] = $request['cart_item_quantity'];
        $request['price'] = ($product->salePrice ? $product->salePrice : $product->price);


        $cart = $this->cart;
        try{
            $cart->addOrderitem($request->all());
            $cart['orderitems'] = $cart->orderitems;
            flash('success', 'Added '.$request['quantity'].' '.$product->title.' to your cart');
        }catch(Exception $e){
            flash('error', 'Error occured: Please try again');
        }
        return redirect()->back();
    }

    public static function getCart(  ){
        
        if(Auth::check()){
            $order = Order::where([
                ['user_id', '=', User::getUserId()],
                ['purchased_at', '=', null],
            ])->first();
            return $order;
        }

        if(self::getCartSession()){
            $order = Order::where([
                ['user_id', '=', User::getUserId()],
                ['session', '=', self::getCartSession()], 
                ['purchased_at', '=', null],
            ])->first();
            return $order;
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
        return (session()->get('tienda-cart') ? session()->get('tienda-cart') : null);
    }

    
}
