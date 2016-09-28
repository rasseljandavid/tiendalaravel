<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

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
		$query->where('id', end($pieces));
	}

	public function slugLink( ){
		
		return '/products/'.$this->attributes['slug'].'-'.$this->attributes['id'];
	}

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
