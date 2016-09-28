<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Product;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku');
            $table->string('title');
            $table->string('slug');
            $table->text('body')->nullable();
            $table->integer('quantity')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_special')->default(0);
            $table->boolean('is_bestSeller')->default(0);
            $table->double('price', 10, 4);
            $table->double('salePrice', 10, 4);
            $table->integer('rating')->default(4);
            $table->integer('rank')->default(0);
            $table->integer('rewardPoints')->default(100);
            $table->integer('supplier_id')->default(0);
            $table->timestamps();
        });

        $megaventory = new \Megaventory();
        $products = $megaventory->getProducts();

        foreach($products as $product) {
            $newProduct = new Product();
            $newProduct->id = $product->ProductID;
            $newProduct->sku = $product->ProductSKU;
            $newProduct->title = $product->ProductDescription;
            $newProduct->slug = $product->ProductDescription;
            $newProduct->price = $product->ProductSellingPrice * 1.1;
            $newProduct->salePrice = $product->ProductSellingPrice;
            $newProduct->save();
        }

         $invetories = $megaventory->getInventory();
         foreach($invetories as $inventory) {
            $product = Product::find($inventory->productID);
            $product->quantity = $inventory->StockPhysicalTotal;
            $product->update();
         }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
