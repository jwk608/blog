<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Redirect;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $authUser=User::firstOrNew(['provider_id'=>$user->id]);

        //if provider does not match
        if($authUser->provider != $provider) {
            return Redirect::back()->with('status', 'You are already are a memeber! Please sign in using original method!');

        }else {
            $authUser->name=$user->name;
            $authUser->email=$user->email;
            $authUser->provider=$provider;
    
            $authUser->save();
    
            auth()->login($authUser);
        }
       
        return redirect('/');

    }
}