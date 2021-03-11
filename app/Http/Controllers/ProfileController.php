<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSkill;
use App\Models\Skill;

use Auth;

use DB;

class ProfileController extends Controller
{
    // Function: GoTo Profile 
	public function goToProfile()
    {
        // Intialization
            $user = new User;
        // End Intialization

    	if ( isset(Auth::User()->id) &&  isset(Auth::User()->email_verified_at) ) {

            $id = Auth::user()->id;

            // Fetching Current User Skills 
            $user_skill = self::userSkills($id);

            // Fetching Current User Reviews
            $user_reviews = $user->with('reviews')->where('id','=', $id)->first();

    		return view('profile',[
                'user_skills' => $user_skill,
                'user_reviews' => $user_reviews,
            ]);
    	} else {
    		return view('auth.verify-email');
    	}
    	
    } 
    

    public function userSkills($id)
    {
        return DB::table('skills')
            ->join('user_skills', 'user_skills.skill_id','=','skills.id')
            ->where('user_skills.user_id','=',$id)
            ->get();
    }   
}
