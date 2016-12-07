<?php

namespace App\Models\Ecommerce;

// dependencies
use Illuminate\Database\Eloquent\Model;
// global scope
use App\Scopes\QuantityScope;

class Product extends Model
{
	protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new QuantityScope);
    }


	/*---------- VARAIBLES ----------*/

	protected $fillable = [
			'sku', 'title', 'slug', 'body', 'quantity', 'is_featured', 'is_special', 'is_bestSeller', 'price', 'salePrice', 'rating', 'rank', 'rewardPoints', 'supplier_id'
		];


	/*---------- SET<>ATTRIBUTE ----------*/

	public function setSlugAttribute( $slug ){
	
		$this->attributes['slug'] = setSlug($slug);
	}


	/*---------- GET<>ATTRIBUTE ----------*/

	public function getPriceAttribute($price) {
   		return $this->attributes['price'] = number_format((double)$price, 2);
	}

	public function getSalePriceAttribute($salePrice) {
   		return $this->attributes['salePrice'] = number_format((double)$salePrice, 2);
	}

	public function getTitleAttribute($value)
    {
    	//Remove the / xx format for display since this is not needed to see by our customer
    	$titleArray = explode("/", $value);
        return trim($titleArray[0]);
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

	public function scopeSearchCategory( $query, $category_id ){

		$query->with('categories')->where('id', $category_id);
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

  	if($this->attributes['salePrice'] != 0) {

  		$discount = round((($this->attributes['price'] / $this->attributes['salePrice']) - 1) * 100);
  		return '-' . $discount . '%';
  	}

  	return;
  }

  public function getFeaturedProduct() {
  	return $this->where('is_featured', true)->get();
  }
  public function getBestSellerProduct() {
  	return $this->where('is_bestSeller', true)->get();	
  }
  public function getLatestProduct() {
  	return $this->orderBy('created_at', 'DESC')->get();
  }
    		
    		
    		


}
