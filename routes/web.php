<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Auth::routes();

// Static Pages
Route::get('/', 'HomeController@index');
Route::get('/about-us', 'PagesController@about');
Route::get('/privacy-policy', 'PagesController@privacy');
Route::get('/terms-and-conditions', 'PagesController@terms');
Route::get('/how-it-works', 'PagesController@how');
Route::get('/faq', 'PagesController@faq');
Route::get('/contact-us', 'PagesController@contact');
Route::get('/sitemap', 'PagesController@sitemap');

// User
Route::get('/account', 'UsersController@show');

// Cart
Route::get('/cart/show', 'CartController@show');
Route::get('/cart/checkout', 'CartController@checkout');
Route::get('/cart/compare', 'CartController@compare');
Route::get('/cart/wishlist', 'CartController@wishlist');
Route::post('/cart/addItem', 'CartController@addItem');
Route::get('/cart/index', 'CartController@index');//admin only
Route::get('/cart/combine', 'CartController@combine')->middleware('auth');
Route::delete('/cart/removeItem', 'CartController@removeItem');

//Store Pages
Route::get('/category', 'CategoriesController@index');
Route::get('/category/{category}', 'CategoriesController@show');
// Route::get('{product}', 'productsController@show');

Route::get('/products', 'ProductsController@index');
Route::get('/products/{slug}', 'ProductsController@show');


//Search Pages
Route::get('/search/{term}', 'SearchController@search');
