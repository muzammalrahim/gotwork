<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

use Auth;

class ProjectController extends Controller
{
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
    	// End: Model Initialization
        $user = Auth::user();
        // dd($user);
        $data['user'] = $user;
        $data['title'] = 'Project Detail';
        // Get Project Details By Slug
        $data['project_details'] = $project->getProjectDetailsBySlug($slug);
        return view('backend.projects.project_details', $data);   // backend/projects/project_details
    }

    // Place bid 
    public function place_bid(Request $request){

        // Start: Model Initialization
        dd($request->toArray());
        
        return view('backend.projects.project_details', $data);   // backend/projects/project_details
    }





}
