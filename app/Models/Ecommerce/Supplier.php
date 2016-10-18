<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	/*---------- VARAIBLES ----------*/
	/*---------- SET<>ATTRIBUTE ----------*/
	/*---------- GET<>ATTRIBUTE ----------*/
	/*---------- SCOPES ----------*/


	/*---------- RELATIONS ----------*/
    public function products() {
    	return $this->hasMany(Product::class);
    }

    /*---------- CUSTOM METHODS ----------*/
}
