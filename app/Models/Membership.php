<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    use HasFactory;


    // Get Membership Details By Type
	public function getMembershipDetailsByType($type)
	{
		return Membership::where('type','=',$type)->first();
	}
}
