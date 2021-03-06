<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\Category;

class CreateCategoryProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('category_id');
            $table->boolean('is_featured_category')->default(0);
            $table->integer('rank')->default(0);    
            $table->timestamps();
        });

        $megaventory = new \Megaventory();
        $products = $megaventory->getProducts();

        foreach($products as $product) {
            $prod = Product::withoutGlobalScopes()->find($product->ProductID);

            $prod->categories()->attach($product->ProductCategoryID, ['rank' => 0]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');
    }
}
