<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingType extends Model
{
    use HasFactory;


    /* Start: Fetch Data Fuctions */
		public function getListingTypesList()
		{
			return ListingType::orderBy('title','ASC')->get();
	}
	/* End: Fetch Data Fuctions */
}
