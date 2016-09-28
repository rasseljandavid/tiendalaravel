<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\User;

class UsersController extends Controller
{

	public function __construct(  ){
		
		$this->middleware('auth');
	}
   
    public function show( ){
   
    	return view('users.show');
    }
}
