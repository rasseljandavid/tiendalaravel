<?php

namespace App\Http\Controllers;

// dependencies
use Illuminate\Http\Request;
use App\Http\Requests;
// models
use App\Models\Ecommerce\Category;
use App\Models\Ecommerce\Product;


class SearchController extends Controller
{	


  function index( Request $request ) {

  	$term = $request->term;
  	$category_id = ( isset($request->category_id) ? $request->category_id : 0);

  	$products = array();
  	if($category_id){
  		$products = Product::where('title', 'LIKE', "%{$request->term}%")
											->orWhere('body', 'LIKE', "%{$request->term}%")
											->with(array('categories'=>function($query) use ($category_id){
													$query->where('categories.id', $category_id);
												}))
											->get();

			foreach ($products as $key => $product) {
				if(count($product->categories) == 0){
					unset($products[$key]);
				}
			}

  	}else{
  		$products = Product::where('title', 'LIKE', "%{$request->term}%")
											->orWhere('body', 'LIKE', "%{$request->term}%")
											->get();
  	}
	

  	$categories = Category::all();			
  	return view('search.index', compact('products', 'categories', 'term', 'category_id'));
  }
}
