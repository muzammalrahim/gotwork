<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Milestone;

class MilestoneController extends Controller
{
    public function updateBidMilestoneStatus(Request $request)
    {
    	// Start: Initialization
        	$milestone = new Milestone;
    	// End: Initialization

        $milestone = $milestone->updateBidMilestoneStatus($request->milestone);

        if ($milestone->id) {
        	return redirect()->back()->with('success', 'Milestone status has been updated successfully.');
        }
        else {
            return redirect()->back()->with('error', 'Something Wrong! Milestone status not updated.');
        }
    }
}
