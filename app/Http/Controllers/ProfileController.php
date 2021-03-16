<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSkill;
use App\Models\Skill;
use App\Models\Experience;

use Auth;

use DB;

class ProfileController extends Controller
{
    // Function: GoTo Profile 
	public function goToProfile()
    {
        // Intialization
            $user = new User;
            $project_tags = [];
            $data = []; 
        // End Intialization

    	if ( isset(Auth::User()->id) &&  isset(Auth::User()->email_verified_at) ) {

            $id = Auth::user()->id;

            // Fetching Current User Skills 
            $user_skill = self::getUserSkills($id);

            // Fetching Current User Reviews
            $user_reviews = $user->with('reviews')->paginate(1);

            // Fetching Current User Experiences 
            $data['experiences'] = self::getRelationshipData($user,'experiences');

            if ($user_reviews) {
                foreach ($user_reviews as $reviews) {
                    foreach ($reviews->reviews as $review) {
                        $data['project_tags'] = self::getProjectTags($review);
                    }
                } 
            }
            
            //dd($user_reviews);

    		return view('profile',[
                'user_skills' => $user_skill,
                'user_reviews' => $user_reviews,
                'data' => $data,
            ]);
    	} else {
    		return view('auth.verify-email');
    	}
    	
    } 
    

    public function getUserSkills($id)
    {
        return DB::table('skills')
            ->join('user_skills', 'user_skills.skill_id','=','skills.id')
            ->where('user_skills.user_id','=',$id)
            ->get();
    }


    public function goToSetting(Request $Request)
    {   

        $user = Auth::user();
        // dd($user);
        $data['user'] = $user;
        $data['experience'] = Experience::where('user_id' , $user->id)->get();
        return view('setting',$data);

        /*return DB::table('skills')
            ->join('user_skills', 'user_skills.skill_id','=','skills.id')
            ->where('user_skills.user_id','=',$id)
            ->get();*/
    }   

    public function getProjectTags($reviews)
    {
        return DB::table('tags')
            ->join('project_tags', 'project_tags.tag_id','=','tags.id')
            ->where('project_tags.project_id','=',$reviews->project_id)
            ->get();
    }  



    public function getRelationshipData($table,$relationship_name)
    {
        $returned_data = [];

        $data = $table->with($relationship_name)->get();

        foreach ($data as $data) {
            foreach ($data->$relationship_name as $data) {
                $returned_data[] = $data;            
            }
        }

        return $returned_data;
        // return $table->with($relationship_name)->get();
    } 

}
