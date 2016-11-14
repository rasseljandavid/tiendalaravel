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
        $featured['bestseller'] = $p->getBestSellerProduct()->random(5);
        $featured['special'] = $p->getSpecialProduct()->random(5);
        if(!$category){
            return 'category do not exists';
        }
        return view('category.show', compact('categories', 'category', 'slug', 'featured'));
    }

    public function loadProducts(Request $request) {
        $request = $request->all();
        $sort = explode('_', $request['sort']);
        $category = Category::fromSlug($request['category'])->first();
        $products = $category->getProductByCategory($request['perpage'], $sort[0], $sort[1]);

        return Response::json(View::make('category.pagination', array('products' => $products))->render());
    }
            
}
