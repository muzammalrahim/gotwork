<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Session;
use Auth;

class Review extends Model
{
    use HasFactory;




    // Start: Store Review
        public function storeReview($data)
        {
            // Initialization
                $review = new Review;
            // End Initialization

            $review->user_id = Session::get('user_id');
            $review->project_id = $data['project_id'];
            $review->comment = $data['comment'];
            $review->rating = $data['rating'];

            $review->save();

            return $review;
        }
    // End: Store Review




    // BelongsTo Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
