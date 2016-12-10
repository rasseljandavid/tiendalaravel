<?php

namespace App\Http\Controllers\Admin;

// dependencies
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
// models
use App\Models\Ecommerce\Order;
use App\Models\Admin\Admin;
use App\User;


class AdminController extends Controller
{
    
    public function __construct(  ){
    	
    	$this->middleware('admin');
    }

    public function dashboard(  ){
    	
    	$received = Order::received()->orderBy('created_at', 'desc')->get();
    	$onProcess = Order::onProcess()->orderBy('created_at', 'desc')->get();
    	$onTransit = Order::onTransit()->orderBy('created_at', 'desc')->get();
    	$shipped   = Order::shipped()->orderBy('created_at', 'desc')->get();
        $cancelled = Order::cancelled()->orderBy('created_at', 'desc')->get();
        $cancelled = Order::cancelled()->orderBy('created_at', 'desc')->get();
        $cbc = array();//cancelled by customer
        $cba = array();//cancelled by admin
        foreach ($cancelled as $key => $order) {
            $new_status = $order->getCancelledStatus();
            if($new_status->seen)
                continue;
            $who_cancelled = User::find($new_status->changed_by)->first();
            if($who_cancelled->isAdmin() && $order->user_id == $who_cancelled->id)
                $cbc[] = $order;
            elseif(!$who_cancelled->isAdmin() && $order->user_id == $who_cancelled->id)
                $cbc[] = $order;
            elseif($who_cancelled->isAdmin() && $order->user_id != $who_cancelled->id)
                $cba[] = $order;
        }
        unset($cancelled);

        $ctrReceived = (count($received) ? count($received) : 0 );
        $ctrOnProcess = Order::select('salesOrderNo')->onProcess()->orderBy('created_at', 'desc')->distinct()->count();
        $ctrOnTransit = Order::select('salesOrderNo')->onTransit()->orderBy('created_at', 'desc')->distinct()->count();
        $ctrShipped   = Order::select('salesOrderNo')->shipped()->orderBy('created_at', 'desc')->distinct()->count();
        $ctrCbc = count($cbc);
        $ctrCba = count($cba); 

        


    	return view('admin.dashboard', 
            compact('received', 'onProcess', 'onTransit', 'shipped', 'cbc',
                    'ctrReceived', 'ctrCbc', 'ctrCba', 'ctrOnProcess', 'ctrOnTransit', 'ctrShipped'));
    }
}
