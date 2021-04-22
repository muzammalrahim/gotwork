<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;
use DB;
use Carbon\Carbon;

class UserMembership extends Model
{
    use HasFactory;


    // Fetch UserMembership Details
    public function getUserMembershipDetails()
    {
    	return UserMembership::where('user_id', '=', Auth::user()->id)->first();
    }

    // Increment Bids Used
    public function incrementBidUsed()
    {
    	return UserMembership::where('user_id','=', Auth::user()->id)
    			->update([
    				'bids_used' => DB::raw('bids_used + 1'),
    				'last_bid_placed' => Carbon::now()
    			]);
    }
}
