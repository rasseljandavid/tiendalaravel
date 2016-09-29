<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Address extends Model
{
	
	/*---------- PROTECTED VARAIBLES ----------*/

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
