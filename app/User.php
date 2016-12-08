<?php

namespace App;

// dependencies
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
// models
use App\Models\Address\Address;
use App\Models\Ecommerce\Order;


class User extends Authenticatable
{
    use Notifiable;

    /*---------- VARAIBLES ----------*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'contact', 'newsletter'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*---------- GET<>ATTRIBUTE ----------*/
    /*---------- SCOPES ----------*/
    /*---------- RELATIONS ----------*/

    public function addresses( ){
        
        return $this->hasMany(Address::class);
    }

    public function orders(  ){
        
        return $this->hasMany(Order::class);
    }

    /*---------- CUSTOM METHODS ----------*/

    public function getShippingAddress(  ){
        
        return $this->addresses()->shipping()->first();
    }

    public function getBillingAddress(  ){
        
        return $this->addresses()->billing()->first();
    }

    public function getFullname(  ){
        
        return $this->attributes['firstname'].' '.$this->attributes['lastname'];
    }

    public function getContact(  ){
        
        return $this->attributes['contact'];
    }

    public static function getUserId(){
        if(!Auth::check())
            return 0;

        return Auth::user()->id;
    }

    public function isAdmin(  ){
        
        if(Auth::user()->id != 1)
            return false;

        return true;
    }
}
