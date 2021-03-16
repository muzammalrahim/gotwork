<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;








    /* Start: Foreign Key Relationships */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
	/* End: Foreign Key Relationships */
    
}
