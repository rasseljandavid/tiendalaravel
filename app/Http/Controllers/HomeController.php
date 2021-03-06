<?php

namespace App\Http\Controllers;

// dependencies
use Illuminate\Http\Request;
use App\Http\Controllers\Ecommerce\CartController as Cart;
// models
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Supplier;
use App\Models\Ecommerce\Status;

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
        // $cart = Cart::getCart();
        // if($cart)
        //     $cart->orderitems = $cart->orderitems()->orderBy('updated_at', 'desc')->take(2)->get();

        $categories = [];

        $beverages = Category::fromSlug('beverages')->first();
        $categories['Beverages'] = $beverages->getFeaturedProductByCategory()->take(10);
        $beverages = Category::fromSlug('snacks')->first();
        $categories['Snacks']    = $beverages->getFeaturedProductByCategory()->take(10);

        $p = new product;
        $featured = [];
        
        $featured['latest']    = $p->getLatestProduct()->take(10);
        $featured['featured']   = $p->getFeaturedProduct()->take(10);
        $featured['bestseller'] = $p->getBestSellerProduct()->take(10);

        $suppliers = Supplier::all();
        
        return view('home.index', compact('featured', 'categories', 'suppliers'));
    }

    // this is a chikka callback function if we implement chikka notification 
    public function chikka(Request $request){

        $chikkaAPI = new ChikkaSMS();
        if ($chikkaAPI->receiveNotifications() === null) {
                header("HTTP/1.1 400 Error");
                echo "Message has not been processed.";
            }
        else{
            echo "Message has been successfully processed.";
        }
        var_dump($chikkaAPI->receiveNotifications());
            
    }
}