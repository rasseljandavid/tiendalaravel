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
    		'order'		=> [ // 0 wont show on admin new order
    				0 => 'received',    // eto mga order na hindi pa na uupdate sa megaventory
                    1 => 'received',     // eto ang pinaka received status natin, megaventory updated 
    				2 => 'processing',	
    				3 => 'transit',		
    				4 => 'shipped',	
                    5 => 'cancelled',
                    6 => 'complete',
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
            case 'order':
            default:
                return self::$type['order'][$index];
                break;
        }
    }

    public function getStatus(  ){

    	return $this->type;
    }

    public static function getOrderProgress( $status=null ){

        switch ($status) {
            case 0:
                return '20%';
            case 1:
                return '20%';
            case 2:
                return '50%';
            case 3:
                return '80%';
            case 4:
                return '100%';
            case 6:
                return '100%';    
            default:
                return 0;
        }
    }
}
