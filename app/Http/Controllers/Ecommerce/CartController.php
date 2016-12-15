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
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Status;
use App\Models\Ecommerce\Order;
use App\companyOrder;
use Carbon\Carbon;
use Megaventory;
use App\User;


class CartController extends Controller
{
    // this is an instace of an order
    public $cart = null;
    private $_apiContext;


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

        if($cart==null){
            flash('danger', 'You\'re cart is empty! Add an item to view cart');
            return redirect('/');
        }

        if($cart){
            $cart->compute();   
        }

        if(!$cart->verifyQuantities($cart)){
            flash('danger', 'A certain quantity/quantities exceeds the current available quantity. Please update items');
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

        if(!$cart->verifyQuantities($cart)){
            return redirect('/cart/show');
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

        if(!$product){
            // flash('warning', 'Product doesn\'t exists. Please try again!');
            return Response::json(['success'=>false,'quantity'=>$request['cart_item_quantity']]);
        }

        // check product quantity
        if($request['cart_item_quantity'] > $product->quantity){
            // flash('warning', 'Insufficient stock for '.$product->title);
            // if(isset($request['cartpage']) && $request['cartpage'] == 'show'){
            //     flash('warning', 'Insufficient stock for '.$product->title);
            //     return redirect('/cart/show');
            // }
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
        if($order==null){
            flash('danger', 'You\'re cart is empty! Add an item to continue checkout');
            return redirect('/cart/checkout');
        }


        $order->comment = $request['comment'];
        $order->save();
        $order->compute();

        if(!$order->verifyQuantities($order)){
            return redirect('/cart/show');
        }

    
        if( $request['modeofpayment'] == 'paypal' ) {
            return redirect()->route('getCheckout', [$order]);
        }

        
        $order->purchased_at = Carbon::now();
        $order->save();

        if(config('app.env') != 'local'){

            if(!$order->emailInvoice()){
                flash('success', 'You\'re order has been submitted');
            }else{
                flash('success', 'You\'re order has been submitted. Failed sending email, please make sure your email is correct/exists');
            }

        }

        return redirect('/order/'.$order->id);
       
        // return $order->matchMegaventoryStructure();
        // $megaventory = new \Megaventory();

        // try{
            
        //     $myOrder = (array)$megaventory->createSalesOrder($order->matchMegaventoryStructure());
        //     $order->salesOrderNo = $myOrder['SalesOrderNo'];
        //     $order->update();
        //     if($order->emailInvoice()){
        //         flash('success', 'You\'re order has been submitted');
        //     }else{
        //         flash('success', 'You\'re order has been submitted');
        //         // flash('success', 'You\'re order has been submitted.
        //         //     Note: Failed Sending Email at '.Auth::user()->email);
        //     }

        //     return redirect('/order/'.$order->id);
        //     //save here
        // }catch(Exception $e){
        //     flash('danger', 'An error has occured. Please submit the order again');
        //     return redirect('/cart/checkout');
        // }
        
    }   

    public function cloudstaff() {

        //Slots of available delivery
        $slots = ["11" => "11AM" , "13" => "1PM" , "15" => "3PM" , "17" => "5PM" ];

        //Get the current time
        $now =  Carbon::now();
        //For current day slot
        foreach($slots as $key => $slot) {
            //if the time now is more than the 15mins of the current slot use the current day
            if ($now->diffInMinutes(Carbon::createFromTime($key,0,0), false) > 50) {
                $deliverydates[Carbon::createFromTime($key,0,0)->toDayDateTimeString('D')] = Carbon::createFromTime($key,0,0)->toDayDateTimeString('D');
            }
        }
        //For next day slots
        foreach($slots as $key => $slot) {
            if(Carbon::tomorrow()->format('D') == "Sun") {
               $deliverydates[Carbon::createFromTime($key + 48,0,0)->toDayDateTimeString('D')] = Carbon::createFromTime($key + 48,0,0)->toDayDateTimeString('D');
            } else {
                $deliverydates[Carbon::createFromTime($key + 24,0,0)->toDayDateTimeString('D')] = Carbon::createFromTime($key + 24,0,0)->toDayDateTimeString('D');
            }
        }

        $category = Category::fromSlug("food-delivery")->first();
        $products = $category->getProductByCategory();
        return view('cart.cloudstaff', compact('products', 'deliverydates'));
    }

    public function companyOrder(Request $request ) {

        $companyOrder = new companyOrder();

        $companyOrder->name = $request['name'];
        $companyOrder->mobile = $request['mobile'];
        $companyOrder->company = $request['company'];
        $companyOrder->branch = $request['branch'];
        $companyOrder->deliverydate = $request['deliverytime'];
        $companyOrder->orders = $request['orders'];

        $returnVal = $companyOrder->save();

        if(strlen(trim($request['mobile'])) == 11) {

            $chikkaAPI = new \ChikkaSMS();
            $messageID = md5(microtime().'abc3');// do not delete.. we need it to be unique
            $text = 'We received your order # ' . date('ymd') . $companyOrder->id . ' and it will be processed on time. If you have questions or suggestions, please call 045-308-5345 or add us on Skype: hello@tienda.ph. Thanks for choosing Tienda!';
            $number = $request['mobile'];
            $number = '63'. substr($number, 1);//remove 0
            $response = $chikkaAPI->sendText($messageID, $number, $text);

            //Alert to rina
            $messageID = md5(microtime().'abc34');// do not delete.. we need it to be unique
            $text = 'This is a notification that someone ordered in Tienda Food Delivery from Cloudstaff at ' . $request['deliverytime'];
            $number = '639258166813';
            $response = $chikkaAPI->sendText($messageID, $number, $text);
        }

        return response()->json($returnVal, 200);
    }
}
