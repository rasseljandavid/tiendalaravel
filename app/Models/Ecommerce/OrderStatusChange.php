<?php

namespace App\Models\Ecommerce;

// dependencies
use Illuminate\Database\Eloquent\Model;
use Auth;
// models
// use App\Models\Ecommerce\Order;

class OrderStatusChange extends Model
{
   
  /*---------- VARAIBLES ----------*/
    
  	protected $guarded = [ 'id' ];
    
	/*---------- SET<>ATTRIBUTE ----------*/
	/*---------- GET<>ATTRIBUTE ----------*/

	/*---------- SCOPES ----------*/

    public function scopeCancelled( $query, $id ){
      
      $query->where([
                  ['order_id', '=', $id],
                  ['to_status', '=', 5]
              ]);
  	}

	/*---------- RELATIONS ----------*/
	
	public function order(  ){
		return $this->belongsTo(Order::class);
	}

	/*---------- CUSTOM METHODS ----------*/

	public static function change( $order=null, $from_status ){
		
    $statuschange = new OrderStatusChange();
    $statuschange->order_id = $order->id;
    $statuschange->changed_by = Auth::user()->id;
    $statuschange->seen = false;
    $statuschange->from_status = $from_status;
    $statuschange->to_status = $order->status;
    $statuschange->save();

	}

}
