<?php

namespace App\Http\Controllers\Ecommerce;

// dependencies
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
// models
use App\Models\Ecommerce\OrderStatusChange;
use App\Models\Ecommerce\Status;
use App\Models\Ecommerce\Order;
use App\Models\Address\Address;
use App\User;

class OrdersController extends Controller
{

    public function __construct(  ){
        
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $order = Order::find($id);
        if( (Auth::user()->isAdmin() || ($order->user_id == Auth::user()->id)) && $order !=null ){
            // continue
        }else{
            flash('info', 'Order doesn\'t exist');
            return redirect('/');
        }
        

        $order->load('orderitems');
        $order->shippingAddress = $order->user->getShippingAddress();
        $order->billingAddress = $order->user->getBillingAddress();

        // get progress state
        if($order->status == 5){
            $new_status = $order->getCancelledStatus();
            $other_user = User::find($new_status->changed_by);

            if($new_status->changed_by == Auth::user()->id && !Auth::user()->isAdmin() )
                $order->who_cancelled = 'you';
            else
                $order->who_cancelled = $other_user->getFullname();
                

            // $order->who_cancelled = ($new_status->changed_by == Auth::user()->id ? 'you' : $other_user->getFullname() ) ;
            $order->progress = Status::getOrderProgress($new_status->from_status);
        }else{
            $order->progress = Status::getOrderProgress($order->status);
        }
        
        if($order->status==4)
            $order->status_color = '#A8CD1B';//green
        else if($order->status==5)
            $order->status_color = '#DE1B1B';//red
        else
            $order->status_color = '#cf7400';//orange

        $order->status_id = $order->status;
        $order->status = Status::asString('order', $order->status);

        $admin = array();
        $admin['shippingAddress'] = Address::where('user_id', 0)->shipping()->first();
        $admin['billingAddress'] = Address::where('user_id', 0)->billing()->first();
        $admin = (object)$admin;


        return view('orders.show', compact('order', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function history( ){
        
        $orders = Order::where('user_id', '=', Auth::user()->id)
                        ->where('purchased_at', '!=', '0')
                        ->orderBy('status', 'desc')
                        ->orderBy('purchased_at', 'desc')
                        ->get();

        foreach ($orders as $key => $order) {
            $order->status = ucfirst(Status::asString('order', $order->status));
            $order->totalQuantity = $order->getTotalQuantity();
        }
        // return $orders;
        return view('orders.history', compact('orders'));
    } 


    public function statuschange(Request $request)
    {
        //Check if the sales order is emtpy  
        $request = $request->all();


        // return $request;

        //Estimated date delivery of order
        if(isset($request['estimateddelivery'])) {
            $date = explode('-', $request['estimateddelivery']);
            $startdate = trim(strtotime($date[0]));
            $enddate   = trim(strtotime($date[1]));
            //date('m/d/Y g:i A', trim(strtotime($date[0])));
        }

        $order = Order::find($request['id']);
        if(!$order){
            flash('danger', 'Order doesn\'t exists');
            return redirect('/dashboard');
        }else if($request['status_id'] == 5 && Auth::user()->id != $order->user_id && !Auth::user()->isAdmin()){
            // check when cancelling order if the user is not the owner or if it is not an admin
            return redirect('/');
        }

            

        // Create aa megaventory cancel api request and update the statuss
        if($request['status_id'] == 5) {
            $megaventory = new \Megaventory();

            if(!($megaventory->cancelSalesOrder($order->salesOrderNo))) {
                flash('danger', 'Failed updating inventory, please try again!');
                return redirect('/');
            }

            $order->reason = (isset($request['reason']) ? $request['reason'] : 'not specified') ;
        }

        if($request['status_id'] == 4){
            $order->shipment = $order->formatDatesPicker($request['shipment']);
        }

        if($request['status_id'] == 3){
            $estimateddelivery = explode(' - ', $request['estimateddelivery']);
            $order->estimate_delivery = $order->formatDatesPicker($estimateddelivery[0]).' to ' .$order->formatDatesPicker($estimateddelivery[1]);
        }



        $from_status = $order->status;
        $order->status = $request['status_id'];
        $order->update();

        OrderStatusChange::change($order,$from_status);
        
        if($order->emailInvoice()){
            flash('success', 'Order Status updated');
        }else{
            flash('success', 'Order Status updated. Failed sending email!');
        }

        return redirect()->back();
    }

    // for debugging/development only
    public function displayEmail( Order $order ){
        

        $os = $order->status;
        $order->load('orderitems');
        $order->shippingAddress = $order->user->getShippingAddress();
        $order->billingAddress = $order->user->getBillingAddress();
        $order->status_id = $order->status;
        $order->status = Status::asString('order', $order->status);
        $subject = 'Your order on Tienda.ph was received';

        if($os == 0){// Note: we use 0 instead of 1 because we will send email before the megaventory updates
            // Notice there is no 1 because 1 is also equivalent to received (updated from megaventory) we dont want to notify that changes
            $subject = 'Your order on Tienda.ph has been received';
        } else if($os == 2){
            $subject = 'Your order on Tienda.ph is now being process';
        } elseif ($os == 3) {
            $subject = 'Your order on Tienda.ph is now being shipped';
        } elseif($os == 4 ) {
            $subject = 'Your order on Tienda.ph has been delivered';
        } elseif ($os == 5 ) { 
            $subject = 'Your order on Tienda.ph is cancelled';

            $new_status = $order->getCancelledStatus();
            $other_user = User::find($new_status->changed_by);
            if($new_status->changed_by == Auth::user()->id && !Auth::user()->isAdmin() )
                $order->who_cancelled = 'you';
            else
                $order->who_cancelled = $other_user->getFullname();
        }// elseif ($os == 6 ) { 
        //     $subject = 'Your order on Tienda.ph has been completed';
        // }

        $admin = array();
        $admin['shippingAddress'] = Address::where('user_id', 0)->shipping()->first();
        $admin['billingAddress'] = Address::where('user_id', 0)->billing()->first();
        $admin = (object)$admin;
        
        return view('emails.invoice', compact('order','admin'));
        // return Mail::send( 'emails.invoice', 
        //             [
        //              'order'=>$order,
        //              'admin'=>$admin
        //             ], 
        //             function ($message) use ($subject) {
        //                 $message->subject($subject);
        //                 $message->to(Auth::user()->email);
        //             }
        //     );   
    }
}
