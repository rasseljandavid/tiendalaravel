<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Category;

class CategoriesController extends Controller
{
    function show() {
    	$categories = Category::all();

    	return view('category.show', compact('categories'));
    }
}
