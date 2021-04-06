<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;


    
    /* Start: Fetch Data Fuctions */
		public function getProjectTypesList()
		{
			return ProjectType::orderBy('name','ASC')->get();
		}
	/* End: Fetch Data Fuctions */

    
}
