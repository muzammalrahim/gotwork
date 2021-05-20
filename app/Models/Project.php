<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    

    /* Start: Fetch Data Fuctions */

        public function getProjectDetailsBySlug($slug) {
            return Project::where('slug', '=' , $slug)->first();
        }
    /* End: Fetch Data Fuctions */



    /* Start: Foreign Key Relationships */
        public function milestones()
        {
            return $this->hasMany(Milestone::class,'project_id')->orderBy('id', 'ASC');
        }

        public function projectSkills()
        {
            return $this->hasMany(ProjectSkill::class,'project_id');
        }

        public function projectListingTypes()
        {
            return $this->hasMany(ProjectListingType::class,'project_id');
        }

        

        /*public function projectTypeAsc()
        {
            return $this->hasOne(ProjectType::class,'project_id')->orderBy('min_amount', 'ASC');
        }*/

        public function bids()
        {
            return $this->hasMany(bids::class,'project_id');
        }

        public function projectTags()
        {
            return $this->hasMany(ProjectTag::class,'project_id');
        }


        // belongsTo
        public function projectType()
        {
            return $this->belongsTo(ProjectType::class,'project_type_id');
        }

        public function currency()
        {
            return $this->belongsTo(Currency::class,'currency_id');
        }

        public function user()
        {
            return $this->belongsTo(User::class,'user_id');
        }
    /* End: Foreign Key Relationships */
}
