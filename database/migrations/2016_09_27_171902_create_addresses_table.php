<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Address\Address;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('address_one');
            $table->string('city');
            $table->string('zipcode');
            $table->string('country');
            $table->boolean('is_shipping')->default(0);
            $table->boolean('is_billing')->default(0);
            $table->timestamps();
        });

        $address1 = new Address;
        $address1->user_id = 1;
        $address1->address_one = 'Street address of admin';
        $address1->city = 'Mabalacat';
        $address1->zipcode = '2010';
        $address1->country = 'Philippines';
        $address1->is_shipping = 1;
        $address1->save();

        $address2 = new Address;
        $address2->user_id = 1;
        $address2->address_one = 'Street address of admin';
        $address2->city = 'Mabalacat';
        $address2->zipcode = '2010';
        $address2->country = 'Philippines';
        $address2->is_billing = 1;
        $address2->save(); 

        $address3 = new Address;
        $address3->user_id = 0;
        $address3->address_one = 'Local address of tienda(shipping)';
        $address3->city = 'Mabalacat';
        $address3->zipcode = '2010';
        $address3->country = 'Philippines';
        $address3->is_shipping = 1;
        $address3->save(); 

        $address3 = new Address;
        $address3->user_id = 0;
        $address3->address_one = 'Local address of tienda(billing)';
        $address3->city = 'Mabalacat';
        $address3->zipcode = '2010';
        $address3->country = 'Philippines';
        $address3->is_billing = 1;
        $address3->save(); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
