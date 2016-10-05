<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	/*---------- PROTECTED VARAIBLES ----------*/

	protected $fillable = [
			'title', 'slug', 'rank', 'bannerImage', 'parent_id'
		];


	/*---------- SET<>ATTRIBUTE ----------*/

	public function setSlugAttribute( $slug ){

		$this->attributes['slug'] = setSlug($slug);
	}

	/*---------- GET<>ATTRIBUTE ----------*/
	/*---------- SCOPES ----------*/

	public function scopeFromSlug( $query, $slug ){
		
		$query->where('slug', $slug);
	}



	/*---------- RELATIONS ----------*/

    public function products(){

        return $this->belongsToMany(Product::class);
    }


    /*---------- CUSTOM METHODS ----------*/

	public function slugLink( ){
		
		return '/category/'.$this->attributes['slug'];
	}

	public function getProductByCategory() {

    	return $this->products()->orderBy('rank', 'desc')->paginate(20);
    }
}
