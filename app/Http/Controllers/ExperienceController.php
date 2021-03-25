<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Models\Experience;

use Validator;
use Auth;

class ExperienceController extends Controller
{
	// Global Variables
		private $route_path = '/setting#tabs-2';
	// End Global Variables


	/* Start: Store Functionality*/
        public function storePersonalExperience(Request $request)
        {

        	// Initialization
            	$data = $request->input();
            // End Initialization

        	$validator = $this->validatePersonalExperience($request->all());


        	// Ajax Case
            if ($validator->fails()) {
                return response()->json(['msg' => "Fill Mandatory Fields",'Error'=> $validator->errors()]);
            }

            $store_personal_qualification = self::storePersonalExperienceData($data);


            if ($store_personal_qualification->id) {
            	return response()->json(['msg' => "Success"]);
            }

        }

        public function storePersonalExperienceData($data)
        {
            if (!array_key_exists('is_current', $data)) {
	    		$data['is_current'] = 'No';
	    	} else {
	    		$data['is_current'] = 'Yes';
	    		$data['end_month'] = NULL;
	    		$data['end_year'] = NULL;
	    	}
	    	return Experience::create([
	    		'user_id' => Auth::user()->id,
	    		'title' => $data['title'],
	    		'company_name' => $data['company_name'],
	    		'start_month' => $data['start_month'],
	    		'start_year' => $data['start_year'],
	    		'end_month' => $data['end_month'],
	    		'end_year' => $data['end_year'],
	    		'summary' => $data['summary'],
	    		'is_current' => $data['is_current'],
	    	]);
        }

    /* End: Store Functionality*/

    
    /* Start: Update Functionality */
	    public function updatePersonalExperience(Request $request)
	    {

	        // Initialization
	        	$data = $request->input();
	        // End Initialization


	    	$validator = $this->validatePersonalExperience($request->all());


	        // Non Ajax Case
	        if ($validator->fails()) {
	            return redirect($this->route_path)
	            ->withErrors($validator)
	            ->withInput();
	        }

	        $update_personal_experience = self::updatePersonalExperienceData($data);


	        if ($update_personal_experience) {
	        	return redirect($this->route_path)->with('success', 'Experience Has Been Successfully Updated.');
	        }
	        else {
	        	return redirect($this->route_path)->with('error', 'Something Wrong! Data Not Updated.');
	        }

	    }
    
    	// Personal Education Skills Validation Function
	    public function validatePersonalExperience(array $data)
	    {
	    	if (!array_key_exists('is_current', $data)) {
                return Validator::make($data, [
		            'title'  => 'required|string|max:255',
		            'company_name'  => 'required|string|max:355',
		            'start_month'  => 'required|string|max:255',
		            'start_year'  => 'required|string|max:255',
		            'end_month'  => 'required|string|max:255',
		            'end_year'  => 'required|string|max:255',
		            'summary'  => 'required|string|max:1000',
	        	]);
            } else {
            	return Validator::make($data, [
		            'title'  => 'required|string|max:255',
		            'company_name' => 'required|string|max:355',
		            'start_month' => 'required|string|max:255',
		            'start_year' => 'required|string|max:255',
		            'summary'  => 'required|string|max:1000',
	        	]);
            }
    		
	    }
	
		// Personal Qualification Update Function
		public function updatePersonalExperienceData($data)
	    {

	    	if (!array_key_exists('is_current', $data)) {
	    		$data['is_current'] = 'No';
	    	} else {
	    		$data['is_current'] = 'Yes';
	    		$data['end_month'] = NULL;
	    		$data['end_year'] = NULL;
	    	}
	    	return Experience::where('id','=',$data['experience_id'])->update([
	    		'user_id' => Auth::user()->id,
	    		'title' => $data['title'],
	    		'company_name' => $data['company_name'],
	    		'start_month' => $data['start_month'],
	    		'start_year' => $data['start_year'],
	    		'end_month' => $data['end_month'],
	    		'end_year' => $data['end_year'],
	    		'summary' => $data['summary'],
	    		'is_current' => $data['is_current'],
	    	]);
	    }
	/* End: Update Functionality*/
	
	/* Start: Delete Functionality*/
        public function deletePersonalExperience($id)
        {

        	$user_id = Auth::user()->id;

            $delete_user_experience = Experience::find($id)->delete();

            if ($delete_user_experience) {
                return redirect($this->route_path)->with('success', 'Experience Has Been Successfully Deleted.');
            } 
            else {
                return redirect($this->route_path)->with('error', 'Something Wrong! Data Not Deleted.');
            }
        }
    /* End: Delete Functionality*/
}
