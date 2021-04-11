<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProjectListingType;
use App\Models\ProjectType;
use App\Models\ListingType;
use App\Models\Project;
use App\Models\User;
use App\Models\bids;
use App\Models\Skill;

use Auth;
use DB;

class DashboardController extends Controller
{
    // Global Variables
        private $pagination = '2';
        private $fixed_name;
        private $hourly_name;
    // End Global Variables

    public function __construct()
    {
        $this->fixed_name = env('PROJECT_TYPE_FIXED');
        $this->hourly_name = env('PROJECT_TYPE_HOURLY');
    }

	// Function: GoTo Dashboard 
	public function projects(Request $request)
    {
    	if ( isset(Auth::User()->id) &&  isset(Auth::User()->email_verified_at) ) {

//dd("coming");
            // Intialization
                $data = [];
                $search = false;
                $project_ids = [];

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
            // End Initialization

        
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

            /* Start: Sort Functionality */
            if ($request->has('sort') && $request->input('sort') != '') {
                
                if ($request->sort == "Latest") {
                    $data['projects_list'] = $project
                    ->orderBy('id','DESC')
                    ->paginate($this->pagination);
                } else if ($request->sort == "Oldest") {
                    $data['projects_list'] = $project
                    ->orderBy('id','ASC')
                    ->paginate($this->pagination);
                } else if ($request->sort == "Oldest") {
                    $data['projects_list'] = $project
                    ->orderBy('id','ASC')
                    ->paginate($this->pagination);
                } else if ($request->sort == "Lowest Price") {
                    $data['projects_list'] = $project
                    ->select('projects.*')
                    ->orderBy('projects.min_amount', 'ASC')
                    ->paginate($this->pagination);
                } else if ($request->sort == "Highest Price") {
                    $data['projects_list'] = $project
                    ->select('projects.*')
                    ->orderBy('projects.min_amount', 'DESC')
                    ->paginate($this->pagination);
                } else if ($request->sort == "Most Bids") {
                    $data['projects_list'] = $project->withCount('bids')->orderBy('bids_count', 'desc')->paginate($this->pagination); 
                } else if ($request->sort == "Fewer Bids") {
                    $data['projects_list'] = $project->withCount('bids')->orderBy('bids_count', 'asc')->paginate($this->pagination);
                }
            }
            /* End: Sort Functionality */



            /* Start: Filters Functionality */
                // Filter With Projects Type ( Fixed Or Hourly )
                if ($request->input('search_project_types')) {

                    $data['projects_list'] = $project
                    ->where(function ($query) use ($filter_project_types) {
                        $query->whereIn('project_type_id', $filter_project_types);
                    })
                    ->orderBy('id','DESC')
                    ->paginate($this->pagination);
                }

                // Filter With Listing Types ( E.g. Featured etc )
                if ($request->input('search_listing_types')) {                    

                    $data['projects_list'] = $project
                    ->join('project_listing_types', 'project_listing_types.project_id','=','projects.id')
                    ->where(function ($query) use ($filter_listing_types) {
                        $query->whereIn('project_listing_types.listing_type_id', $filter_listing_types);
                    })
                    ->paginate($this->pagination);
                }

                // Filter With Project Skills ( E.g. PHP etc )
                if ($request->input('search_project_skills')) {                    

                    $data['projects_list'] = $project
                    ->join('project_skills', 'project_skills.project_id','=','projects.id')
                    ->where(function ($query) use ($filter_listing_skills) {
                        $query->whereIn('project_skills.skill_id', $filter_listing_skills);
                    })
                    ->paginate($this->pagination);
                }


                // Filter For Fixed Price Projects(Min And Max)
                if ( $request->fixed_min > 0 && $request->hourly_max < 3000 ) {
                    
                    $data['projects_list'] = $project
                        ->where('min_amount', '>=', $request->fixed_min)
                        ->where('max_amount', '<=', $request->fixed_max)
                        ->where('project_type_id','=',$fixed_id)
                        ->paginate($this->pagination);
                }
                else if ( $request->hourly_min > 0 && $request->fixed_max < 120 ) {
                     
                    $data['projects_list'] = $project
                        ->where('min_amount', '>=', $request->hourly_min)
                        ->where('max_amount', '<=', $request->hourly_max)
                        ->where('project_type_id','=',$hourly_id)
                        ->paginate($this->pagination);
                        //dd($data['projects_list']);
                }
                else if ( $request->fixed_min != 0 && $request->fixed_max != 3000 && $request->hourly_min != 0 && $request->hourly_max !=120 ) {
                    
                    $data['projects_list'] = $project
                        ->where('min_amount', '>=', $request->fixed_min)
                        ->orWhere('max_amount', '<=', $request->fixed_max)
                        ->where('project_type_id','=',$fixed_id)
                        ->where('min_amount', '>=', $request->hourly_min)
                        ->orWhere('max_amount', '<=', $request->hourly_max)
                        ->where('project_type_id','=',$hourly_id)
                        ->paginate($this->pagination);
                }
            /* End: Filters Functionality */



    		return view('backend.projects.projects', $data);   // backend/projects/projects
    	} else {
    		return view('auth.verify-email');
    	}
    	
    }



    public function goToDashboard(Request $request){
        $user = Auth::user();
        $data['user'] = $user;
        return view('backend.dashboard.dashboard', $data);   // backend/dashboard/dashboard

    }

    public function myProjects(Request $request){
        $user = Auth::user();
        // dd($user);
        $data['user'] = $user;
        $data['title'] = 'My Projects';
        return view('backend.myprojects.myprojects', $data);   // backend/myprojects/myprojects
    }

    



}
