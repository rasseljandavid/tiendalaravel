<?php

namespace App\Http\Controllers\Ecommerce;

// dependencies
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
// models
use App\Models\Ecommerce\Status;
use App\Models\Ecommerce\Order;
use App\Models\Address\Address;

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


    public function cancelorder(Request $request)
    {
        //Check if the sales order is emtpy  
        $request = $request->all();
        $order = Order::where('salesOrderNo', '=', $request['ordernumber'])->first();
        
            if (empty($order)) {
                flash('info', 'Order doesn\'t exist');
                return redirect('/');
            }

            //Check if it is NOT either admin or the owner of the order, kick him if necessary
            if(!((Auth::user()->isAdmin() || ($order->user_id == Auth::user()->id)) && $order !=null) ){
                flash('info', 'Not a chance, baby!');
                return redirect('/');
            }
            
            // Create aa megaventory cancel api request and update the statuss
        if($request['status_id'] == 4) {
            $megaventory = new \Megaventory();

            if(!($megaventory->cancelSalesOrder($order->salesOrderNo))) {
                flash('danger', 'There is a problem, please try again!');
                return redirect('/');
            } 

            $order->status = 4;
            $order->update();
        } else {
            $order->status = $request['status_id'];
            $order->update();
        }
        $order->emailInvoice();
        flash('success', 'Order Status updated');
        return redirect()->back();
    }
}
