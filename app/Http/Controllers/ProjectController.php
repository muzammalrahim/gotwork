<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Membership;
use App\Models\UserMembership;
use App\Models\Project;
use App\Models\Milestone;
use App\Models\bids;
use App\Models\Skill;
use App\Models\Category;
use App\Models\ProjectType;
use App\Models\Currency;

use Auth;
use Validator;
use Carbon\Carbon;

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
        
        $data['user'] = $user;
        $data['title'] = 'Project Detail';
        $data['edit_bid'] = false;
        
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
    public function place_bid(Request $request) {

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
            
            return redirect()->route('myProjects')->with('success', 'Bid has been placed successfully.');
        }
        else {
            return redirect()->back()->with('error', 'Something Wrong! Bid not placed.');
        }
        
        return view('backend.projects.project_details', $data);   // backend/projects/project_details
    }

    // Update bid
    public function update_bid(Request $request) {
        
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

        
        $bid = $bid->updateBidData($data);

        if ($bid->id) {
            
            return redirect()->route('myProjects')->with('success', 'Bid has been updated successfully.');
        }
        else {
            return redirect()->back()->with('error', 'Something Wrong! Bid not updated.');
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
                            ->where('projects.status','=','Active')
                            ->orderBy('projects.id','DESC')
                            ->get();

        // Get Freelancer Current Work                    
        $data['current_works'] = $project
                            ->join('bids','projects.id','=','bids.project_id')
                            ->where('bids.user_id','=',Auth::user()->id)
                            ->where('projects.status','=','Assigned')
                            ->select('projects.*', 'bids.id as bid_id', 'bids.project_id as bid_project_id', 'bids.user_id as bid_user_id', 'bids.proposal as bid_proposal', 'bids.project_currency_symbol','bids.bid_amount', 'bids.project_delivery', 'bids.status', 'bids.awarded_at', 'bids.created_at as bid_created_at', 'bids.updated_at as bid_updated_at')
                            ->orderBy('projects.id','DESC')
                            ->get();
        
        // Get Freelancer Past Work                    
        $data['past_works'] = $project
                            ->join('bids','projects.id','=','bids.project_id')
                            ->where('bids.user_id','=',Auth::user()->id)
                            ->where('projects.assignee_id' , '=', Auth::user()->id)
                            ->where('bids.status','=','awarded')
                            ->where('projects.status','!=','Active')
                            ->where('projects.status','!=','Assigned')
                            ->select('projects.*', 'bids.id as bid_id', 'bids.project_id as bid_project_id', 'bids.user_id as bid_user_id', 'bids.proposal as bid_proposal', 'bids.project_currency_symbol','bids.bid_amount', 'bids.project_delivery', 'bids.status as bid_status', 'bids.awarded_at', 'bids.created_at as bid_created_at', 'bids.updated_at as bid_updated_at')
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
                            ->where('projects.user_id' , '=', Auth::user()->id)
                            ->where('bids.status','=','awarded')
                            ->where('projects.status','=','Assigned')
                            ->select('projects.*', 'bids.id as bid_id', 'bids.project_id as bid_project_id', 'bids.user_id as bid_user_id', 'bids.proposal as bid_proposal', 'bids.project_currency_symbol','bids.bid_amount', 'bids.project_delivery', 'bids.status', 'bids.awarded_at', 'bids.created_at as bid_created_at', 'bids.updated_at as bid_updated_at')
                            ->orderBy('projects.id','DESC')
                            ->get();

                            
                            /*
                            ->join('bids','projects.id','=','bids.project_id')
                            ->join('milestones', 'milestones.bid_id','=','bids.id')
                            ->where('bids.awarded','=','Yes')
                            ->where('projects.status','=','Assigned')
                            ->orderBy('projects.id','DESC')
                            ->get();
                            */

        // Get Freelancer Past Work                    
        $data['past_projects'] = $project
                            ->join('bids','projects.id','=','bids.project_id')
                            ->where('projects.user_id' , '=', Auth::user()->id)
                            ->where('bids.status','=','awarded')
                            ->where('projects.status','!=','Active')
                            ->where('projects.status','!=','Assigned')
                            ->select('projects.*', 'bids.id as bid_id', 'bids.project_id as bid_project_id', 'bids.user_id as bid_user_id', 'bids.proposal as bid_proposal', 'bids.project_currency_symbol','bids.bid_amount', 'bids.project_delivery', 'bids.status as bid_status', 'bids.awarded_at', 'bids.created_at as bid_created_at', 'bids.updated_at as bid_updated_at')
                            ->orderBy('projects.id','DESC')
                            ->get();

        return view('backend.my-projects.client_projects', $data);   // backend/myprojects/myprojects
    }

    // Edit Bids
    public function edit_bid($slug, $id)
    {

        // Start: Model Initialization
            $project = new Project;
            $bid = new bids;
            $membership = new Membership;
            $user_membership = new UserMembership;
        // End: Model Initialization

            
        $user = Auth::user();
        
        $data['user'] = $user;
        $data['title'] = 'Project Detail';
        $data['edit_bid'] = true;
        
        // Get Project Details By Slug
        $data['project_details'] = $project->getProjectDetailsBySlug($slug);

        // Get Freelancer Bid Data
        $data['bid_data'] = $bid->where('id','=',$id)->first(); 

        // Get UserMemberShip Details
        $data['user_membership_details'] = $user_membership->getUserMembershipDetails(); 

        // Get Membership Details By Type
        $data['membership_details'] = $membership->getMembershipDetailsByType($data['user_membership_details']->membership_type); 
         
        $data['remaining_bids'] = (int) ($data['membership_details']->total_bids) - ($data['user_membership_details']->bids_used);
        
        return view('backend.projects.project_details', $data);   // backend/projects/project_details
        
    }


    // Reward Bid
    public function rewardBid($id)
    {
        // Initialization
            $bid = new bids;
        // End Initialization

        $bid_data = $bid->where('id','=',$id)->first();

        $bid_data->status = 'awarded';
        $bid_data->awarded_at = Carbon::now();

        $bid_data->update();

        if ($bid_data->id) {
            return redirect()->back()->with('success', 'Bid has been awarded successfully.');
        }
        else {
            return redirect()->back()->with('error', 'Something Wrong! Bid not awarded.');
        }
    }


    // Accept Project
    public function acceptProject($project_id)
    {
        // Initialization
            $project = new Project;
        // End Initialization

        $project_data = $project->where('id','=',$project_id)->first();

        $project_data->status = 'Assigned';

        $project_data->update();

        if ($project_data->id) {
            return redirect()->back()->with('success', 'Project has been accepted & is added to the current work.');
        }
        else {
            return redirect()->back()->with('error', 'Something Wrong! Project not accepted.');
        }
    }


    // Deny Project
    public function denyProject($project_id)
    {
        // Initialization
            $bid = new bids;
        // End Initialization

        $bid = $bid->where('project_id','=',$project_id)->first();

        $bid->status = 'denied';

        $bid->update();

        if ($bid->id) {
            return redirect()->back()->with('success', 'Project has been denied successfully.');
        }
        else {
            return redirect()->back()->with('error', 'Something Wrong! Project not denied.');
        }
    }

    
    // Cancel Project
    public function cancelProject($project_id)
    {
        // Initialization
            $project = new Project;
        // End Initialization

        $project = $project->where('id','=',$project_id)->first();

        $project->status = 'Cancelled';

        $project->update();

        if ($project->id) {
            return redirect()->back()->with('success', 'Project has been cancelled successfully.');
        }
        else {
            return redirect()->back()->with('error', 'Something Wrong! Project not cancelled.');
        }
    }


    // Go To Post Project Page
    public function goToPostProject()
    {
        // Intialization
            $skill = new Skill;
            $category = new Category;
            $project_type = new ProjectType;
            $currency = new Currency;
        // End Intialization

        $data['skills'] = $skill->getSkillsList();
        $data['categories'] = $category->getCategoriesList();
        $data['project_types'] = $project_type->getProjectTypesList();
        $data['currencies'] = $currency->getCurrenciesList();

        return view('backend.projects.post_project', $data);
    }

    // Store Posted Project
    public function storePostedProject(Request $request)
    {
        // Intialization
            $project = new Project;
            $data = $request->input();
        // End Intialization

        $validator = $this->validateStorePostedProject($request->all());

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        $project = $project->storePostedProject($data);

        if ( $project->id ) {
            return redirect('projects')->with('success', 'Project Has Been Successfully Posted.');
        }
        else {
            return redirect()->back()->with('error', 'Project Posting Error.');
        }
    } 

    // Check Slug In Db
    public function checkSlugInDb(Request $request)
    {
        try {
            if ( $request->ajax() ) {
                // Intialization
                    $data = $request->input();
                    $project = new Project;
                // End Intialization
                
                $project = $project->getProjectDetailsBySlug($data['slug']);

                if (!is_null($project)) {
                    return response()->json(['error'=>'Slug already exists.']);
                }
            }
        } catch (Exception $e) {
            return response()->json(['error'=>'Slug error.']);
        }
    }





    



    /* Start: Ajax Funtions */
        public function showBidMilestones($bid_id)
        {
            try 
            {  
                if(\Request::ajax())
                {

                    // Initialization
                        $milestone = new Milestone;
                    // End Initialization  
                    $milestone_data = $milestone->where('bid_id',$bid_id)->get();

                    return $milestone_data;
                }

            } 
            catch (Exception $e)
            {
                return $e->getMessage();
            }
        }
    /* End: Ajax Funtions */
    
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

        public function validateStorePostedProject(array $data)
        {
            return Validator::make($data, [
                'category' => 'required|integer',
                'title'  => 'required|string|max:300',
                'slug'  => 'required|unique:projects',
                'description'  => 'required|string|max:1000',
                'skill' => 'required|integer',
                'project_type' => 'required|integer',
                'currency' => 'required|integer|bail|gt:0',
                'min_amount' => 'required|integer|bail|gt:0',
                'max_amount' => 'required|integer|bail|gt:0',
            ]);
        }
    /* End: Validations */

}
