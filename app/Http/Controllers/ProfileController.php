<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserSkill;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Review;
use App\Models\Project;

use Auth;

use DB;
use File;
use Validator;

class ProfileController extends Controller
{
    // Global Variables
        private $default_selected_skill = 'Laravel';
    // End Global Variables


    // Function: GoTo Profile 
	public function goToProfile(Request $request)
    {
        // Intialization
            $user = new User;
            $project = new Project;
            $user_skills = new UserSkill;
            $data = []; 
            $project_tags = [];
            $user_countries = [];
            $user_universities = [];
            $data['selected_reviews'] = $request->get('reviews');
        // End Intialization

        /*    
        $user_default_skills = $user_skills
                            ->join('skills','user_skills.skill_id' ,'=', 'skills.id')
                            ->where('user_skills.user_id', '=' , Auth::user()->id)
                            ->get();
        dd($user_default_skills);
        */


        // dd($request->get('reviews'));
        if (!$request->get('reviews')) {
            $url = $request->url();
            
            // Appending to query string for default selected
            return redirect()->to($url.'?reviews='.$this->default_selected_skill);
        }    

    	if ( isset(Auth::User()->id) &&  isset(Auth::User()->email_verified_at) ) {

            $id = Auth::user()->id;

            // Get User Rating
            $data['user_rating'] = $this->getUserRatingCount($id); 

            // Get User Reviews Count
            $data['user_reviews_count'] = $this->getUserReviewsCount($id);

            // Fetching Current User Skills 
            $user_skill = $this->getUserSkills($id);


            
            if ($request->get('reviews')) {
                // Filered Reviews
                if ($request->get('reviews')=='view_all') {
                    $user_reviews = $this->getUserReviews();
                    //dd($user_reviews);
                }
                else {
                    $user_skill_id = $this->getSkillIdByName($request->get('reviews'));
                    
                    // Get User Reviews By Skill
                    $user_reviews = $this->getUserReviewsBySkill($user_skill_id->id);

                }
            }
            else {
                // All Reviews
                $user_reviews = $this->getUserReviews();
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

    public function getSkillIdByName($skill_name)
    {
        return DB::table('skills')->where('name','=',$skill_name)->first('id');
    }

    /* Start: Settings Page Functions */
    public function goToSetting(Request $Request)
    {   

        $user = Auth::user();
        // dd($user);
        $data['alive_div'] = null;
        $data['user'] = $user;
        $data['experience'] = Experience::where('user_id' , $user->id)->get();
        $data['countries'] = DB::table('countries')->get();
        $data['skills'] = DB::table('skills')->orderBy('name','ASC')->get();

        return view('setting',$data);
    }   


    // Ajax for getting universities 

    public function universities($country_id)
    {   

        $university = DB::table('linkedin_universities')->where('country_id' , $country_id)->get();
        $data['university'] = $university;
        if ($university->count() > 0) {
            return view('layouts.setting.universities',$data);
        }
        else{

            $university = DB::table('webometric_universities')->where('country_id' , $country_id)->get();
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
                return redirect()->back()->with('error', 'Something Wrong! Data Not Updated.');
            }
        }
    } 

    public function updatePersonalSkills(Request $request)
    {
        // Intialization
            $user_skill = new UserSkill;
        // End Intialization


        $validator = $this->validatePersonalSkills($request->all());

        if ($validator->fails()) {
            return redirect('/setting#tabs-5')
            ->withErrors($validator)
            ->withInput();
        }

        $skills_id = $request->values;
        
        $skill_array = explode(',', $skills_id);

        $count_skills = 0;

        foreach ($skill_array as $skill_id) {
            if ($skill_id) {
                
                $db_check_skill_count = $this->getUserSkillFromDB($skill_id);

                
                if (count($skill_array) > 1) {
                    if ( $db_check_skill_count > 0 ) {
                        $count_skills++;
                        continue;
                    }
                } 
                else {
                    if ( $db_check_skill_count > 0 ) {
                        return redirect('/setting#tabs-5')->with('error', 'Skill Already Added.');
                    }
                }
                

                $add_data = $user_skill->create([
                    'user_id' => Auth::user()->id,
                    'skill_id' => $skill_id,
                ]);

                if ($add_data) {
                    return redirect('/setting#tabs-5')->with('success', 'User Skill Has Been Successfully Added.');
                }
                else {
                    return redirect('/setting#tabs-5')->with('error', 'Something Wrong! Data Not Added.');
                }
            }
        }

        if ( count($skill_array) == $count_skills ) {
            return redirect('/setting#tabs-5')->with('error', 'Following Skills Already Added.');
        }
    }

    public function deletePersonalSkills($id)
    {
        $user_id = Auth::user()->id;

        $delete_user_skill = UserSkill::find($id)->delete();

        if ($delete_user_skill) {
            return redirect('/setting#tabs-5')->with('success', 'User Skill Has Been Successfully Deleted.');
        } 
        else {
            return redirect('/setting#tabs-5')->with('error', 'Something Wrong! Data Not Deleted.');
        }

    }


    

    /* End: Settings Page Functions */



    public function getProjectTags($reviews)
    {
        return DB::table('tags')
            ->join('project_tags', 'project_tags.tag_id','=','tags.id')
            ->where('project_tags.project_id','=',$reviews->review_project_id)
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
        
        if ( count($reviews) > 0 ) {
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
    
    // Personal Info Skills Validation Function
    public function validatePersonalSkills(array $data)
    {
        return Validator::make($data, [
            'values'  => 'required',
        ]);
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


    public function getUserSkillFromDB($skill_id)
    {
        return DB::table('user_skills')->where('user_id', '=', Auth::user()->id)->where('skill_id','=', $skill_id)->count();
    }

    // Get user reviews
    public function getUserReviews()
    {
        // Initialization
            $project = new Project;
        // End Initialization

        return $project
                ->join('reviews', 'projects.id', '=', 'reviews.project_id')
                ->where('reviews.user_id','=',Auth::user()->id)
                //->orWhere('projects.assignee_id','=',Auth::user()->id)
                ->select('projects.*', 'reviews.id as review_id', 'reviews.user_id as review_user_id', 'reviews.project_id as review_project_id', 'reviews.comment as review_comment', 'reviews.rating as review_rating', 'reviews.created_at as review_created_at', 'reviews.updated_at as review_updated_at')
                ->orderBy('projects.id','DESC')
                ->get();
    }


    // Get User Reviews By Skill
    public function getUserReviewsBySkill($user_skill_id)
    {
        // Initialization
            $project = new Project;
        // End Initialization

        return $project
                ->join('reviews', 'projects.id', '=', 'reviews.project_id')
                ->join('project_skills', 'projects.id' , '=', 'project_skills.project_id')
                ->join('project_tags', 'projects.id', '=', 'project_tags.project_id')
                ->where('projects.user_id','=',Auth::user()->id)
                ->where('project_skills.skill_id', '=', $user_skill_id)
                ->select('projects.*', 'reviews.id as review_id', 'reviews.user_id as review_user_id', 'reviews.project_id as review_project_id', 'reviews.comment as review_comment', 'reviews.rating as review_rating', 'reviews.created_at as review_created_at', 'reviews.updated_at as review_updated_at')
                ->groupBy('id')
                ->orderBy('id','DESC')
                ->get();
    }
}
