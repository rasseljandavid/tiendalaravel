<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use App\Category;
use App\Http\Controllers\CartController;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        $categories = Category::limit(8)->get();
        View::share('menus', $categories);

        // NEED FIX, we dont want to query the cart 2 or more times in a single page if possible
        view()->composer(
            ['layouts.app',
            'home.index',
            'products.show',
            'category.show'], 
            function($view) {
                $minicart = CartController::getCart(true);
                $view->with('minicart', $minicart);
        });

        /* QUeRY DEBBUGER */
        // \DB::listen(function($sql) {
        //     var_dump($sql);
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
