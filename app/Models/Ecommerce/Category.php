<?php

namespace App\Models\Ecommerce;

// dependencies
use Illuminate\Database\Eloquent\Model;
// moels

class Category extends Model
{

	/*---------- VARAIBLES ----------*/

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

	public function getProductByCategory($perpage = 20, $sort = 'rank', $aod = 'asc') {

  	return $this->products()->orderBy($sort, $aod)->paginate($perpage);
  }


  
}
