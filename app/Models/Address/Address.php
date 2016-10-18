<?php

namespace App\Models\Address;

// dependencies
use Illuminate\Database\Eloquent\Model;
// models
use App\User;

class Address extends Model
{
	
	/*---------- VARAIBLES ----------*/

	protected $fillable = [
		'user_id','address_one','city','zipcode','country','is_shipping','is_billing',
	];



	/*---------- SET<>ATTRIBUTE ----------*/
	/*---------- GET<>ATTRIBUTE ----------*/
	/*---------- SCOPES ----------*/
	/*---------- RELATIONS ----------*/

	public function user(  ){
    	
    	return $this->belongsTo(User::class);
    }



	/*---------- CUSTOM METHODS ----------*/


   
   

}
