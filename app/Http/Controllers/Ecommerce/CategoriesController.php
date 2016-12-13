<?php

namespace App\Http\Controllers\Ecommerce;

// dependencies
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Response;
use Auth;
use View;
// models
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Product;

class CategoriesController extends Controller
{

    public function __construct(  ){
        
        $this->middleware('admin', ['only'=> ['index']]);
    }

    public function index(){

        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    public function show( $slug ) {

        $category = Category::fromSlug($slug)->first();
        $categories = Category::orderBy('rank')->get();
        $p = new Product;
        $featured = [];
        $featured['bestseller'] = $p->getBestSellerProductRandom();
        $featured['featured'] = $p->getFeaturedProductRandom();
        $products = $category->getProductByCategory();
        $nextpage = substr($products->toArray()['next_page_url'] , -1);
        // return $products;
        if(!$category){
            return 'category do not exists';
        }
        return view('category.show', compact('categories', 'category', 'slug', 'featured', 'products', 'nextpage'));
    }

    public function loadProducts(Request $request) {
        $request = $request->all();
        $category = Category::fromSlug($request['category'])->first();
        //$products = $category->getProductByCategory($request['perpage'], $sort[0], $sort[1]);
        if(isset($request['ajax_action'])) {
            $sort = explode('_', $request['sort']);
            $products = $category->getProductByCategory(20 ,$sort[0], $sort[1]);
            $nextpage = substr($products->toArray()['next_page_url'] , -1);
            return Response::json(View::make('category.pagination', array('products' => $products ,'nextpage' => $nextpage, 'slug'=>$request['category']))->render());
        } else {
            $products = $category->getProductByCategory();    
            $nextpage = substr($products->toArray()['next_page_url'] , -1);
            return View::make('category.pagination', array('products' => $products, 'nextpage' => $nextpage, 'slug'=>$request['category']));
        }
    }
            
}
