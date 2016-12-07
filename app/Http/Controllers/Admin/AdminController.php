<?php

namespace App\Http\Controllers\Admin;

// dependencies
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
// models
use App\Models\Ecommerce\Order;
use App\Models\Admin\Admin;


class AdminController extends Controller
{
    
    public function __construct(  ){
    	
    	$this->middleware('admin');
    }

    public function dashboard(  ){
    	
    	$received = Order::received()->orderBy('created_at', 'desc')->get();
    	$onProcess = Order::onProcess()->orderBy('created_at', 'desc')->get();
    	$onTransit = Order::onTransit()->orderBy('created_at', 'desc')->get();
    	$shipped = Order::shipped()->orderBy('created_at', 'desc')->get();
        $cancelled = Order::cancelled()->orderBy('created_at', 'desc')->get();

    	return view('admin.dashboard', compact('received', 'onProcess', 'onTransit', 'shipped', 'cancelled'));
    }
}
