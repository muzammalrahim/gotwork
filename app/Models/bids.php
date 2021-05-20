<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;


use Auth;
use DB;

class bids extends Model 
{
    use HasFactory, LogsActivity;

    /* Start: Logging */
        protected static $logName = 'bid';

        protected static $logAttributes = ['proposal', 'bid_amount', 'project_delivery', 'status', 'awarded_at'];

        //only the `created` and `updated` events will get logged automatically
        protected static $recordEvents = ['created','updated'];

        // protected static $ignoreChangedAttributes = ['password','updated_at'];

        // To log changes only
        protected static $logOnlyDirty = true;

        public function getDescriptionForEvent(string $eventName): string
        {
            return "Bid {$eventName}";
        }
    /* End: Logging */

    
    public function storeBidData($data)
    {
    	
        $bid = new bids;
        $mile_stone = new Milestone;

        $bid->user_id =  Auth::user()->id;
        
        $bid->project_id =  $data['project_id'];
        
        $bid->project_currency_symbol =  $data['project_currency_symbol'];
        
        $bid->bid_amount =  $data['bid_amount'];
        
        $bid->project_delivery =  $data['project_delivery'];
        
        $bid->proposal =  $data['proposal'];

        $bid->save();
        if ($bid->id) {
        	foreach ($data['mile_stone'] as $mile_stone_data) {
                $mile_stone = $mile_stone->storeMilestonesData($bid->id, $mile_stone_data);
            }
        }

        return with($bid);
    }


    public function updateBidData($data)
    {
    
        $bid = bids::where('id','=', $data['bid_id'])->first();
        //$bid->where('bi')
        
        $bid->bid_amount =  $data['bid_amount'];
        
        $bid->project_delivery =  $data['project_delivery'];
        
        $bid->proposal =  $data['proposal'];

        $bid->update();


        if ($bid->id) {
            
            foreach ($data['mile_stone'] as $mile_stone_data) {
                if (isset($mile_stone_data)) {
                    // $mile_stone = $mile_stone->updateMilestonesData($bid->id, $mile_stone_data);
                    $milestone = new Milestone;
                    $milestone = $milestone->updateMilestonesData($bid->id, $mile_stone_data);
                }
                
            }
        }

        return with($bid);
    }
    






    public function milestones()
    {
        return $this->hasMany(Milestone::class,'bid_id');
    }
    
}
