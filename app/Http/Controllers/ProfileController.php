<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSkill;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Review;

use Auth;

use DB;
use File;

class ProfileController extends Controller
{
    // Function: GoTo Profile 
	public function goToProfile()
    {
        // Intialization
            $user = new User;
            $data = []; 
            $project_tags = [];
            $user_countries = [];
            $user_universities = [];
        // End Intialization


    	if ( isset(Auth::User()->id) &&  isset(Auth::User()->email_verified_at) ) {

            $id = Auth::user()->id;

            // Get User Rating
            $data['user_rating'] = self::getUserRatingCount($id); 

            // Get User Reviews Count
            $data['user_reviews_count'] = self::getUserReviewsCount($id);

            // Fetching Current User Skills 
            $user_skill = self::getUserSkills($id);

            // Fetching Current User Reviews
            $user_reviews = $user->find($id)->reviews()->paginate(1);

            // Fetching Review Tags
            if ($user_reviews) {
                foreach ($user_reviews as $reviews) {
                    $data['project_tags'] = self::getProjectTags($reviews);
                } 
            }

            // Fetching Current User Experiences 
            $data['user_details'] = $user->with('experiences','educations','qualifications')->where(['id'=>$id])->orderBy('id','DESC')->get();

        
            // Fetch User Countries Details
            $data['user_countries'] = $user_countries;

            // Fetch User Universities Details
            $data['user_universities'] = $user_universities;
            

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

    /* Start: Settings Page Functions */
    public function goToSetting(Request $Request)
    {   

        $user = Auth::user();
        // dd($user);
        $data['user'] = $user;
        $data['experience'] = Experience::where('user_id' , $user->id)->get();
        $data['countries'] = DB::table('countries')->get();
        $data['skills'] = DB::table('skills')->orderBy('name','ASC')->get();

        return view('setting',$data);
    }   


    // Ajax for getting universities 

    public function universities(Request $request)
    {   

        $university = DB::table('linkedin_universities')->where('country_id' , $request->country_id)->get();
        $data['university'] = $university;
        if ($university->count() > 0) {
            return view('layouts.setting.universities',$data);
        }
        else{

            $university = DB::table('webometric_universities')->where('country_id' , $request->country_id)->get();
            $data['university'] = $university;
            return view('layouts.setting.universities',$data);
        }

        
    }

    public function updatePersonalInfo(Request $request)
    {
        $user = auth()->user();

        $validatedData = self::validatePersonalInfoForm($request);

        if ($validatedData) {


            if (!is_null($request->profile_photo)) {
                self::storeProfileImage($request);
            }
            
            $data = $request->input();

            $update_user = self::updateUserPersonalInfo($user, $data);

            if ($update_user) {
                return redirect()->back()->with('success', 'Personal Profile Info Successfully Updated.');
            } 
            else {
                return redirect()->back()->with('error', 'Something Wrong! Data Not Updated. Updated.');
            }
        }
    } 

    public function updatePersonalSkills(Request $request)
    {
        dd($request);
    }
    /* End: Settings Page Functions */



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

    // Function Fetch User Countries Details
    public function getUserCountriesDetail($user_countries)
    {

        dd(DB::table('countries')->where(['id'=>$user_countries])->get('name')); 

    }

    // Function Fetch User Universities Details
    public function getUserRatingCount($user_id) {
        $reviews = Review::where('user_id', $user_id)->get();
        
        if ($reviews) {
            $sum_rating = $reviews->sum('rating');
            $count_rating = $reviews->count('rating');
            
            return $sum_rating/$count_rating;
        } 
        else {
            return 0;
        }
        
    }

    // Function Fetch User Universities Details
    public function getUserReviewsCount($user_id) {
        $reviews = Review::where('user_id', $user_id)->get();
        
        if ($reviews) {
            $count_rating = $reviews->count('rating');

            return $count_rating;
        } 
        else {
            return 0;
        }   
    }

    // Personal Info Validate Function
    public function validatePersonalInfoForm($request)
    {
        $validatedData = $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg|max:250',
            'name'  => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.Auth::user()->id,
            'name'  => 'required|string|max:191',
            'description' => 'required|string|max:1000',
        ]);

        return $validatedData;
    }

    // Personal Image Store Function
    public function storeProfileImage($request)
    {
        $user = auth()->user();
        
        $currentPhoto = $user->profile_photo;

        $imageReceived = $request->profile_photo;


        // Check if name of previous photo is not equal to current photo then upload;
        if ($request->profile_photo != $currentPhoto) {
            

          // making unique name of image so it can't be repeated;
            $name = time().'.'.$imageReceived->getClientOriginalExtension();

          // Now using image intervention to save our image;
            \Image::make($request->profile_photo)->save(public_path('images/profile/').$name);

          // storing new name value using merge function;
            $request->merge(['profile_photo'=>$name]);

            if ($name) {
                $request->merge(['profile_photo_url'=>null]);
            }


          // Deleting current photo while uploading new one;
          //Step-1:- get current photo directory path:
            $userPhoto = public_path('images/profile/').$currentPhoto;
          //Step-2:- Check if already file exits and then delete photo using unlink;
            if (file_exists($userPhoto)) {
                @unlink($userPhoto);
            }
        }

        return $request;
    }

    // Update User Person Info Function
    public function updateUserPersonalInfo($user, $data)
    {
        $profile_photo = null;
        $profile_photo_url = null;

        if ( isset($data['profile_photo']) && !is_null($data['profile_photo']) ) {

            $profile_photo = $data['profile_photo'];
        } 

        if ( isset($data['profile_photo_url']) && !is_null($data['profile_photo_url']) ) {

            $profile_photo_url = $data['profile_photo_url'];
        }
        else if ($user->profile_photo_url) {
            $profile_photo_url = $user->profile_photo_url;
        }

        return $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'description' => $data['description'],
            'profile_photo' => $profile_photo,
            'profile_photo_url' => $profile_photo_url,
        ]);
    }
}
