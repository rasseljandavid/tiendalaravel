<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class NotfoundController extends Controller
{
    public function index(Request $request) {
    	return view('errors.404');
    }
    		
}
