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
        // when making migrate:refresh,install... comment all lines that request data. why?
        // http://stackoverflow.com/questions/25315325/laravel-base-table-or-view-not-found-1146-table-database-pages-doesnt-exist

        $main_menu  = Category::orderBy('rank')->get()->toArray();
        $chunks = array_chunk($main_menu, 6);
        $categories      = $chunks[0];
        $more_categories = $chunks[1];
        View::share('menus', $categories);
        View::share('moremenus', $more_categories);

        // NEED FIX, we dont want to query the cart 2 or more times in a single page if possible
        view()->composer(
            [
                'cart.minicart',
                'home.index',
                'products.show',
                'category.show',
                'category.pagination',
                'search.index',
            ], 
            function($view) {
                $cart = CartController::getCart(true);
                $view->with('cart', $cart);
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
