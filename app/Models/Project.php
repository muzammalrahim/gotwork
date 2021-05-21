<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use Auth;

class Project extends Model
{
    use HasFactory;

    

    /* Start: Fetch Data Fuctions */

        public function getProjectDetailsBySlug($slug) {
            return Project::where('slug', '=' , $slug)->first();
        }
    /* End: Fetch Data Fuctions */


    // Store Posted Project
    public function storePostedProject($data)
    {
        $project = new Project;
        $project_skill = new ProjectSkill; 
        $project_listing_types = new ProjectListingType; 

        $project->user_id = Auth::user()->id;
        $project->title = $data['title'];
        $project->slug = $data['slug'];
        $project->description = $data['description'];
        $project->project_type_id = $data['project_type'];
        $project->category_id = $data['category'];
        $project->min_amount = $data['min_amount'];
        $project->max_amount = $data['max_amount'];
        $project->currency_id = $data['currency'];
        $project->expires_at = Carbon::now()->addDays(20);
        $project->status = 'Active';

        $project->save();

        if ($project->id) {
            if ( isset($data['skill']) ) {
                $project_skill = $project_skill->storeProjectSkills($project->id, $data['skill']);
            }
            
            $project_listing_types = $project_listing_types->storeProjectListingType($project->id, $listing_type='5');
        }

        return with($project);

    }




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
