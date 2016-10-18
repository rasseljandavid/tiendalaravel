<?php

namespace App\Http\Controllers\Auth;

// dependencies
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
// models
use App\User;
use App\Models\Address\Address;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname'     => 'required|max:255',
            'lastname'      => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|min:6|confirmed',
            'contact'       => 'required|numeric|min:9',
            'address_one'   => 'required|max:255',
            'city'          => 'required|max:255',
            'zipcode'       => 'required|max:255',
            'country'       => 'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create($data);
        $data['user_id'] = $user->id;
        // shipping
        $data['is_shipping'] = 1;
        $address = Address::create($data);
        // billing
        $data['is_shipping'] = 0;
        $data['is_billing'] = 1;
        $address = Address::create($data);
        return $user;
    }
}
