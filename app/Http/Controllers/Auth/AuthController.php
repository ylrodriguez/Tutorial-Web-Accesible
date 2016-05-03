<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers;

    public function getCredentials(Request $request)
    {
        $credentials = $request->only($this->loginUsername(), 'password');

        return array_add($credentials, 'status', 'activated');
    }
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $loginPath = '/login';
    protected $redirectTo = '/admin';
    protected $redirectPath = '/admin';


    

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);

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
            'nombre' => 'min:8|max:120|required|regex:/^[(a-zA-Z\s)ñáéíóú]+$/u',
            'email' => 'min:5|max:200|unique:users,email|required|email',
            'username' => 'min:5|max:15|unique:users,username|required|regex:/^[\w-]+$/',
            'password' => 'required|confirmed|min:8',
            'pais' => 'required',
            'fecha_nac_birthDay' => 'required'
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
        return User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'pais' => $data['pais'],
            'discapacidad' => $data['discapacidad'],
            'fecha_nac' => $data['fecha_nac_birthDay']
            ]);
    }


}
