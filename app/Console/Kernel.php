<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use DB;
use App\Models\Ecommerce\Product;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Update the quantity of the products
        $schedule->call(function () {
            $meg = new \Megaventory();
            $inv = $meg->getInventory();
            foreach($inv as $item) {
                DB::update("UPDATE products SET quantity = $item->StockPhysicalTotal where id = {$item->productID}");
            }
        })->everyMinute();

        //Update the featured products, rating and prices
        $schedule->call(function () {
            $megaventory = new \Megaventory();
            $products = $megaventory->getProducts();

            foreach($products as $product) {

                $is_featured = 0;
                $is_special  = 0;
                $is_bestSeller = 0;
                if(strtolower(trim($product->ProductCustomField2)) == 'featured') {
                    $is_featured = 1;
                }

                if(strtolower(trim($product->ProductCustomField2)) == 'special') {
                    $is_special = 1;
                }

                if(strtolower(trim($product->ProductCustomField2)) == 'bestseller') {
                    $is_bestSeller = 1;
                }
                $prod = Product::find($product->ProductID);
                $prod->is_featured   = $is_featured;
                $prod->is_special    = $is_special;
                $prod->is_bestSeller = $is_bestSeller;
                $prod->rating        = rand(3,5);
                $prod->price         = $product->ProductSellingPrice * 1.1;
                $prod->salePrice     = $product->ProductSellingPrice;
                $prod->update();
            }
        })->everyThirtyMinutes();

        // Update the information of the products
        //featured
        //price
        //rating
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
