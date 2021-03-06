<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0); 
            $table->integer('salesOrderNo')->unsigned()->default(0); 
            $table->string('comment', 255)->default('');
            $table->string('session', 255);
            $table->timestamp('purchased_at')->nullable();
            $table->integer('discount_id')->unsigned()->default(0);
            $table->double('total', 10, 4)->default(0);
            $table->double('discount', 10, 4)->default(0);
            $table->double('shipping_fee')->default(50.00);
            $table->double('grand_total')->default(0);
            $table->integer('status')->default(0);
            $table->string('estimate_delivery', 255)->default('');
            $table->string('shipment', 255)->default('');
            $table->string('reason', 255)->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
