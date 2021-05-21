<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSkill extends Model
{
    use HasFactory;

    protected $fillable = [
   		'project_id',
		'skill_id',
    ];

    // Store Project Skills
    public function storeProjectSkills($project_id, $skill)
    {
    	// Intialization
            $project_skill = new ProjectSkill;
        // End Intialization

        $skill_array = explode(',', $skill);

        foreach ($skill_array as $skill_id) {
            if ($skill_id) {
            	$project_skill = $project_skill->create([
                    'project_id' => $project_id,
                    'skill_id' => $skill_id,
                ]);
            }
        }
    }


    public function skillName()
    {
        return $this->belongsTo(Skill::class,'skill_id');
    }
}
