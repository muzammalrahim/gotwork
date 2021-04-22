<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;
use DB;

class bids extends Model
{
    use HasFactory;


    
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
    
}
