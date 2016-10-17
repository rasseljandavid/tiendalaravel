<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;

class Orderitem extends Model
{

	/*---------- PROTECTED VARAIBLES ----------*/
	
    protected $fillable = [
    		'order_id', 'quantity', 'price', 'product_id', 'title'
    	];

    
	/*---------- SET<>ATTRIBUTE ----------*/
	/*---------- GET<>ATTRIBUTE ----------*/
	/*---------- SCOPES ----------*/

	public function scopeFromProduct( $query, $id ){
		
		$query->where('product_id', $id);
	}

	/*---------- RELATIONS ----------*/
	
	public function order(  ){
		return $this->belongsTo(Order::class);
	}

	/*---------- CUSTOM METHODS ----------*/

	public function getProduct(  ){
		return Product::find($this->attributes['product_id']);
	}
}
