<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class DashboardController extends Controller
{
	// Function: GoTo Dashboard 
	public function goToDashboard()
    {

    	if ( isset(Auth::User()->id) &&  isset(Auth::User()->email_verified_at) ) {
    		return view('dashboard');
    	} else {
    		return view('auth.verify-email');
    	}
    	
    }    
}
