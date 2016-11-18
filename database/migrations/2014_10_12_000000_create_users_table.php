<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\User;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact');
            $table->boolean('newsletter')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User;
        $user->firstname = 'Tienda';
        $user->lastname = 'Administrator';
        $user->email = 'admin@tienda.ph';
        $user->password = bcrypt('rassel123');
        $user->contact = '12345678910';
        $user->newsletter = false;
        $user->save();

 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
