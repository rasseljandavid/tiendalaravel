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
    	$percent = round(($discount / $this->attributes['price']) * 100);
    	return $percent;
    }
}
