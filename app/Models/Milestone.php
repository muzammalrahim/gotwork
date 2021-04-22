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
}
