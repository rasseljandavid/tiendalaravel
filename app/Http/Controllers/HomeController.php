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
        $products = [];
        $beverages = Category::fromSlug('beverages')->first();
        $products['Beverages'] = $beverages->getProductByCategory()->take(20);
        $beverages = Category::fromSlug('snacks')->first();
        $products['Snacks']    = $beverages->getProductByCategory()->take(20);

        $p = new product;

        $products['featured'] = $p->getFeaturedProduct()->take(20);
        $products['bestseller'] = $p->getBestSellerProduct()->take(20);
        $products['special'] = $p->getSpecialProduct()->take(20);

        $category = Category::all();
        

        return view('home.index', [
            'category'=>$category,
            'products'=>$products
            ]);
    }
}
