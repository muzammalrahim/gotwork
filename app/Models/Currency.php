<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;


    /* Start: Fetch Data Fuctions */
		public function getCurrenciesList()
		{
			return Currency::orderBy('name','ASC')->get();
		}
	/* End: Fetch Data Fuctions */
}
