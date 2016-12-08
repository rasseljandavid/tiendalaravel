<?php

namespace App\Models\Ecommerce;

// dependencies
use Illuminate\Database\Eloquent\Model;
// models
use App\Models\Ecommerce\Order;
use App\Models\Ecommerce\Product;

class Orderitem extends Model
{

	/*---------- VARAIBLES ----------*/
	
    protected $fillable = [
    		'order_id', 'quantity', 'price', 'product_id', 'title'
    	];

    // protected $guarded = [ 'id' ];
    
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
		return Product::withoutGlobalScopes()->find($this->attributes['product_id']);
	}
}
