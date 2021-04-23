@foreach($news_feeds as $news_feed)
<?php 
// Initialization
    $bid_feed = false;
    $project_user_id = null;
    $causer_data = null;
    $project_data = null;
// End Initialization

// Check Condition
    if ($news_feed->log_name == "bid") {
        $bid_feed = true;
    }
// End Check Condition

// Queries

    // Causer Data
        if ($news_feed->causer_id) {
            $causer_data = App\Models\User::where('id','=',$news_feed->causer_id)->first();
        }
    // End Causer Data

    // Feed For User Who Posted The Project
        if ($bid_feed) {
            $bid_data = App\Models\bids::where('id','=',$news_feed->subject_id)->first();

            if ($bid_data && $bid_data->project_id) {
                $project_data = App\Models\Project::where('id','=',$bid_data->project_id)->first();
                if ($project_data && $project_data->user_id) {
                    $project_user_id = $project_data->user_id;
                }
            }
        }
    // End Feed For User Who Posted The Project
// End Queries

// Assignments

// End Assignments

?>


@if($bid_feed && ( (Auth::user()->id == $project_user_id) || Auth::user()->id == $news_feed->causer_id ))
    @if($project_data && $causer_data)
        <div class="browseProject">
            <div class="w-full mt-6 flex  p-4">
                <div class="lg:w-1/12 md:w-1/12 sm:hidden hidden md:block"> 

                    <?php 
                        $image_class = "border-none";
                    ?>

                    @if($causer_data->profile_photo_url && $causer_data->profile_photo)
                      <img
                        alt="..."
                        src="{{UPLOADS}}{{$causer_data->profile_photo}}"
                        class="{{$image_class}}"
                      />
                    @elseif($causer_data->profile_photo_url)
                      <img
                        alt="..."
                        src="{{$causer_data->profile_photo_url}}"
                        class="{{$image_class}}"
                      />
                    @elseif($causer_data->profile_photo)
                      <img
                        alt="..."
                        src="{{UPLOADS}}{{$causer_data->profile_photo}}"
                        class="{{$image_class}}"
                      />
                    @else
                      <img
                        alt="..."
                        src="{{ASSETS_BACKEND}}images/default-profile.png"
                        class="{{$image_class}}"
                      />
                    @endif
                </div> 

                <div class="lg:w-11/12 md:w-12/12 sm:w-12/12 w-12/12"> 
                    <p class="text-sm ml-4 w-5/6">
                        <a class="text-blue-500"> {{(Auth::user()->id == $news_feed->causer_id)? 'You ': $causer_data->name}} </a> have palced bid on <a class="text-blue-500"> {{$project_data->title}} </a>
                    </p>

                    <p class="text-sm ml-4 w-5/6">
                        {{$news_feed->created_at->diffForHumans()}}
                    </p>

                    {{-- Email Address --}}
                    <div class="bg-gray-200 lg:px-8 md:px-4 sm:px-2 px-2 py-4 mt-2 h-auto flex"> 
                        <div class="lg:w-8/12 md:w-8/12 sm:w-9/12 w-9/12"> 
                            <p class="text-sm font-bold">Amount:</p>
                            <p class="text-sm"> {{$bid_data->project_currency_symbol}}{{$bid_data->bid_amount}} </p>
                        </div>
                        <div class="lg:w-8/12 md:w-8/12 sm:w-9/12 w-9/12"> 
                            <p class="text-sm font-bold">Description:</p>
                            <p class="text-sm"> {{$bid_data->proposal}} </p>
                        </div>

                        <div class="w-3/12">
                            @if(Auth::user()->id == $news_feed->causer_id)
                                <a href="{{ route('myProjects') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 text-xs float-right">Bids</a>
                            @else
                                <a href="{{ route('client.projects') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 text-xs float-right">Bids</a>
                            @endif
                        </div>
                    </div>

                </div>         
            </div>

        </div>
    @endif
@endif

@endforeach
<div class="browseProject">
    <div class="w-full mt-6 flex  p-4">
        <div class="lg:w-1/12 md:w-1/12 sm:hidden hidden md:block"> 
            <img src="{{ asset('images/cropped-gotWorkLogoGreyOrange-1.png') }}">
        </div> 

        <div class="lg:w-11/12 md:w-12/12 sm:w-12/12 w-12/12"> 
            <p class="text-sm ml-4 w-5/6">
                You are almost ready to start earning money as a freelancer, simply complete the following steps:
                over 4 years ago
            </p>

            {{-- Email Address --}}
            <div class="bg-gray-200 lg:px-8 md:px-4 sm:px-2 px-2 py-4 mt-2 h-auto flex">
                <div class="lg:w-1/12 md:w-1/12 sm:hidden hidden"> 
                    <i class="fa fa-envelope"></i>
                </div> 
                <div class="lg:w-8/12 md:w-8/12 sm:w-9/12 w-9/12"> 
                    <p class="text-base font-bold">Email Address</p>
                    <p class="text-sm"> Verify your email address to make your profile more secure </p>
                </div>
                <div class="w-3/12">
                    @if (isset($user->email_verified_at))
                    <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded opacity-50 cursor-not-allowed text-sm float-right">Already Verfied</button>
                    @else
                    <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white block mt-5 text-sm">Verify Email</button>
                    @endif
                </div>    
            </div>

            {{-- Update your profile --}}
            <div class="bg-gray-200 lg:px-8 md:px-4 sm:px-2 px-2 py-4 mt-2 h-auto flex">
                <div class="lg:w-1/12 md:w-1/12 sm:hidden hidden"> 
                    <i class="fa fa-user"></i>
                </div> 
                <div class="lg:w-8/12 md:w-8/12 sm:w-9/12 w-9/12"> 
                    <p class="text-base font-bold">Update your profile</p>
                    <p class="text-sm">A complete profile increases your chance of getting hired </p>
                </div>
                <div class="w-3/12">
                    <a href="{{ route('setting') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Edit Profile</a>
                </div>    
            </div>

            {{-- Find Projects --}}
            <div class="bg-gray-200 lg:px-8 md:px-4 sm:px-2 px-2 py-4 mt-2 h-auto flex">
                <div class="lg:w-1/12 md:w-1/12 sm:hidden hidden"> 
                    <i class="fa fa-tv"></i>
                </div> 
                <div class="lg:w-8/12 md:w-8/12 sm:w-9/12 w-9/12"> 
                    <p class="text-base font-bold">Find projects</p>
                    <p class="text-sm">Browse through projects and place another bid </p>
                </div>
                <div class="w-3/12">
                    <a href="{{ route('projects') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Browse Projects</a>
                </div>    
            </div>


        </div>         
    </div>

</div>