<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	/*---------- PROTECTED VARAIBLES ----------*/

	protected $fillable = [
			'sku', 'title', 'slug', 'body', 'quantity', 'is_featured', 'is_special', 'is_bestSeller', 'price', 'salePrice', 'rating', 'rank', 'rewardPoints', 'supplier_id'
		];


	/*---------- SET<>ATTRIBUTE ----------*/

	public function setSlugAttribute( $slug ){
	
		$this->attributes['slug'] = setSlug($slug);
	}


	/*---------- GET<>ATTRIBUTE ----------*/

	public function getPriceAttribute($price) {
   		return $this->attributes['price']     = number_format((double)$price, 2);
	}

	public function getSalePriceAttribute($salePrice) {
   		return $this->attributes['salePrice'] = number_format((double)$salePrice, 2);
	}


	/*---------- SCOPES ----------*/

	public function scopeFromSlug( $query, $slug ){
		
		$pieces = explode('-', $slug);
		$slug = substr_replace($slug, '', strrpos($slug, '-'.end($pieces)), strlen('-'.end($pieces)));
		$query->where([
				['id', '=', end($pieces)], 
				['slug', '=', $slug],
			]);
	}

	/*---------- RELATIONS ----------*/

	public function categories(){

        return $this->belongsToMany(Category::class);
    }

    public function supplier() {
		return $this->belongsTo(Supplier::class);
	}


    /*---------- CUSTOM METHODS ----------*/

	public function slugLink( ){
		
		return '/products/'.$this->attributes['slug'].'-'.$this->attributes['id'];
	}

    public function getSavings(){

    	$discount = $this->attributes['price'] - $this->attributes['salePrice'];
    	
    	if($this->attributes['price'] != 0) {
    	$percent = round(($discount / $this->attributes['price']) * 100);
    		return $percent;
    	}

    	return;
    }

    public function getFeaturedProduct() {
    	return $this->where('is_featured', true)->get();
    }
    public function getBestSellerProduct() {
    	return $this->where('is_bestSeller', true)->get();	
    }
    public function getSpecialProduct() {
    	return $this->where('is_special', true)->get();
    }
    public function getLatestProduct() {
    	
    }
    		
    		
    		


}
