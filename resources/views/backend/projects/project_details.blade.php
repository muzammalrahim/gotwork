<?php 
$default_bid_amount = null;
$average_bid_amount = null;
$bid_done = false;

$check_bid_exists = App\Models\bids::where('user_id','=', Auth::user()->id)->where('project_id','=', $project_details->id)->count();

if ($check_bid_exists > 0) {
    $bid_done = true;
}

$default_bid_amount = (int) (round( ($project_details->max_amount)/3 + ($project_details->max_amount)/2 )); 


?>
<style>
    .disabled {
        pointer-events: none;
        --tw-bg-opacity: 1;
        background-color: rgba(229, 231, 235, var(--tw-bg-opacity)) !important;
        color: black !important;
    }
</style>
<x-app-layout>
    <x-slot name="title">
        Got Work | Project Detail
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('projectDetail') }}
        </h2>
    </x-slot>


    <div class="grid grid-cols-3 gap-10 mx-auto sm:px-6 lg:px-24 mb-3 lg:mt-8 mt-8">
        
        <div class="lg:col-span-2 md:col-span-3 sm:col-span-3 col-span-3 overflow-hidden shadow-sm lg:h-auto bg-white upgrade shadow-xl">
            
            <div class="recentProjects h-auto bg-gray-200">

                {{-- Recent Pojects  --}}

                @include('layouts.alerts')

                <div class="browseProjectDiv bg-white h-80 border border-gray-200">
                        {{-- <h3> hi how are you</h3> --}}
                    <div class="recent text-xl p-8 border-b border-gray-200">
                        <p class="font-bold">Project Details 
                            <span class="text-lg float-right"> 
                                {{($project_details->projectType->name == 'Hourly')?'~':''}} 
                                <span>$</span>
                                <span> {{ $project_details->min_amount }} - {{ $project_details->max_amount }} </span>
                                <span>USD <span class="text-base">{{ $project_details->projectType->name }}</span> </span>
                            </span>
                        </p>

                        <p class="text-lg float-right">
                    
                            <i class="fas fa-clock text-base" aria-hidden="true"></i>
                            <span class="text-xs font-bold"> 
                                <span class="text-black-500"> 
                                    <?php 
                                        $expires_at = $project_details->expires_at ;
                                        $hours_expires_at = Carbon\Carbon::parse($expires_at)->format('H');
                                        $datework = \Carbon\Carbon::createFromDate($expires_at);
                                        $now = \Carbon\Carbon::now();
                                        $today_hours = Carbon\Carbon::parse($now)->format('H');
                                        $expires_days_remaining = $datework->diffInDays($now);
                                        $expires_hours_remaining = abs( (int) $hours_expires_at - $today_hours);
                                    ?> 

                                    BIDDING ENDS IN
                                    {{ ($expires_days_remaining == 1)?'1 DAY': $expires_days_remaining.' DAYS'}}, {{ $expires_hours_remaining }} HOURS
                                </span> 
                            </span>
                        </p>
                    </div>

                    <div class="p-8">
                        
                        
                        <p class="md:text-base lg:text-base text-xs "> {{ $project_details->description }} </p>


                        <p class="font-bold pt-5">Skills Required</p>
                        <p class="md:text-sm lg:text-sm text-xs mt-5 mb-2">  
                            @foreach( $project_details->projectSkills as $skill )
                                <span class=" bg-gray-300 hover:bg-gray-300 text-black font-bold py-1 px-2 text-xs mr-4">{{$skill->skillName->name}} 
                                </span> 
                            @endforeach
                        </p>
                          
                        <p class="text-sm float-right">Project ID: {{ $project_details->id }} </p>
                    </div>
                </div>

                {{-- News Feed  --}}

                <div class="bg-white mt-8 h-auto border border-gray-200">
                        {{-- <h3> hi how are you</h3> --}}
                    <div class="newsFeed text-xl pl-8 border-b border-gray-200 p-4">
                        <p class="font-bold">Place a Bid on this Project</p>
                    </div>
                    <div>

                        <div class="p-8">
                            <p class="md:text-base lg:text-base text-xs ">You will be able to edit your bid until the project is awarded to someone. </p>
                            <p class="font-bold pt-5">Bid Details</p>

                            {{-- Form place bid --}}

                            @if(!$edit_bid)
                                @include('backend.projects.forms.store_bid')
                            @else
                                @include('backend.projects.forms.update_bid')
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>


        <div class="lg:col-span-1 sm:col-span-3 md:col-span-3 col-span-3 overflow-hidden lg:h-auto">

            {{-- Start: Card Employer Details --}}
                @include('layouts.cards.about_employer')
            {{-- End: Card Employer Details --}}
            
            {{-- Start: Card User Bids --}}    
                @include('layouts.cards.user_bids')
            {{-- End: Card User Bids --}}  



        </div>

    </div>


    <div class="bg-gray-700 h-16"></div>

</x-app-layout>


@include('scripts.project_detail')




