<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;

use Validator;
use Session;
use Auth;


class ReviewController extends Controller
{
	// Go to review page
    public function reviewProjectPage($project_id)
    {
    	// Initialization
            $data = [];
        // End Initialization

        $data['project_id'] = $project_id;    

    	return view('backend.reviews.review_project', $data);
    }

    // Store Review
    public function storeReview(Request $request)
    {
    	
    	// Initialization
            $data = $request->input();
            $review = new Review;
        // End Initialization

        $validator = $this->validateStoreReview($request->all());

        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        $review_exists = $review->where('user_id', '=', Session::get('user_id'))->where('project_id', '=', $data['project_id'])->get();

        if( $review_exists->count() < 1 ) {
        	$review = $review->storeReview($data);

        	if ( $review->id ) {
        		return redirect()->back()->with('success', 'Review has been placed successfully.');
        	}
        	else {
	            return redirect()->back()->with('error', 'Something Wrong! Review not placed.');
	        }
        } 
        else {
        	return redirect()->back()->with('error', 'You have already placed review on this project.');
        }    
    }








    /* Start: Validations */
        public function validateStoreReview(array $data)
        {
            return Validator::make($data, [
                'rating' => 'required',
                'comment'  => 'required|string|max:1000',
            ]);
        }
    /* End: Validations */

}
