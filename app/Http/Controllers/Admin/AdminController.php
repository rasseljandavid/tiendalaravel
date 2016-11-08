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
    	
    	$received = Order::received()->get();
    	$onProcess = Order::onProcess()->get();
    	$onTransit = Order::onTransit()->get();
    	$shipped = Order::shipped()->get();

    	return view('admin.dashboard', compact('received', 'onProcess', 'onTransit', 'shipped'));
    }
}
