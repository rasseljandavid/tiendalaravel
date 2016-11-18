<?php

namespace App\Http\Controllers\Address;

// dependencies
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
// models
use Auth;

class AddressesController extends Controller
{
	public function __construct(  ){
		
		$this->middleware('auth');
	}
    
	public function show( ){
		$shipping = Auth::user()->getShippingAddress(); 
  		$billing = Auth::user()->getBillingAddress(); 
 
  		return view('address.show', compact(['shipping', 'billing']));
  	}

  	public function edit( ) {
  		$shipping = Auth::user()->getShippingAddress(); 
  		$billing = Auth::user()->getBillingAddress(); 

  		return view('address.edit', compact(['shipping', 'billing']));
  	}

  	public function update( Request $request ){
	  	$user = Auth::user();

	    $this->validate($request, [
	      	'shipping_to'						=> 'required|max:255',
	        'shipping_address_one'   => 'required|max:255',
	        'shipping_city'          => 'required|max:255',
	        'shipping_zipcode'       => 'required|max:255',
	        'shipping_country'       => 'required|max:255',
	        'billing_address_one'   => 'required|max:255',
	        'billing_city'          => 'required|max:255',
	        'billing_zipcode'       => 'required|max:255',
	        'billing_country'       => 'required|max:255',
	    ]);

	    $shipping = $user->getShippingAddress();
	    $shipping->to 				 = $request->shipping_to;
	    $shipping->address_one = $request->shipping_address_one;
	    $shipping->city        = $request->shipping_city;
	    $shipping->zipcode     = $request->shipping_zipcode;


	    $billing = $user->getBillingAddress();
	    $billing->to 				  = $request->billing_to;
	    $billing->address_one = $request->billing_address_one;
	    $billing->city        = $request->billing_city;
	    $billing->zipcode     = $request->billing_zipcode;

	    try {
		    $shipping->save();
		    $billing->save();
		    flash('success', 'Successfully updated your address information');
		    return redirect('/address');
		} catch (Exception $e) {
		    flash('danger', 'An error has encountered. Please try again.');
		    return redirect()->back();
	  	}
  	}
}