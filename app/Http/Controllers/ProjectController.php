<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function filterProjects(Request $request)
    {
    	$data = [];

    	$filter_project_types = $request->input('search_project_types');
    	
    	

    	$data['filter_project_types'] = $filter_project_types;
    }
}
