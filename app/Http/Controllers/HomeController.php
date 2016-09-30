<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Product;

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
       
        $category = [];

        // $beverages = (Category::fromSlug('beverages')->first())->getProductByCategory()->take(20);
        // $category['Beverages'] = $beverages;
        // $beverages = Category::fromSlug('snacks')->first();
        // $products['Snacks']    = $beverages->getProductByCategory()->take(20);

        $p = new product;
        $featured = [];
        $featured['featured'] = $p->getFeaturedProduct()->take(10);
        $featured['bestseller'] = $p->getBestSellerProduct()->take(10);
        $featured['special'] = $p->getSpecialProduct()->take(10);
        
        return view('home.index', compact('featured'));
    }
}
