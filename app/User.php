<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Address;

class User extends Authenticatable
{
    use Notifiable;

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


    public function setPasswordAttribute( $password ){
        
        $this->attributes['password'] = bcrypt($password);
    }

    public function getFullname(  ){
        
        return $this->attributes['firstname'].' '.$this->attributes['lastname'];
    }

    public function addresses( ){
        
        return $this->hasMany(Address::class);
    }

    public function getShippingAddress(  ){
        
        return $this->addresses->where('is_shipping','1')->first();
    }

    public function getBillingAddress(  ){
        
        return $this->addresses->where('is_billing','1')->first();
    }
}
