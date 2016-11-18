<?php

namespace App\Http\Controllers\Ecommerce;

// dependencies
use App\Http\Controllers\Auth\RegisterController as Register;
use App\Http\Controllers\Auth\LoginController as Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use Redirect;
use Auth;
use View;
// models
use App\Models\Ecommerce\OrderItem;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Order;
use Carbon\Carbon;
use Megaventory;
use App\User;


class CartController extends Controller
{
    // this is an instace of an order
    public $cart = null;


    public function __construct(  ){

        $this->middleware('admin', ['only' => ['index']]);
    }

    /*--  SESSION  --*/
    private function setCartSession(){
        $session = hash('ripemd160', $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);
        session()->set('tienda-cart', $session);
        return session()->get('tienda-cart');
    }

    public static function getCartSession(  ){

        return session()->get('tienda-cart', null);
    }
    /*--  END SESSION  --*/


    /*-- DISPLAY --*/
    public function index(  ){
        $cart = self::getCart();
        if(!$cart)
            return 'no cart';
        $cart['orderitems'] = $cart->orderitems;
        return $cart;
    }

    public function show() {
        $cart = self::getCart(true);
        if($cart){
            $cart->compute();   
        }
    	return view('cart.show', compact('cart'));
    }

    public function checkout() {
        $cart = self::getCart(true);
        // empty cart. redirect to home
        if($cart == null || !$cart->orderitems->count()){
            flash('danger', 'You\'re cart is empty! Add an item to continue checkout');
            return redirect('/');
        }
        $cart->compute();
    	return view('cart.checkout', compact('cart'));
    }

    public function loadMinicart(){

        return Response::json(View::make('cart.minicart')->render());
    }

    public function compare() {

    	return view('cart.compare');
    }

    public function wishlist() {

    	return view('cart.wishlist');
    }


    public function addItem( Request $request){
        
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
            // flash('warning', 'Insufficient stock for '.$product->title);
            if(isset($request['cartpage']) && $request['cartpage'] == 'show'){
                flash('warning', 'Insufficient stock for '.$product->title);
                return redirect('/cart/show');
            }
            return Response::json(['success'=>false]);
        }

        $request['quantity'] = $request['cart_item_quantity'];
        $request['price'] = ($product->salePrice ? $product->salePrice : $product->price);


        $cart = $this->cart;
        try{
            $cart->addOrderitem($request->all());
            $cart->compute();
            $cart['orderitems'] = $cart->orderitems;
            if(isset($request['cartpage']) && $request['cartpage'] == 'show'){
                return redirect('/cart/show');
            }
            return Response::json(['success'=>true,'quantity'=>$request['quantity']]);
        }catch(Exception $e){
            // flash('error', 'Error occured: Please try again');
            $item = self::getCart()->getItemFromProduct($product->id);
            return Response::json(['success'=>false,'quantity'=>$item->quantity]);
        }
    }

    public function removeItem( Request $request ){
        
        $cart = self::getCart();
        $oi = $cart->orderitems()->where('id', $request['item-id'])->first();

        // do not delete when orderitem doesn't belong to current cart
        if(!$oi){
            flash('danger', 'You cannot delete the item');
            return redirect()->back();
        }
     
        $prod = $oi->getProduct();
        $cart->removeOrderitem($oi);

        if(count($cart->orderitems) == 0){
            $cart->delete();
            $this->cart = null; 
        }

        flash('success', 'Removed '.$oi->quantity.' '. $prod->title .'from your cart');
        return redirect()->back();
    }

    public static function getCart( $oi=false ){
        
        if(Auth::check()){
            $order = Order::where([
                ['user_id', '=', User::getUserId()],
                ['purchased_at', '=', null],
            ])->first();
            return ( ($oi && $order) ? $order->load(['orderitems' => 
                function($query){$query->orderBy('updated_at','desc');}]) : $order);
        }

        if(self::getCartSession()){
            $order = Order::where([
                ['user_id', '=', User::getUserId()],
                ['session', '=', self::getCartSession()], 
                ['purchased_at', '=', null],
            ])->first();
            return ( ($oi && $order) ? $order->load(['orderitems' => 
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

    public function combine( Request $request ){

        Order::mergeWithPrevious();

        if(isset($request['checkout'])){
            return $this->preprocess($request);
        }
        
        return redirect('/');
    }

    public function preprocess( Request $request ){

        // return $request->all();
            
        if( !Auth::check() ){
            $request['checkout'] = 'checkout';
            if($request['account'] == 'returning'){
                $request['email'] = $request['login-email'];
                $request['password'] = $request['login-password'];
                return (new Login)->login($request);
            }else if($request['account'] == 'register'){
                return (new Register)->register($request); 
            }else{
                flash('danger', 'Invalid Checkout!');
                return redirect('/'); 
            }
        }


       
        $order = self::getCart(true);

        $order->compute();

        $order->comment = $request['comment'];
        $order->purchased_at = Carbon::now();
        // return $order->matchMegaventoryStructure();
        $megaventory = new \Megaventory();

        try{

            $myOrder = (array)$megaventory->createSalesOrder($order->matchMegaventoryStructure());
            $myOrder["SalesOrderStatus"] = 0;
            $order->status = 1;
            $order->update();


            if($order->emailInvoice()){
                flash('success', 'You\'re order has been submitted');
            }else{
                flash('success', 'You\'re order has been submitted');
                // flash('success', 'You\'re order has been submitted.
                //     Note: Failed Sending Email at '.Auth::user()->email);
            }

            return redirect('/order/'.$order->id);
            //save here
        }catch(Exception $e){
            flash('danger', 'An error has occured. Please submit the order again');
            return redirect('/cart/checkout');
        }
        
        return $order;
    }   

    
}
