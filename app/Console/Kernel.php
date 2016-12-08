<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use DB;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Supplier;
use App\Models\Ecommerce\Order;

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

        //Update the featured products, rating and prices
        $schedule->call(function () {
            \TiendaInventory::updateTiendaSuppliers();
            \TiendaInventory::updateTiendaCategories();
            \TiendaInventory::updateTiendaProducts();
            
        })->everyThirtyMinutes();

        // Update the quantity of the products
        $schedule->call(function () {
            \TiendaInventory::updateTiendaInventory();
        })->everyMinute();

        // Update new received order to megaventory
        $schedule->call(function () {
            Order::updateMegaventory();
        })->everyMinute();
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
