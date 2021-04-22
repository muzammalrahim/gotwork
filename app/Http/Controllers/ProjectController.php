<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Membership;
use App\Models\UserMembership;
use App\Models\Project;
use App\Models\Milestone;
use App\Models\bids;

use Auth;
use Validator;

class ProjectController extends Controller
{

    // Global Variables
        // private $route_path_proje_details = '';
    // End Global Variables


    public function filterProjects(Request $request)
    {
    	$data = [];

    	$filter_project_types = $request->input('search_project_types');
    	
    	

    	$data['filter_project_types'] = $filter_project_types;
    }


    // Project Detail 

    public function projectDetails($slug){

    	// Start: Model Initialization
        	$project = new Project;
            $membership = new Membership;
            $user_membership = new UserMembership;
    	// End: Model Initialization

            
        $user = Auth::user();
        // dd($user);
        $data['user'] = $user;
        $data['title'] = 'Project Detail';
        
        // Get Project Details By Slug
        $data['project_details'] = $project->getProjectDetailsBySlug($slug);

        // Get UserMemberShip Details
        $data['user_membership_details'] = $user_membership->getUserMembershipDetails(); 

        // Get Membership Details By Type
        $data['membership_details'] = $membership->getMembershipDetailsByType($data['user_membership_details']->membership_type); 
         
        $data['remaining_bids'] = (int) ($data['membership_details']->total_bids) - ($data['user_membership_details']->bids_used);
        
        return view('backend.projects.project_details', $data);   // backend/projects/project_details
    }

    // Place bid 
    public function place_bid(Request $request){

        
        // Initialization
            $data = $request->input();
            $bid = new bids;
            $user_membership = new UserMembership;
            $mile_stone = new Milestone;
        // End Initialization


        $validator = $this->validatePlaceBid($request->all());

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        $bid = $bid->storeBidData($data);

        if ($bid->id) {
            $increment_bids_used = $user_membership->incrementBidUsed();
            
            return redirect()->back()->with('success', 'Bid has been placed successfully.');
        }
        else {
            return redirect()->back()->with('error', 'Something Wrong! Bid not placed.');
        }
        
        return view('backend.projects.project_details', $data);   // backend/projects/project_details
    }


    // Get Project Proposals
    public function getProjectProposals($slug)
    {
        // Initialization
            $project = new Project;
            $bid = new bids;
            $data = [];
            $project_id = null;
        // End Initialization
        

       /* $project_details = $project->getProjectDetailsBySlug($slug);
        $project_id = $project_details->id;
        
        $data['bids'] = null; */

        dd("Bids Listing Page, included in next milestone...");
    }

    // My Projects Page
    public function myProjects(Request $request) 
    {
        // Initialization
            $project = new Project;
            $bid = new bids;
            $data = [];
            $user = Auth::user();
        // End Initialization


        $data['user'] = $user;
        $data['title'] = 'Projects';


        

        // Get Freelancer Bids Data                    
        $data['bids'] = $project->join('bids','projects.id','=','bids.project_id')
                            ->where('bids.user_id','=',Auth::user()->id)
                            ->orderBy('projects.id','DESC')
                            ->get();

        // Get Freelancer Current Work                    
        $data['current_works'] = $project
                            ->join('bids','projects.id','=','bids.project_id')
                            ->join('milestones', 'milestones.bid_id','=','bids.id')
                            ->where('bids.user_id','=',Auth::user()->id)
                            ->where('projects.status','=','Assigned')
                            ->orderBy('projects.id','DESC')
                            ->get();
        
        // Get Freelancer Past Work                    
        $data['past_works'] = $project
                            ->join('bids','projects.id','=','bids.project_id')
                            ->join('milestones', 'milestones.bid_id','=','bids.id')
                            ->where('bids.user_id','=',Auth::user()->id)
                            ->where('projects.assignee_id' , '=', Auth::user()->id)
                            ->where('bids.awarded','=','Yes')
                            ->where('projects.status','!=','Active')
                            ->where('projects.status','!=','Assigned')
                            ->orderBy('projects.id','DESC')
                            ->get();

        return view('backend.my-projects.freelancer_projects', $data);   // backend/myprojects/myprojects
    }


    public function clientProjects()
    {
        // Initialization
            $project = new Project;
            $bid = new bids;
            $data = [];
            $user = Auth::user();
        // End Initialization


        $data['user'] = $user;
        $data['title'] = 'Projects';


        // Get Client Open Projects
        $data['open_projects'] = $project->join('bids','bids.project_id','=','projects.id')
                            ->where('projects.user_id','=',Auth::user()->id)
                            ->where('projects.status','=','Active')
                            ->orderBy('projects.id','DESC')
                            ->get();

        // Get Client Work In Progress                    
        $data['works_in_progress'] = $project
                            ->join('bids','projects.id','=','bids.project_id')
                            ->join('milestones', 'milestones.bid_id','=','bids.id')
                            ->where('bids.awarded','=','Yes')
                            ->where('projects.status','=','Assigned')
                            ->orderBy('projects.id','DESC')
                            ->get();

        // Get Freelancer Past Work                    
        $data['past_projects'] = $project
                            ->join('bids','projects.id','=','bids.project_id')
                            ->join('milestones', 'milestones.bid_id','=','bids.id')
                            // ->where('bids.user_id','=',Auth::user()->id)
                            ->where('projects.user_id' , '=', Auth::user()->id)
                            ->where('bids.awarded','=','Yes')
                            ->where('projects.status','!=','Active')
                            ->where('projects.status','!=','Assigned')
                            ->orderBy('projects.id','DESC')
                            ->get();

        return view('backend.my-projects.client_projects', $data);   // backend/myprojects/myprojects
    }

    
    /* Start: Validations */
    public function validatePlaceBid(array $data)
    {
        return Validator::make($data, [
            'project_id'  => 'required',
            'project_currency_symbol' => 'required',
            'bid_amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'project_delivery' => 'required|numeric|min:1|max:365',
            'mile_stone.*.task' => 'required|string|max:255',
            'mile_stone.*.amount' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'proposal'  => 'required|string|max:1000',
        ]);
    }
    /* End: Validations */

}
