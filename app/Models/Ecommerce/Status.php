<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    
    /*---------- VARAIBLES ----------*/

    protected $type = array(
    		'product'	=> [ 
    				0 => 'active',
    				1 => 'inactive' 
    			],
    		'order'		=> [
    				0 => 'received',
    				1 => 'processing',	
    				2 => 'transit',		
    				3 => 'shipped'			 
    			]
    	);

    // pending
    public function getProductStatus( $id ){
    	
    	return;
    }

    public function setProductStatus( $id ){
    	
    	return;
    }

    public function getOrderStatus( $id ){
    	
    	return;
    }

    public function setProductStatus( $id ){
    	
    	return;
    }

    public function getStatus(  ){
    	
    	return $this->type;
    }
}
