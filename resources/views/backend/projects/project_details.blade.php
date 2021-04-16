<?php 
$default_bid_amount = null;
$average_bid_amount = null;

$default_bid_amount = (int) (round( ($project_details->max_amount)/3 + ($project_details->max_amount)/2 )); 


?>

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

                            <form class="pt-5" action="{{ route('place_bid') }}" name="placebid" class="placebid" method="POST">
                                @csrf
                                {{-- Start: Bid Amount Details --}}
                                <div class="font-bold text-md relative flex w-full flex-wrap items-stretch mb-3">

                                    <input type="hidden" class="project_id" name="project_id" value="{{ $project_details->id }}">

                                    <div class="grid grid-cols-2 gap-4"> 
                                        <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                                            <p class="font-bold text-sm">Bid Amount</p>

                                            <span class="px-2 bg-gray-200 z-10 leading-snug font-normal absolute w-8 py-3 m-0.5" name="currency_symbol">
                                                {{ $project_details->currency->symbol }}
                                            </span>
                                            <input type="text" class="bid_amount px-3 py-3 relative pl-10" value="" name="bid_amount" />

                                            <span class="z-10 leading-snug font-normal absolute text-center absolute bg-gray-200 rounded text-base items-center justify-center w-16 py-3 p-4 mt-0.5" name="currency_symbol" style="margin-left: -4.1rem;">
                                                {{ $project_details->currency->code }}
                                            </span>
                                        </div>

                                        <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                                            <p class="font-bold text-sm">This project will be delivered in</p>
                                            <span class="px-2 bg-gray-200 z-10 leading-snug font-normal absolute w-14 py-3 m-0.5" name="currency_symbol">
                                                Days
                                            </span>
                                           
                                            <input type="number" name="project_delivery" class="px-3 py-3 relative  pl-16" value="{{$default_bid_amount}}"/>
                                        </div>
                                      
                                    </div>
                                </div>
                                {{-- End: Bid Amount Details --}}

                                {{-- Proposal --}}

                                <p class="font-bold pt-5 text-sm">Describe your proposal</p>

                                <div class="relative flex w-full flex-wrap items-stretch">
                                    <textarea class="resize-y border rounded-md w-full" rows="8" name="proposal"></textarea>
                                </div>

                                {{-- Proposal end --}}

                                <p class="font-bold pt-5 ">Suggest milestone payments</p>
                                <p class="md:text-base lg:text-base text-xs ">Help the client by providing a breakdown of tasks to be done in this project.</p>
                                <div class="relative flex w-full flex-wrap items-stretch mb-3 mt-5">
                                    <div class="w-full grid grid-cols-2 gap-4"> 
                                        <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                                            <input type="text" class="w-full py-3 relative" name="mile_stone[1][task]" placeholder="Describe your task" />
                                        </div>
                                      
                                        <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                                            <span class="px-2 bg-gray-200 z-10 leading-snug font-normal absolute w-8 py-3 m-0.5">
                                                {{ $project_details->currency->symbol }}
                                            </span>
                                            <input type="number" class="mileStonePrice px-3 py-3 relative pl-16" name="mile_stone[1][currency_symbol]" onchange="addmileStone()" value="{{$default_bid_amount}}"/>
                                        </div>
                                      
                                    </div>
                                </div>

                                <div class="added_milestones">
                                    
                                </div>
                                <div class="buttonDiv">
                                    <a class="adddMileStone_button bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white mt-9 m-auto cursor-pointer hidden">Add milestone</a>
                                </div>
                                <div class="error_in_amount bg-red-200 py-4 px-8 border border-2 border-red-600 hidden">
                                    <p class = "errorDiv text-red text-sm"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        Total suggested milestone payment amount must not exceed the bid amount 
                                        Please ensure it is between <span> ${{ $project_details->min_amount }} - ${{ $project_details->max_amount }} </span>
                                    </p>
                                </div>



                                <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white mt-9 m-auto cursor-pointer place_bid_button">Place Bid</button>

                            </form>
                        </div>

                    </div>
                </div>

            </div>



        </div>


        <div class="lg:col-span-1 sm:col-span-3 md:col-span-3 col-span-3 overflow-hidden lg:h-auto">

            <div class="accountInfo bg-white">
                <div class="userInfo h-auto p-4 text-white infoBg">
                    <p class="text-base"> Welcome Back </p>
                    <p class="text-2xl font-bold mt-2"> {{$user->name}} </p>
                </div>

                <div class="setupAccount p-4 h-auto bg-white border-b-2 border-black-200">
                    <div class="rewardYourself bg-blue-200">
                        <p class="text-base p-4 text-white infoBg"> Reward yourself for 14 days with a FREE Plus Membership 
                            <i class="fa fa-arrow-right" style="font-size: 12px;"></i> </p>
                    </div>
                    <p class="text-base mt-4 font-bold"> Set up your account   <span class="text-black-400 float-right"> 60% </span> </p>
                    <div class="relative pt-1">
                      <div class="overflow-hidden h-2 mb-4 text-xs flex  bg-blue-200">
                        <div style="width:30%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
                      </div>
                    </div>

                    <div class="passTheUS bg-gray-200 h-auto flex p-4 text-blue-600">
                        <div class="w-1/6">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="w-4/6">
                            Pass the US English Exam - Level 1
                        </div>
                        <div class="w-1/6 text-black">
                            +20%
                        </div>
                    </div>
                    
                </div>

                <div class="accountBalance p-4">
                       <span class="font-bold"> Account Balance </span> <span class="float-right text-blue-600"> Deposit Fund <i class="fa fa-arrow-right"></i> </span>
                        <p class="m-4"> $0.00 USD </p>
                </div>


            </div>

            <div class="yourBids mt-4 bg-white">
                <div class="bidDiv p-4 border-b-2 border-gray-200">
                    <span class="bids tex-xl font-bold"> Your Bids </span><span class="float-right text-xs"> FREEE MEMBER </span>
                </div>
                <p class="text-base mt-2 p-4"><b> 6 bids</b> left out of 6  </p>

                <div class="bidInsights text-center p-4">
                    <a href="" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 shadow w-full">View Bid Insights</a>
                </div>
            </div>
            {{-- <h2>dashboard page</h2> --}}



        </div>

    </div>


    <div class="bg-gray-700 h-16"></div>

</x-app-layout>


@include('scripts.project_detail')




