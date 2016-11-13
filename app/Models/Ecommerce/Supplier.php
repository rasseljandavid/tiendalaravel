<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	/*---------- VARAIBLES ----------*/
	/*---------- SET<>ATTRIBUTE ----------*/
	public function setSlugAttribute( $slug ){
	
		$this->attributes['slug'] = setSlug($slug);
	}
	
	/*---------- GET<>ATTRIBUTE ----------*/
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
    public function products() {
    	return $this->hasMany(Product::class);
    }

    /*---------- CUSTOM METHODS ----------*/
    public function slugLink( ){
		return '/suppliers/'.$this->attributes['slug'].'-'.$this->attributes['id'];
	}
}
