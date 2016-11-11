<?php
 use Mail;
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

// Admin
Route::get('/dashboard', 'Admin\AdminController@dashboard');

// User
Route::get('/account', 'UsersController@show');

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
Route::get('/order/{id}', 'Ecommerce\OrdersController@show');

// Store Pages
Route::get('/category', 'Ecommerce\CategoriesController@index');
Route::get('/category/{category}', 'Ecommerce\CategoriesController@show');
Route::get('/ajax/category', 'Ecommerce\CategoriesController@loadProducts');
// Route::get('{product}', 'productsController@show');



Route::get('/products', 'Ecommerce\ProductsController@index');
Route::get('/products/{slug}', 'Ecommerce\ProductsController@show');


//Search Pages
Route::get('/search/{term}', 'SearchController@search');

Route::post('/contact', function () {

	$field_rules = array(
	    'name' => 'required',
	    'email'   => 'required|valid_email',
	    'message' => 'required'
	);

	// change your error messages here
	$error_messages = array(
	    'required'    => 'This field is required',
	    'valid_email' => 'Please enter a valid email address'
	);

	$error_placements = array();

	// success message
	$success_message            = new stdClass();
	$success_message->message   = 'Thank you! Your message has been sent.';
	$success_message->field     = 'submitButton';

	// mail failure message
	$mail_error_message            = new stdClass();
	$mail_error_message->message   = 'Sorry your mail was not sent - please try again later';
	$mail_error_message->field     = 'submitButton';

	$fields = $_POST;

	$returnVal           = new stdClass();
	$returnVal->status   = 'error';
	$returnVal->messages = array();

	if (!empty($fields)) {
	    //Validate each of the fields
	    foreach ($field_rules as $field => $rules) {
	        $rules = explode('|', $rules);

	        foreach ($rules as $rule) {
	            $result = null;

	            if (isset($fields[$field])) {
	                if (!empty($rule)) {
	                    $result = $rule($fields[$field]);
	                }

	                if ($result === false) {
	                    $error = new stdClass();
	                    $error->field = $field;
	                    $error->message = $error_messages[$rule];
	                    $error->placement = $error_placements[$field];

	                    $returnVal->messages[] = $error;
	                    // break from the rule loop so we only get 1 error at a time
	                    break;
	                }
	            } else {
	                $returnVal->messages[] =  $field . ' ' . $error_messages['required'];
	            }
	        }
	    }

	    if (empty($returnVal->messages)) {                         // Enable encryption, 'ssl' also accepted
	        $email = stripslashes(safe($fields['email']));
	        $body = stripslashes(safe($fields['message']));
	        $content = $email . " sent you a message from your contact form:<br><br>";
	        $content .= "-------<br>" . $body . "<br><br><br><br>Email: " . $email;      

	        $res = Mail::send('emails.send', ['title' => "Email from contact from", 'content' => $content], function ($message) 
	        {
	            $message->subject("Hello from tienda contact");

	        });

	        $returnVal->messages[] = $success_message;
	        $returnVal->status = 'ok';
	    }
	    return response()->json($returnVal, 200);
	}
});
