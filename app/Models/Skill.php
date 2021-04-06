<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    



	/* Start: Fetch Data Fuctions */
		public function getSkillsList()
		{
			return Skill::orderBy('name','ASC')->get();
		}
	/* End: Fetch Data Fuctions */



    /* Start: Foreign Key Relationships */
	    public function users()
	    {
	        return $this->belongsToMany(User::class);
	    }
	/* End: Foreign Key Relationships */
    
}
