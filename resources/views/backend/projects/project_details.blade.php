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

                            <form id="bid_form" class="pt-5" action="{{ route('place_bid') }}" name="placebid" class="placebid" method="POST">
                                @csrf
                                
                                {{-- Start: Bid Amount Details --}}
                                <div class="font-bold text-md relative flex w-full flex-wrap items-stretch mb-3">

                                    {{-- Start: Form Hidden Fields --}}
                                    <input type="hidden" class="project_id" name="project_id" value="{{ $project_details->id }}">
                                    <input type="hidden" name="project_currency_symbol" value="{{ $project_details->currency->symbol }}">
                                    {{-- End: Form Hidden Fields --}}

                                    <div class="grid grid-cols-2 gap-4"> 
                                        <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                                            <p class="font-bold text-sm">Bid Amount</p>

                                            <span class="px-2 bg-gray-200 z-10 leading-snug font-normal absolute w-8 py-3 m-0.5" name="currency_symbol">
                                                {{ $project_details->currency->symbol }}
                                            </span>
                                            <input type="text" class="bid_amount px-3 py-3 relative pl-10" value="{{ $default_bid_amount }}" name="bid_amount" />

                                            <span class="z-10 leading-snug font-normal absolute text-center absolute bg-gray-200 rounded text-base items-center justify-center w-16 py-3 p-4 mt-0.5" name="currency_symbol" style="margin-left: -4.1rem;">
                                                {{ $project_details->currency->code }}
                                            </span>
                                        </div>

                                        <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                                            <p class="font-bold text-sm">This project will be delivered in</p>
                                            <span class="px-2 bg-gray-200 z-10 leading-snug font-normal absolute w-14 py-3 m-0.5" name="currency_symbol">
                                                Days
                                            </span>
                                           
                                            <input type="number" name="project_delivery" class="px-3 py-3 relative  pl-16" value="7"/>
                                        </div>
                                      
                                    </div>
                                </div>
                                {{-- End: Bid Amount Details --}}


                                {{-- Start: Project Milestones --}}
                                <p class="font-bold pt-5 ">Suggest milestone payments</p>
                                <p class="md:text-base lg:text-base text-xs ">Help the client by providing a breakdown of tasks to be done in this project.</p>
                                <div class="relative flex w-full flex-wrap items-stretch mb-3 mt-5">
                                    <div class="w-full grid grid-cols-2 gap-4"> 
                                        <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                                            <input type="text" class="w-full py-3 relative" name="mile_stone[1][task]" placeholder="Describe your task" />
                                            <p class="error_milestone_desc text-red-500 hidden">Milestone description is required</p>
                                        </div>
                                      
                                        <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                                            <span class="px-2 bg-gray-200 z-10 leading-snug font-normal absolute w-8 py-3 m-0.5">
                                                {{ $project_details->currency->symbol }}
                                            </span>
                                            <input type="number" class="mileStonePrice px-3 py-3 relative pl-16" name="mile_stone[1][amount]" onchange="addmileStone()" value="{{$default_bid_amount}}"/>
                                            <p class="error_milestone_amount text-red-500 hidden">Milestone amount is required</p>
                                        </div>
                                      
                                    </div>
                                </div>

                                <div class="added_milestones">

                                </div>
                                
                                {{-- 
                                <div class="buttonDiv">
                                    <a class="adddMileStone_button bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white mt-9 m-auto cursor-pointer hidden">Add milestone</a>
                                </div> 
                                --}}

                                <div class="buttonDiv">
                                    <a class="adddMileStone_button md:w-72 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 md:px-12 text-xs md:text-base lg:text-base mb-4 rounded cursor-pointer disabled">Add another milestone</a>
                                </div> 

                                <div class="error_in_amount bg-red-200 py-4 px-8 border border-2 border-red-600 hidden">
                                    <p class = "errorDiv text-red text-sm"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        Total suggested milestone payment amount must not exceed the bid amount 
                                        Please ensure it is between <span> ${{ $project_details->min_amount }} - ${{ $project_details->max_amount }} </span>
                                    </p>
                                </div>
                                {{-- End: Project Milestones --}}


                                {{-- Start: Proposal --}}

                                <p class="font-bold pt-5 text-sm">Describe your proposal</p>

                                <div class="relative flex w-full flex-wrap items-stretch">
                                    <textarea class="resize-y border rounded-md w-full" rows="8" name="proposal"></textarea>
                                    <p class="error_proposal text-red-500 hidden">Proposal is required</p>

                                    @error('proposal')
                                        <p class="text-red-500" >{{$message}}</p>
                                    @enderror
                                </div>

                                {{-- End: Proposal --}}
                                @if($remaining_bids < 1)
                                    <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white mt-9 m-auto cursor-pointer place_bid_button disabled">Place Bid</button>
                                    <span class="text-red-500">Your bids limit is ended, Please upgrade membership!</span>
                                @else
                                    @if($bid_done)
                                        <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white mt-9 m-auto cursor-pointer place_bid_button disabled">Place Bid</button>
                                        <span class="text-green-600">You have already placed bid on this project.</span>
                                    @else
                                        <button id="btn_place_bid" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white mt-9 m-auto cursor-pointer place_bid_button">Place Bid</button>
                                    @endif
                                @endif

                            </form>
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




