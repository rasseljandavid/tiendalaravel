<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\Http\Controllers\CartController as Cart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cart = Cart::getCart();
        $session = session()->get('tienda-cart');
        // return $session;
        // return $cart;


        $categories = [];

        $beverages = Category::fromSlug('beverages')->first();
        $categories['Beverages'] = $beverages->getProductByCategory()->take(10);
        $beverages = Category::fromSlug('snacks')->first();
        $categories['Snacks']    = $beverages->getProductByCategory()->take(10);

        $p = new product;
        $featured = [];
        $featured['featured'] = $p->getFeaturedProduct()->take(10);
        $featured['bestseller'] = $p->getBestSellerProduct()->take(10);
        $featured['special'] = $p->getSpecialProduct()->take(10);
        
        return view('home.index', compact('featured', 'categories'));
    }
}
