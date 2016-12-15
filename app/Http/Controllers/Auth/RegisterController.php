<?php

namespace App\Http\Controllers\Auth;

// dependencies
use App\Http\Controllers\Ecommerce\CartController;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
// models
use App\Models\Address\Address;
use App\User;

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
    protected $redirectTo = '/cart/combine';

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
        if(isset($data['checkbox-same-address'])){
            return Validator::make($data, [
                'firstname'     => 'required|max:255',
                'lastname'      => 'required|max:255',
                'email'         => 'required|email|max:255|unique:users',
                'password'      => 'required|min:6|confirmed',
                'contact'       => 'required|numeric|min:10',
                // 'to.ship'            => 'required|max:255',
                'address_one.ship'   => 'required|max:255',
                'city.ship'          => 'required|max:255',
                'zipcode.ship'       => 'required|max:255',
                'country.ship'       => 'required|max:255',
            ]);
        }
       
        return Validator::make($data, [
            'firstname'     => 'required|max:255',
            'lastname'      => 'required|max:255',
            'email'         => 'required|email|max:255|unique:users',
            'password'      => 'required|min:6|confirmed',
            'contact'       => 'required|numeric|min:10',
            // 'to.ship'            => 'required|max:255',
            'address_one.ship'   => 'required|max:255',
            'city.ship'          => 'required|max:255',
            'zipcode.ship'       => 'required|max:255',
            'country.ship'       => 'required|max:255',
            // 'to.bill'            => 'required|max:255',
            'address_one.bill'   => 'required|max:255',
            'city.bill'          => 'required|max:255',
            'zipcode.bill'       => 'required|max:255',
            'country.bill'       => 'required|max:255',
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
        // user
        $user = new User;
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->contact = $data['contact'];
        $user->newsletter = ($data['newsletter'] ? 1 : 0);
        $user->save();
        // shipping
        $shipping = new  Address;
        $shipping->user_id = $user->id;
        // $shipping->to = $data['to']['ship'];
        $shipping->to = '';
        $shipping->address_one = $data['address_one']['ship'];
        $shipping->city = $data['city']['ship'];
        $shipping->zipcode = $data['zipcode']['ship'];
        $shipping->country = $data['country']['ship'];
        $shipping->is_shipping = 1;
        $shipping->save();
        // billing
        $billing = new  Address;
        $billing->user_id = $user->id;
        // $billing->to = (isset($data['checkbox-same-address']) ? $data['to']['ship'] : $data['to']['bill'] );
        $billing->to = '';
        $billing->address_one = (isset($data['checkbox-same-address']) ? $data['address_one']['ship'] : $data['address_one']['bill'] );
        $billing->city = (isset($data['checkbox-same-address']) ? $data['city']['ship'] : $data['city']['bill'] );
        $billing->zipcode = (isset($data['checkbox-same-address']) ? $data['zipcode']['ship'] : $data['zipcode']['bill'] );
        $billing->country = (isset($data['checkbox-same-address']) ? $data['country']['ship'] : $data['country']['bill'] );
        $billing->is_billing = 1;
        $billing->save();
        return $user;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        // return $request->all();
        $this->validator($request->all())->validate();
        $request['password'] = bcrypt($request->password);
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        if(isset($request['checkout'])){
            return (new CartController)->combine($request);
        }
        flash('info', 'Hello '.Auth::user()->getFullname());
        return redirect($this->redirectPath());
    }
}
