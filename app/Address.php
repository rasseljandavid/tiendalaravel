<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Address extends Model
{

	protected $fillable = [
			'user_id','address_one','city','zipcode','country','is_shipping','is_billing',
		];
    
    public function user(  ){
    	
    	return $this->belongsTo(User::class);
    }
}
