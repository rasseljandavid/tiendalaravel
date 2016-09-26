<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends Controller
{
    function show() {
    	return view('category.show');
    }
}
