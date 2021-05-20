<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Activitylog\Models\Activity;

use App\Models\ProjectListingType;
use App\Models\ProjectType;
use App\Models\ListingType;
use App\Models\Project;
use App\Models\User;
use App\Models\bids;
use App\Models\Skill;
use App\Models\Membership;
use App\Models\UserMembership;

use Auth;
use DB;

class DashboardController extends Controller
{
    // Global Variables
        private $pagination = '20';
        private $fixed_name;
        private $hourly_name;
        private $default_selected_project_sort = 'lowest_price';
    // End Global Variables

    public function __construct()
    {
        $this->fixed_name = env('PROJECT_TYPE_FIXED');
        $this->hourly_name = env('PROJECT_TYPE_HOURLY');
    }


    // Function: Go to Dashboard 
    public function goToDashboard(Request $request){

        // Start: Model Initialization
            $project = new Project;
            $membership = new Membership;
            $user_membership = new UserMembership;
        // End: Model Initialization


        $user = Auth::user();
        $data['user'] = $user;

        // Get UserMemberShip Details
        $data['user_membership_details'] = $user_membership->getUserMembershipDetails(); 

        // Get Membership Details By Type
        $data['membership_details'] = $membership->getMembershipDetailsByType($data['user_membership_details']->membership_type); 
         
        $data['remaining_bids'] = (int) ($data['membership_details']->total_bids) - ($data['user_membership_details']->bids_used);

        $data['news_feeds'] = Activity::orderBy('id','DESC')->get();
        //dd($data['news_feeds']);
        return view('backend.dashboard.dashboard', $data);   // backend/dashboard/dashboard

    }

	
    // Function: Go to Projects List  
	public function projects(Request $request)
    {
    	if ( isset(Auth::User()->id) &&  isset(Auth::User()->email_verified_at) ) {

            // Intialization
                $data = [];
                $search = false;
                $project_ids = [];
                $project_types = [];

                // Models Initialization
                $skill = new Skill;
                $project = new Project;
                $project_type = new ProjectType;
                $listing_type = new ListingType;
                $project_listing_type = new ProjectListingType;

                // Assigning For Checked Checkbox Values
                $filter_project_types = $request->input('search_project_types');
                $filter_listing_types = $request->input('search_listing_types');
                $filter_listing_skills = $request->input('search_project_skills');

                $data['filter_project_types'] = $filter_project_types;
                $data['filter_listing_types'] = $filter_listing_types;
                $data['filter_listing_skills'] = $filter_listing_skills;

                $fixed_id = null;
                $hourly_id = null;

                $data['selected_sort'] = $request->get('sort');
            // End Initialization

            
            if (!$request->get('sort')) {
                $url = $request->url();
                
                // Appending to query string for default selected
                return redirect()->to($url.'?sort='.$this->default_selected_project_sort);
            } 
            
        
            // Search Functionality
            if ($request->has('search') && $request->input('search') != '') {
                $search = true;
            }

            // Get Project Type List
            $data['project_types'] = $project_type->getProjectTypesList();

            // Get Listing Type List
            $data['listing_types'] = $listing_type->getListingTypesList();

            // Get Skills List
            $data['skills_list'] = $skill->getSkillsList();

            // Getting ids of Fixed And Hourly for Filtering 
            foreach ($data['project_types'] as $project_type) {
                if ( $project_type->name == $this->fixed_name ) {
                    $fixed_id = $project_type->id;
                } else if ( $project_type->name == $this->hourly_name ) {
                    $hourly_id = $project_type->id;
                }
            }

            // Get Project List
            $data['projects_list'] = $project
                ->when($search, function($query) use ($request) {
                    $query->where('title','like', "%{$request->input('search')}%");
                })->orderBy('id','DESC')
                ->paginate($this->pagination);


            /* Start: Ajax Method */
                if ( $request->ajax() ) {
                    
                    
                    // Filter With Projects Type ( Fixed Or Hourly )
                    if ($request->input('selected_project_type')) {

                        $project_type = explode(',', $request->input('selected_project_type'));

                        $data['projects_list'] = $project
                        ->where(function ($query) use ($project_type) {
                            $query->whereIn('project_type_id', $project_type);
                        })
                        ->orderBy('id','DESC')
                        ->paginate($this->pagination);
                    }


                    // Filter For Fixed Price Projects(Min And Max)
                    if ( $request->fixed_min_amount && $request->fixed_max_amount ) {
                        $data['projects_list'] = $project
                        ->where('min_amount', '>=', $request->fixed_min_amount)
                        ->where('max_amount', '<=', $request->fixed_max_amount)
                        ->where('project_type_id','=',$fixed_id)
                        ->orderBy('id','DESC')
                        ->paginate($this->pagination);
                    }

                    // Filter For Hourly Price Projects(Min And Max)
                    if ( $request->hourly_min_amount && $request->hourly_max_amount ) {
                        $data['projects_list'] = $project
                        ->where('min_amount', '>=', $request->hourly_min_amount)
                        ->where('max_amount', '<=', $request->hourly_max_amount)
                        ->where('project_type_id','=',$hourly_id)
                        ->orderBy('id','DESC')
                        ->paginate($this->pagination);
                    }


                    // Filter With Listing Types ( E.g. Featured etc )
                    if ($request->input('search_project_by_listing_types')) {

                        $search_project_by_listing_types = explode(',', $request->input('search_project_by_listing_types'));

                        $data['projects_list'] = $project
                        ->join('project_listing_types', 'project_listing_types.project_id','=','projects.id')
                        ->where(function ($query) use ($search_project_by_listing_types) {
                            $query->whereIn('project_listing_types.listing_type_id', $search_project_by_listing_types);
                        })
                        ->paginate($this->pagination);
                    }


                    // Filter With Project Skills ( E.g. PHP etc )
                    if ($request->input('search_project_by_skills')) {                    

                        $search_project_by_skills = explode(',', $request->input('search_project_by_skills'));

                        $data['projects_list'] = $project
                        ->join('project_skills', 'project_skills.project_id','=','projects.id')
                        ->where(function ($query) use ($search_project_by_skills) {
                            $query->whereIn('project_skills.skill_id', $search_project_by_skills);
                        })
                        ->paginate($this->pagination);
                    }
                    

                    

                    return view('backend.includes.projects_list', $data);
                }
            /* End: Ajax Method */


            /* Start: Sort Functionality */
            if ($request->has('sort') && $request->input('sort') != '') {
                
                if ($request->sort == "latest") {
                    $data['projects_list'] = $project
                    ->orderBy('id','DESC')
                    ->paginate($this->pagination);
                } else if ($request->sort == "oldest") {
                    $data['projects_list'] = $project
                    ->orderBy('id','ASC')
                    ->paginate($this->pagination);
                } else if ($request->sort == "lowest_price") {
                    $data['projects_list'] = $project
                    ->select('projects.*')
                    ->orderBy('projects.min_amount', 'ASC')
                    ->paginate($this->pagination);
                } else if ($request->sort == "highest_price") {
                    $data['projects_list'] = $project
                    ->select('projects.*')
                    ->orderBy('projects.min_amount', 'DESC')
                    ->paginate($this->pagination);
                } else if ($request->sort == "most_bids") {
                    $data['projects_list'] = $project->withCount('bids')->orderBy('bids_count', 'desc')->paginate($this->pagination); 
                } else if ($request->sort == "fewer_bids") {
                    $data['projects_list'] = $project->withCount('bids')->orderBy('bids_count', 'asc')->paginate($this->pagination);
                }
            }
            /* End: Sort Functionality */


    		return view('backend.projects.projects', $data);   // backend/projects/projects
    	} else {
    		return view('auth.verify-email');
    	}
    	
    }


}
