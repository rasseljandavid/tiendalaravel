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

	public function scopeShipping( $query ){
		
		$query->where('is_shipping', '1');
	}

	public function scopeBilling( $query ){
		
		$query->where('is_billing', '1');
	}

	/*---------- RELATIONS ----------*/

	public function user(  ){
    	
    	return $this->belongsTo(User::class);
    }



	/*---------- CUSTOM METHODS ----------*/

	public function onelineString(  ){
		
		return $this->address_one . ' ' . $this->city . ' zipcode[' . $this->zipcode .'] '. $this->country;
	}

}
