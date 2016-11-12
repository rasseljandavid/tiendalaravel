<?php

namespace App\Http\Controllers;

// dependencies
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
// models
use App\User;

class UsersController extends Controller
{

	public function __construct(  ){
		
		$this->middleware('auth');
	}
   
  public function show( ){
 
  	return view('users.show');
  }

  public function edit( $id ){
  	
  	$user = User::find($id);

  	if(!$user || Auth::user()->id != $id){
  		flash('danger', 'User doesn\'t exist');
      return redirect('/');
	  }


    return view('users.edit', compact('user'));
  }

  public function update( Request $request ){
    
    $user = Auth::user();

    $this->validate($request, [
        'firstname'     => 'required|max:255',
        'lastname'      => 'required|max:255',
        'email'         => "required|email|max:255|unique:users,email,".$user->id,
        'contact'       => 'required|numeric|min:9',
        'address_one'   => 'required|max:255',
        'city'          => 'required|max:255',
        'zipcode'       => 'required|max:255',
        'country'       => 'required|max:255',
    ]);


    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    $user->contact = $request->contact;


    $shipping = $user->getShippingAddress();
    $shipping->address_one = $request->address_one;
    $shipping->city = $request->city;
    $shipping->zipcode = $request->zipcode;


    $billing = $user->getBillingAddress();
    $billing->address_one = $request->address_one;
    $billing->city = $request->city;
    $billing->zipcode = $request->zipcode;
    

    try {
      $user->save();
      $shipping->save();
      $billing->save();
      flash('success', 'Successfully saved changes on you information');
      return redirect('/account');
    } catch (Exception $e) {
      flash('danger', 'An error has encountered. Please try again.');
      return redirect()->back();
    }
  }

}
