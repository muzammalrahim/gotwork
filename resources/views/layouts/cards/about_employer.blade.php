<?php 
	$country_id = null;
	$completed_projects = null;
    $profile_completed=false;

	if ($project_details->user->country_id) {
		$country_id = $project_details->user->country_id;
	}

	$country_details = DB::table('countries')->where('id','=',$country_id)->first();

	$completed_projects = App\Models\Project::where('user_id','=',$project_details->id)->where('status','=','Completed')->count();

    
    if (getProfileCompletedPercentage() == "100%") {
        $profile_completed=true;
    }
    


?>

<div class="yourBids bg-white border border-gray-200">
    <div class="bidDiv p-4 border-b-2 border-gray-200">
        <span class="bids tex-xl font-bold"> About the Employer </span>
    </div>

    <p class="text-base p-4">
    	<i class="fa fa-map-marker text-black-500"></i>
    	<span class="ml-1">{{ $country_details->name }}</span>
    	<span class="px-2 py-2 flex-1 flag-icon flag-icon-{{ strtolower($country_details->iso2) }}"></span>
    </p>

    <p class="text-base p-3">
    	<i class="fas fa-desktop text-black-500"></i>
    	<span>{{ $completed_projects }} {{ ($completed_projects==1)?'project':'projects' }} completed</span>
    </p>

    <p class="text-base p-3">
    	<i class="fas fa-user text-black-500"></i>
    	<span> completed</span>
    </p>

    <p class="text-base p-3">
    	<i class="fas fa-clock-o text-black-500"></i>
    	<span> Member since {{ $project_details->user->created_at->format('F j, Y') }} </span>
    </p>


    <div class="p-4">
        <span class="bids tex-xl font-bold"> Employer Verification </span>
    </div>

    <p class="text-base p-3">
    	<i class="fas fa-id-card text-black-500"></i>
    	<span> Identity verified</span>
    </p>

    <p class="text-base p-3">
    	<i class="fas fa-money-check-alt text-black-500"></i>
    	<span> Payment method verified</span>
    </p>

    <p class="text-base p-3">
    	<i class="far fa-credit-card text-black-500"></i>
    	<span> Deposit made</span>
    </p>

    <p class="text-base p-3">
    	<i class="fas fa-envelope {{($project_details->user->email_verified_at)?'text-green-500':'text-black-500'}}"></i>
    	<span> Email address verified</span>
    </p>

    <p class="text-base p-3">
    	<i class="fas fa-user {{($profile_completed)?'text-green-500':'text-black-500'}}"></i>
    	<span> Profile completed</span>
    </p>

    <p class="text-base p-3">
    	<i class="fas fa-phone-alt {{($project_details->user->is_phone_number_verified)?'text-green-500':'text-black-500'}}"></i>
    	<span> Phone number verified</span>
    </p>
    
</div>