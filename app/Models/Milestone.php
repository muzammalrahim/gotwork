<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Milestone extends Model
{
    use HasFactory;

    protected $fillable = [
    	'bid_id', 'task', 'amount'
    ];


    public function storeMilestonesData($bid_id, $data)
    {

        return Milestone::create([
        	'bid_id' => $bid_id,
        	'task'   => $data['task'],
        	'amount' => $data['amount'],
        ]);
    }


    public function updateMilestonesData($bid_id, $mile_stone_data)
    {
        $milestone = new Milestone;

        if (isset($mile_stone_data['id'])) {
            $milestone = $milestone->where('id','=',$mile_stone_data['id'])->first();

            $milestone->task = $mile_stone_data['task'];
            $milestone->amount = $mile_stone_data['amount'];

            $milestone->update();
        }
        else { // Runs if new milestone added on update bid
            $milestone->bid_id = $bid_id;
            $milestone->task = $mile_stone_data['task'];
            $milestone->amount = $mile_stone_data['amount'];

            $milestone->save();
        }
    }


    // Update Bid Milestone Status
    public function updateBidMilestoneStatus($data)
    {
        $milestone = new Milestone;

        foreach ($data as $milestone_data) {

            $milestone = $milestone->where('id','=', $milestone_data['id'])->first();
            
            $milestone->milestone_status = $milestone_data['status'];

            $milestone->update();
        }

        return $milestone;
    }

}
