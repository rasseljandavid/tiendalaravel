<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable = [
			'title', 'slug', 'rank', 'bannerImage', 'parent_id'
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
		
		return '/category/'.$this->attributes['slug'].'-'.$this->attributes['id'];
	}

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function getProductByCategory() {
    	return $this->products()->orderBy('rank', 'desc')->get();
    }
}
