<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use \App\User;;
use Auth;
use Exception;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {       

        $user = Socialite::driver('github')->user();

        //check if user already signed up manually with regular signup method
        $alreadyMember = User::where('email', $user->getEmail())->where('provider_id', null)->first();

        if(!$alreadyMember) {

            //check if user already signed up with oAuth provider
            $alreadyMember = User::where('provider_id', $user->getId())->first();

            //if not create new user
            if(!$alreadyMember) {

                //add user to database
                $newUser = User::create([
                    'email'          => $user->getEmail(),
                    'name'           => $user->getNickName(),
                    'provider_id'    => $user->getId(),
                ]);
            }


            //log user in
            Auth::login($alreadyMember, true);


        }else {

            return Redirect::back()->with('status', 'You are already are a memeber! Please sign in using existing Email and Password');

        }       

        return redirect($this->redirectTo);
     
    }
}
