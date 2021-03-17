<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserReviews extends Component
{
	public $userReviews = 'test';
    
    public function render()
    {
        return view('livewire.user-reviews', ['userReviews' => $userReviews, ]);
    }
}
