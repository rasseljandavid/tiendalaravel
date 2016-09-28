<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

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
        $beverages = Category::fromSlug('beverages-2')->first();
        $products['Beverages'] = $beverages->getProductByCategory();
        $beverages = Category::fromSlug('beverages-2')->first();
        $products['Snacks']    = $beverages->getProductByCategory();

        $featured = [];

        for ($i=0; $i < 4; $i++) { 
            $product = new \stdClass();
            $product->id = 42;
            $product->title = 'Brand Fashion Cotton T-Shirt';
            $product->base_price = 112.00;
            $product->new_price = 110.00;
            $product->discount = 2.00;
            $product->savings = '10%';
            $product->image = 'apple_cinema_30-220x330.jpg';
            $product->rating = 4;
            $featured[] = $product;

            $product = new \stdClass();
            $product->id = 49;
            $product->title = 'Aspire Ultrabook Laptop';
            $product->base_price = 241.99;
            $product->new_price = 230.00;
            $product->discount = 11.99;
            $product->savings = '5%';
            $product->image = 'samsung_tab_1-220x330.jpg';
            $product->rating = 4;
            $featured[] = $product;
        }

        $latest = [];

        for ($i=0; $i < 4; $i++) { 
            $product = new \stdClass();
            $product->id = 43;
            $product->title = 'Pnina Tornai Perfume';
            $product->base_price = 110.0;
            $product->new_price = 0;
            $product->discount = 0;
            $product->savings = '0';
            $product->image = 'macbook_2-220x330.jpg';
            $product->rating = 0;
            $latest[] = $product;

            $product = new \stdClass();
            $product->id = 50;
            $product->title = 'Make Up for Naturally Beautiful Better';
            $product->base_price = 123.00;
            $product->new_price = 0;
            $product->discount = 0;
            $product->savings = '0';
            $product->image = 'macbook_3-220x330.jpg';
            $product->rating = 2;
            $latest[] = $product;
        }

        return view('home', [
            'featured'=>$featured,
            'latest'=>$latest,
            'products'=>$products
            ]);
    }
}
