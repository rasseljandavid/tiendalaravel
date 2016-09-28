<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Category;


class CategoriesController extends Controller
{

	public function index(  ){

		if(!Auth::check() || !Auth::user()->isAdmin()){
            return redirect(url('/'));
        }

        $categories = Category::all();

		return view('category.index', compact('categories'));
	}

    public function show( $slug ) {

    	$category = Category::fromSlug($slug)->first();

        if(!$category){
            return 'category do not exists';
        }

        return $category;
        return view('category.show', compact('category'));
    }
}
