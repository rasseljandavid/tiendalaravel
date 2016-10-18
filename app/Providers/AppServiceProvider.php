<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use App\Http\Controllers\Ecommerce\CartController;
use App\Models\Ecommerce\Category;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        // ENCOUNTERING ERROR?
        // when making migrate:refresh,install comment all lines that request data. why?
        // http://stackoverflow.com/questions/25315325/laravel-base-table-or-view-not-found-1146-table-database-pages-doesnt-exist

        $categories = Category::limit(8)->get();
        View::share('menus', $categories);

        // NEED FIX, we dont want to query the cart 2 or more times in a single page if possible
        view()->composer(
            [   'layouts.app',
                'home.index',
                'products.show',
                'category.show',
                'category.pagination'
            ], 
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
