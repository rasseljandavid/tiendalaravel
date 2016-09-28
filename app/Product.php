<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $fillable = [
			'sku', 'title', 'slug', 'body', 'quantity', 'is_featured', 'is_special', 'is_bestSeller', 'price', 'salePrice', 'rating', 'rank', 'rewardPoints', 'supplier_id'
		];

	public function setSlugAttribute( $slug ){
		
		$text = preg_replace('~[^\pL\d]+~u', '-', $slug);
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		$text = trim($text, '-');
		$text = preg_replace('~-+~', '-', $text);
		$text = strtolower($text);

		$this->attributes['slug'] = $text;
	}

	public function scopeFromSlug( $query, $slug ){
		
		$pieces = explode('-', $slug);
		$query->where([
				['id', '=', end($pieces)], 
				['slug', '=', str_replace('-'.end($pieces), '', $slug)],
			]);
	}

	public function slugLink( ){
		
		return '/products/'.$this->attributes['slug'].'-'.$this->attributes['id'];
	}

    public function categories(){

        return $this->belongsToMany(Category::class);
    }

    public function getSavings(){

    	$discount = $this->attributes['price'] - $this->attributes['salePrice'];
    	
    	if($this->attributes['price'] != 0) {
    	$percent = round(($discount / $this->attributes['price']) * 100);
    		return $percent;
    	}

    	return;
    }

    public function getPriceAttribute($price) {
   		return $this->attributes['price']     = number_format((double)$price, 2);
	}

	public function getSalePriceAttribute($salePrice) {
   		return $this->attributes['salePrice'] = number_format((double)$salePrice, 2);
	}
}
