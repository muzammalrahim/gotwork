<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
	// Function: Redirect To Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    // Function: Handle Google Callback
    public function handleGoogleCallback()
    {
        try {
        	// Getting Current DateTime
        	$currentDateTime = \Carbon\Carbon::now()->toDateTimeString();
        	
        	// Getting User Details From Google
            $user = Socialite::driver('google')->stateless()->user();
       		
       		// Finding User In Our DB
            $finduser = User::where('google_id', $user->id)->first();

            // dd("DB User Id ". User::find($user->id));
       		

          	if($finduser){ // If User Already Exists Jump To Dashboard
       
                Auth::login($finduser);
      
                return redirect()->intended('dashboard');
       
            } else { // If User Not Already Exists Then Save Data From Google
			
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'email_verified_at' => $currentDateTime,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy'),
                    'profile_photo_url' => $user->avatar_original,
                ]);
      
                Auth::login($newUser);
      
                return redirect()->intended('dashboard');
           }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
