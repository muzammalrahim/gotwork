<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectListingType extends Model
{
    use HasFactory;


    public function listingType()
    {
        return $this->belongsTo(ListingType::class,'listing_type_id');
    }
}
