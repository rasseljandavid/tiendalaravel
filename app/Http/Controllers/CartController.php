<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CartController extends Controller
{
    public function show() {
    	return view('cart.show');
    }

    public function checkout() {
    	return view('cart.checkout');
    }

    public function compare() {
    	return view('cart.compare');
    }

    public function wishlist() {
    	return view('cart.wishlist');
    }

}
