<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Response;
use View;
use App\Category;


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
        $categories = Category::all();
        if(!$category){
            return 'category do not exists';
        }
        return view('category.show', compact('categories', 'category', 'slug'));
    }

    public function loadProducts(Request $request) {
        $request = $request->all();
        $sort = explode('_', $request['sort']);
        $category = Category::fromSlug($request['category'])->first();
        $products = $category->getProductByCategory($request['perpage'], $sort[0], $sort[1]);

        return Response::json(View::make('category.pagination', array('products' => $products))->render());
    }
            
}
