<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectListingType extends Model
{
    use HasFactory;

    protected $fillable = [
   		'project_id',
		'listing_type_id',
    ];



    public function listingType()
    {
        return $this->belongsTo(ListingType::class,'listing_type_id');
    }


    // Store Project Skills
    public function storeProjectListingType($project_id, $listing_type)
    {
    	// Intialization
            $project_listing_types = new ProjectListingType; 
        // End Intialization

        if ($listing_type) {
        	$project_listing_types = $project_listing_types->create([
                'project_id' => $project_id,
                'listing_type_id' => $listing_type,
            ]);
        }
    }
}
