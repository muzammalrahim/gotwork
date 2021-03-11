<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;




    /* Start: Foreign Key Relationships */
    public function milestones()
    {
        return $this->hasMany(Milestone::class,'project_id')->orderBy('id', 'ASC');
    }
    /* End: Foreign Key Relationships */
}
