<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function about() {
    	return view('pages.about');
    }

    public function privacy() {
    	return view('pages.privacy');
    }

    public function terms() {
    	return view('pages.terms');
    }

    public function how() {
    	return view('pages.how');
    }

    public function faq() {
    	return view('pages.faq');
    }
}
