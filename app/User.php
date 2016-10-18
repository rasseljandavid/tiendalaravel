<?php

namespace App;

// dependencies
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Address\Address;
use Auth;
// models

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



    /*---------- SET<>ATTRIBUTE ----------*/

    public function setPasswordAttribute( $password ){
        
        $this->attributes['password'] = bcrypt($password);
    }



    /*---------- GET<>ATTRIBUTE ----------*/
    /*---------- SCOPES ----------*/
    /*---------- RELATIONS ----------*/

    public function addresses( ){
        
        return $this->hasMany(Address::class);
    }



    /*---------- CUSTOM METHODS ----------*/

    public function getShippingAddress(  ){
        
        return $this->addresses->where('is_shipping','1')->first();
    }

    public function getBillingAddress(  ){
        
        return $this->addresses->where('is_billing','1')->first();
    }

    public function getFullname(  ){
        
        return $this->attributes['firstname'].' '.$this->attributes['lastname'];
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
