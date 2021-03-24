<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country_id',
'university_id',
'degree',
'start_year',
'end_year',
    ];



    public function country()
    {
        return $this->belongsToMany(Country::class);
    }
}
