<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    
    /*---------- VARAIBLES ----------*/

    protected static $type = array(
    		'product'	=> [ 
    				0 => 'active',
    				1 => 'inactive' 
    			],
    		'order'		=> [
    				0 => 'received',
    				1 => 'processing',	
    				2 => 'transit',		
    				3 => 'shipped',	
                    4 => 'canceled',		 
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

    public function setOrderStatus( $id ){
    	
    	return;
    }

    public static function asString( $type, $index ){
        
        switch (strtolower($type)) {
            case 'product':
                return self::$type['product'][$index];
                break;
            
            default:
                return self::$type['order'][$index];
                break;
        }
    }

    public function getStatus(  ){
    	
    	return $this->type;
    }
}
