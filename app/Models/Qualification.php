<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
    	'professional_certificate',
    	'conferring_organization',
		'summary',
		'start_year',
    ];
}
