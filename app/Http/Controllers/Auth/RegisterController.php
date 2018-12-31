<?php

namespace App\Http\Controllers\Auth;

use App\TempAccount;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new restaurants as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect restaurants after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Request $request)
    {
        $email = $request->input('email');
        $token = $request->input('token');
        $message = "Sorry, Page not found";
        if(isset($email) && isset($token)){
            $user = TempAccount::where('email', $email)
                                    ->where('access_token','=', $token)
                                    ->first();

            if(is_null($user))
            {

                $message = "Access denied! Your token is not matched, Please contact with Bombay sweets team.";
                return view('errors.registration_form', compact('message'));
            }
            if($user->is_register){

                $message = "Already register. Please login to access your account";
                return view('errors.registration_form',compact('message'));
            };
            return view('auth.register', compact('user'));
        }
        return view('errors.registration_form', compact('message'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:restaurants',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
