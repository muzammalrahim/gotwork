<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Response;
use Mail;

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

          	if($finduser){ // If User Already Exists Jump To Dashboard
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            } else { // If User Not Already Exists Then Save Data From Google
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'email_verified_at' => $currentDateTime,
                    'google_id'=> $user->id,
//                    'password' => encrypt('123456dummy'),
                    'profile_photo_url' => $user->avatar_original,
                ]);
                if ($newUser) {

                    $to_name = $newUser->name;
                    $to_email = $newUser->email;

                    $data = array(
                        "name" => $to_name,
                        "body" => " Welcome " .$to_name. ", Your Account has been Registered Successfully.
                    ");

                    $mail = Mail::send('emails.welcome', $data, function($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)
                    ->subject('Account Registered Successfully');
                    $message->from(env('mail_from_address'),'Account Registration On Got Work.');
                    });

                }

                Auth::login($newUser);

                return redirect()->intended('profile');
           }

        } catch (Exception $e) {
            // dd($e->getMessage());
            $error_code = $e->getCode();
            if($error_code == 400) {
                dd($e->getCode().', Bad Request.');
            } elseif($error_code == 502) {
                dd($e->getCode().', Bad gateway.');
            } elseif ($error_code == 401) {
                dd($e->getCode().', Failed to authenticate.');
            }

        }
    }
}
