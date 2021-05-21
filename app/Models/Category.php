<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;



    /* Start: Fetch Data Fuctions */
		public function getCategoriesList()
		{
			return Category::orderBy('name','ASC')->get();
		}
	/* End: Fetch Data Fuctions */
}
