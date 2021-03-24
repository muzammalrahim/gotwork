<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Qualification;

use Validator;
use Auth;

class QualificationController extends Controller
{

	// Global Variables
		private $route_path = '/setting#tabs-3';
	// End Global Variables
    

    /* Start: Store Functionality*/
        public function storePersonalEducation(Request $request)
        {
        	// Initialization
            	$data = $request->input();
            // End Initialization

        	$validator = $this->validateStorePersonalQualification($request->all());


        	// Ajax Case
            if ($validator->fails()) {
                return response()->json(['msg' => "Fill Mandatory Fields",'Error'=> $validator->errors()]);
            }

            $store_personal_qualification = self::storePersonalQualificationData($data);


            if ($store_personal_qualification->id) {
            	return response()->json(['msg' => "Success"]);
            }

        }

        public function storePersonalQualificationData($data)
        {
            return Qualification::create([
                'user_id' => Auth::user()->id,
                'professional_certificate' => $data['country_id'],
                'conferring_organization' => $data['university_id'],
                'summary' => $data['degree'],
                'start_year' => $data['start_year'],
            ]);
        }

        /* Start: Validation Functions */
            public function validateStorePersonalEducation(array $data)
            {
                return Validator::make($data, [
	                'qualification_id'  => 'required|exists:qualifications,id',
		            'professional_certificate'  => 'required|string|max:255',
		            'conferring_organization'  => 'required|string|max:355',
		            'summary'  => 'required|string|max:1000',
		            'start_year'  => 'required|string',
                ]);
            }
        /* End: Validation Functions */
    /* End: Store Functionality*/


    /* Start: Update Functionality */
	    public function updatePersonalQualification(Request $request)
	    {

	        // Initialization
	        	$data = $request->input();
	        // End Initialization


	    	$validator = $this->validatePersonalQualification($request->all());


	        // Non Ajax Case
	        if ($validator->fails()) {
	            return redirect($this->route_path)
	            ->withErrors($validator)
	            ->withInput();
	        }

	        $update_personal_education = self::updatePersonalQualificationData($data);


	        if ($update_personal_education) {
	        	return redirect($this->route_path)->with('success', 'Qualification Has Been Successfully Updated.');
	        }
	        else {
	        	return redirect($this->route_path)->with('error', 'Something Wrong! Data Not Updated.');
	        }

	    }
    
    	// Personal Education Skills Validation Function
	    public function validatePersonalQualification(array $data)
	    {
	        return Validator::make($data, [
	            'qualification_id'  => 'required|exists:qualifications,id',
	            'professional_certificate'  => 'required|string|max:255',
	            'conferring_organization'  => 'required|string|max:355',
	            'summary'  => 'required|string|max:1000',
	            'start_year'  => 'required|string',
	        ]);
	    }
	
		// Personal Qualification Update Function
		public function updatePersonalQualificationData($data)
	    {
	    	return Qualification::where('id','=',$data['qualification_id'])->update([
	    		'user_id' => Auth::user()->id,
	    		'professional_certificate' => $data['professional_certificate'],
	    		'conferring_organization' => $data['conferring_organization'],
	    		'summary' => $data['summary'],
	    		'start_year' => $data['start_year'],
	    	]);
	    }
	/* End: Update Functionality*/

	/* Start: Delete Functionality*/
        public function deletePersonalQualification($id)
        {
        	$user_id = Auth::user()->id;

            $delete_user_qualification = Qualification::find($id)->delete();

            if ($delete_user_qualification) {
                return redirect($this->route_path)->with('success', 'Qualification Has Been Successfully Deleted.');
            } 
            else {
                return redirect($this->route_path)->with('error', 'Something Wrong! Data Not Deleted.');
            }
        }
    /* End: Delete Functionality*/
	
}
