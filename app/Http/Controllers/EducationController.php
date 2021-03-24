<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

use Validator;
use Auth;
use Response;

class EducationController extends Controller
{
	// Global Variables
		private $route_path_setting_tab_4 = '/setting#tabs-4';
	// End Global Variables
	

    /* Start: Store Functionality*/
        public function storePersonalEducation(Request $request)
        {
        	// Initialization
            	$data = $request->input();
            // End Initialization

        	$validator = $this->validateStorePersonalEducation($request->all());


        	// Ajax Case
            if ($validator->fails()) {
                return response()->json(['msg' => "Fill Mandatory Fields",'Error'=> $validator->errors()]);
            }

            $store_personal_education = self::storePersonalEducationData($data);


            if ($store_personal_education->id) {
            	return response()->json(['msg' => "Success"]);
            }

        }

        public function storePersonalEducationData($data)
        {
            return Education::create([
                'user_id' => Auth::user()->id,
                'country_id' => $data['country_id'],
                'university_id' => $data['university_id'],
                'degree' => $data['degree'],
                'start_year' => $data['start_year'],
                'end_year' => $data['end_year'],
            ]);
        }

        /* Start: Validation Functions */
            public function validateStorePersonalEducation(array $data)
            {
                return Validator::make($data, [
                    'country_id'  => 'required',
                    'university_id'  => 'required',
                    'degree'  => 'required|string|max:255',
                    'start_year'  => 'required|string',
                    'end_year'  => 'required|string',
                ]);
            }
        /* End: Validation Functions */
    /* End: Store Functionality*/

    /* Start: Functionality Update */
        public function updatePersonalEducation(Request $request)
        {
            // Initialization
            	$data = $request->input();
            // End Initialization


        	$validator = $this->validatePersonalEducation($request->all());


            // Non Ajax Case
            if ($validator->fails()) {
                return redirect($this->route_path_setting_tab_4)
                ->withErrors($validator)
                ->withInput();
            }

            $update_personal_education = self::updatePersonalEducationData($data);


            if ($update_personal_education) {
            	return redirect($this->route_path_setting_tab_4)->with('success', 'Education Has Been Successfully Updated.');
            }
            else {
            	return redirect($this->route_path_setting_tab_4)->with('error', 'Something Wrong! Data Not Updated.');
            }

        }

        public function updatePersonalEducationData($data)
        {
            if (!$data['country_id']) {
                $data['country_id'] = $data['selected_country_id'];
            }
            
            if (!array_key_exists('university_id', $data)) {
                $data['university_id'] = $data['selected_university_id'];
            }

            return Education::where('id','=',$data['education_id'])->update([
                'user_id' => Auth::user()->id,
                'country_id' => $data['country_id'],
                'university_id' => $data['university_id'],
                'degree' => $data['degree'],
                'start_year' => $data['start_year'],
                'end_year' => $data['end_year'],
            ]);
        }
        
        // Personal Education Skills Validation Function
        public function validatePersonalEducation(array $data)
        {

            if (!$data['country_id']) {
                $data['country_id'] = $data['selected_country_id'];
            }
            
            if (!array_key_exists('university_id', $data)) {
                $data['university_id'] = $data['selected_university_id'];
            }


            return Validator::make($data, [
                'country_id'  => 'required',
                'university_id'  => 'required',
                'degree'  => 'required|string|max:255',
                'start_year'  => 'required|string',
                'end_year'  => 'required|string',
            ]);
        }
    /* End: Functionality Update */

    /* Start: Functionality Delete */
        public function deletePersonalEducation($id)
        {
        	$user_id = Auth::user()->id;

            $delete_user_education = Education::find($id)->delete();

            if ($delete_user_education) {
                return redirect($this->route_path_setting_tab_4)->with('success', 'Education Has Been Successfully Deleted.');
            } 
            else {
                return redirect($this->route_path_setting_tab_4)->with('error', 'Something Wrong! Data Not Deleted.');
            }
        }
    /* End: Functionality Delete */
}
