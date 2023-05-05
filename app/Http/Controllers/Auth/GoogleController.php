<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

           $finduser = User::where('social_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);

                $user = Auth::guard('web')->user();
                 return redirect()->route('home');
                //return redirect('home')->with('success', 'You are logged in successfully..!!!!');;
            }else{
                $name = explode(' ', $user->name);
                $newUser = User::create([
                   'first_name'=>$name[0],
                    'last_name'=>$name[1],
                    'role_id'=>2,
                    'email' => $user->email,
                    'social_type' => 'google',
                    'social_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);
                 return redirect()->route('home');
                //return redirect('home')->with('success', 'You are logged in successfully..!!!!');;
            }
    }    
}
