<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Category;


class CategoriesController extends Controller
{

    public function __construct(  ){
        
        $this->middleware('admin', ['only'=> ['index']]);
    }

	public function index(  ){

        $categories = Category::all();

		return view('category.index', compact('categories'));
	}

    public function show( $slug ) {

    	$category = Category::fromSlug($slug)->first();
        $categories = Category::all();
        if(!$category){
            return 'category do not exists';
        }

        $products = $category->getProductByCategory();
        return view('category.show', compact('categories', 'products', 'category'));
    }
}
