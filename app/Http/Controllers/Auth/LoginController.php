<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
          //dd($auth->user());    
          $this->middleware('guest')->except('logout');
    }

    // public function doLogin()
    // {
    //     // validate the info, create rules for the inputs
    // $rules = array(
    //     'email'    => 'required|email', // make sure the email is an actual email
    //     'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
    // );
    // }

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
    	$user = Socialite::driver('github')->user();
        $authUser=User::firstOrNew(['email'=>$user->email]);
        $authUser->name=$user->nickname;
        $authUser->email=$user->email;
        $authUser->save();
        auth()->login($authUser);
        return redirect('/');
    }
}
