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
Route::get('/home', 'HomeController@index');
Route::get('/about-us', 'PagesController@about');
Route::get('/privacy-policy', 'PagesController@privacy');
Route::get('/terms-and-conditions', 'PagesController@terms');
Route::get('/how-it-works', 'PagesController@how');
Route::get('/faq', 'PagesController@faq');
Route::get('/contact-us', 'PagesController@contact');
Route::get('/sitemap', 'PagesController@sitemap');

// Admin
Route::get('/dashboard', 'Admin\AdminController@dashboard');

// Account
Route::get('/account', 'UsersController@show');
Route::get('/account/changepassword', 'UsersController@changepassword');
Route::post('/account/changepassword', 'UsersController@updatepassword');
Route::get('/account/edit', 'UsersController@edit');
Route::post('/account/update', 'UsersController@update');

//Address
Route::get('/address', 'Address\AddressesController@show');
Route::get('/address/edit', 'Address\AddressesController@edit');
Route::post('/address/update', 'Address\AddressesController@update');
// Route::get('/shipping-address/edit/{id}', 'Address\AddressesController@edit');
// Route::get('/billing-address/edit/{id}', 'Address\AddressesController@edit');


// Cart
Route::get('/cart/show', 'Ecommerce\CartController@show');
Route::get('/cart/minicart', 'Ecommerce\CartController@loadMinicart');
Route::get('/cart/checkout', 'Ecommerce\CartController@checkout');
Route::get('/cart/compare', 'Ecommerce\CartController@compare');
Route::get('/cart/wishlist', 'Ecommerce\CartController@wishlist');
Route::get('/cart/index', 'Ecommerce\CartController@index');//admin only
Route::post('/cart/addItem', 'Ecommerce\CartController@addItem');
Route::delete('/cart/removeItem', 'Ecommerce\CartController@removeItem');
Route::get('/cart/combine', 'Ecommerce\CartController@combine')->middleware('auth');
Route::post('/cart/preprocess', 'Ecommerce\CartController@preprocess');

// Order
Route::get('/order/history', 'Ecommerce\OrdersController@history');
Route::get('/order/{id}', 'Ecommerce\OrdersController@show');
Route::post('order/cancelorder/', 'Ecommerce\OrdersController@cancelorder');

// Store Pages
Route::get('/category', 'Ecommerce\CategoriesController@index');
Route::get('/category/{category}', 'Ecommerce\CategoriesController@show');
Route::get('/ajax/category', 'Ecommerce\CategoriesController@loadProducts');
// Route::get('{product}', 'productsController@show');



Route::get('/products', 'Ecommerce\ProductsController@index');
Route::get('/products/{slug}', 'Ecommerce\ProductsController@show');
Route::get('/products/bestseller/process', 'Ecommerce\ProductsController@bestsellerProduct');

//Search Pages
Route::get('/search/', 'SearchController@index');
Route::get('/load-suggestion', 'SearchController@loadSuggestion');

//Send contact 
Route::post('/contact', 'PagesController@sendemail');

//Supplier
Route::get('/suppliers', 'Ecommerce\SuppliersController@suppliers');
Route::get('/suppliers/{slug}', 'Ecommerce\SuppliersController@show');

//Notfound
Route::get('/notfound', 'NotfoundController@index');

//Paypal
Route::get('getCheckout/{order}', ['as'=>'getCheckout','uses'=>'PaypalController@getCheckout']);
Route::get('getDone/{order}', ['as'=>'getDone','uses'=>'PaypalController@getDone']);
Route::get('getCancel', ['as'=>'getCancel','uses'=>'PaypalController@getCancel']);


//This will pull the dev site
Route::get('pull', function () {
	SSH::run([
	    'cd /home/nextva5/tienda',
	    'git pull origin master',
	]);
});


//Add test auto dev
Route::get('testpage', function (){

	echo "This is a test again.";
	exit();
});
		
