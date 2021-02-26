<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class ProfileController extends Controller
{
    // Function: GoTo Profile 
	public function goToProfile()
    {

    	if ( isset(Auth::User()->id) &&  isset(Auth::User()->email_verified_at) ) {
    		return view('profile');
    	} else {
    		return view('auth.verify-email');
    	}
    	
    }    
}
