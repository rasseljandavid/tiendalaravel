<?php

namespace App\Http\Controllers\Admin;

// dependencies
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
// models
use App\Models\Ecommerce\Order;
use App\Models\Admin\Admin;
use App\companyOrder;
use Carbon\Carbon;
use App\User;
use Auth;


class AdminController extends Controller
{
    
    public function __construct(  ){
    	
    	$this->middleware('admin');
    }

    public function dashboard(  ){
    	
    	$received = Order::received()->orderBy('created_at', 'desc')->get();
        $cancelled = Order::cancelled()->orderBy('created_at', 'desc')->get();
        $companyOrders = companyOrder::orderBy('id','desc')->get();
        $cba = Order::cancelled()->has('cancelledByAdmin')->orderBy('created_at', 'desc')->get();
        $cbu = Order::cancelled()->has('cancelledByUser')->orderBy('created_at', 'desc')->get();  

        $ctr = $this->getSideBarCounter();

        $now = Carbon::now()->format('m/d/Y g:i A');
        $tom = Carbon::tomorrow()->format('m/d/Y g:i A');
        
        return view('admin.dashboard', 
            compact('ctr', 'received', 'cbu', 'cba', 'companyOrders',
                    'now','tom'));
    }


    public function orders( $status=null ){
        
        if(!$status){
            flash('warning', 'Invalid order status');
            return redirect('/dashboard');
        }

        $now = Carbon::now()->format('m/d/Y g:i A');
        $tom = Carbon::tomorrow()->format('m/d/Y g:i A');

        $ctr = $this->getSideBarCounter();

        $orders;
        $title = '';$class = '';
        switch (strtolower($status)) {
            case 'received':
                $orders = Order::received()->orderBy('created_at', 'desc')->paginate(5);
                $title = 'New Received Orders';
                $class = 'primary';
                break;
            case 'on-process':
                $orders = Order::onProcess()->orderBy('created_at', 'desc')->paginate(5);
                $title = 'On Process';
                $class = 'success';
                break;
            case 'on-transit':
                $orders = Order::onTransit()->orderBy('created_at', 'desc')->paginate(5);
                $title = 'On Transit';
                $class = 'info';
                break;
            case 'shipped':
                $orders = Order::shipped()->orderBy('created_at', 'desc')->paginate(5);
                $title = 'Shipped';
                $class = 'default';
                break;
            case 'cancelled-by-user':
                $orders = Order::cancelled()
                                ->has('cancelledByUser')
                                ->orderBy('created_at', 'desc')->paginate(5); 
                $title = 'Cancelled by User';
                $class = 'danger';
                break;
            case 'cancelled-by-admin':
                $orders = Order::cancelled()
                                ->has('cancelledByAdmin')
                                ->orderBy('created_at', 'desc')->paginate(5);
                $title = 'Cancelled by Admin';
                $class = 'default';
                break;
            default:
                # code...
                break;
        }        
        return view('admin.orderpaginate', compact('ctr','orders','title','class','now','tom'));
    }

    public function getSideBarCounter(){
        $ctr = array();
        $ctr['received']    = Order::received()->count();
        $ctr['onprocess']   = Order::onProcess()->count();
        $ctr['ontransit']   = Order::onTransit()->count();
        $ctr['shipped']     = Order::shipped()->count();
        $ctr['cba']         = Order::cancelled()->has('cancelledByAdmin')->count();
        $ctr['cbu']         = Order::cancelled()->has('cancelledByUser')->count();
        $ctr['company']     = companyOrder::count();
        $ctr = (object)$ctr;
        return $ctr;
    }


}
