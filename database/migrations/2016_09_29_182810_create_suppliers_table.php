<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Ecommerce\Supplier;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->timestamps();
        });

        $megaventory = new \Megaventory();
        $suppliers = $megaventory->getSuppliers();
        foreach($suppliers as $supplier) {
            $newSupplier = new Supplier();
            $newSupplier->id    = $supplier->SupplierClientID;
            $newSupplier->title = $supplier->SupplierClientComments;
            $newSupplier->slug  = $supplier->SupplierClientComments;
            $newSupplier->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
