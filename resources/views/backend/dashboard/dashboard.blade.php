@php
 $profile_completed_percentage = getProfileCompletedPercentage();
@endphp
<x-app-layout>
    <x-slot name="title">
        Got Work | Projects
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="grid grid-cols-3 gap-10 mx-auto sm:px-6 lg:px-24 mb-3 lg:mt-8 mt-8">
        
        <div class="lg:col-span-2 md:col-span-3 sm:col-span-3 col-span-3 overflow-hidden shadow-sm lg:h-auto bg-white upgrade shadow-xl">
            
            <div class="recentProjects h-auto bg-gray-200">
                <div class="upgradeDiv bg-gray-200 h-52 lg:block md:block hidden">
                    <div class="texts pt-8 pl-8 text-white">
                        <h2  class="text-xl font-bold"> Easter Membership Sale </h2>    
                        <h2 class="text-base w-3/5 mt-3"> Get crackin' and save 20% off annual membership plans while you can! Sale ends in 4
                         days, 14 hours. </h2>
                        <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1  text-white block mt-5">Upgrade Now</button>
                    </div>
                </div>

                {{-- Recent Pojects  --}}

                <div class="browseProjectDiv bg-white mt-8 h-96 border border-gray-200">
                        {{-- <h3> hi how are you</h3> --}}
                    <div class="recent text-xl p-4 border-b border-gray-200">
                        <p class="font-bold">Recent Projects <a href="{{route('myProjects')}}" class="float-right"> <span class="text-blue-600"> View All <i class="fa fa-arrow-right" style="font-size: 12px;"></i> 
                        </span> </a>  </p>
                    </div>

                    <div class="browseProject">
                        <img src="{{ asset('images/no-projects.svg') }}" class="m-auto mt-12">
                        <p class="text-base mt-6 text-center">Start bidding now on projects that meet your skills.</p>
                    <div class="text-center mt-6">
                        <a class="bg-blue-600 hover:bg-blue-700 px-4 py-2 p-12 text-white block mt-5 text-2xl font-bold inline" href="{{ route('projects') }}">Browse Projects</a>                            
                    </div>

                    </div>
                </div>

                {{-- News Feed  --}}

                <div class="newsFeedDiv bg-white mt-8 h-auto border border-gray-200">
                        {{-- <h3> hi how are you</h3> --}}
                    <div class="newsFeed text-xl border-b border-gray-200 p-4">
                        <p class="font-bold">News Feed </p>
                    </div>

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
                </div>

            </div>



        </div>


        <div class="lg:col-span-1 sm:col-span-3 md:col-span-3 col-span-3 overflow-hidden lg:h-auto">

            <div class="accountInfo bg-white">
                <div class="userInfo h-auto p-4 text-white infoBg">
                    <p class="text-base"> Welcome Back, </p>
                    <p class="text-2xl font-bold mt-2"> {{$user->name}} </p>
                </div>

                <div class="setupAccount p-4 h-auto bg-white border-b-2 border-black-200">
                    <div class="rewardYourself bg-blue-200">
                        <p class="text-base p-4 text-white infoBg"> Reward yourself for 14 days with a FREE Plus Membership 
                            <i class="fa fa-arrow-right" style="font-size: 12px;"></i> </p>
                    </div>
                    <p class="text-base mt-4 font-bold"> Set up your account   <span class="text-black-400 float-right"> {{ $profile_completed_percentage }} </span> </p>
                    <div class="relative pt-1">
                      <div class="overflow-hidden h-2 mb-4 text-xs flex  bg-blue-200">

                        <div style="width: {{ $profile_completed_percentage }}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"></div>
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

            {{-- Start: Card User Bids --}}    
                @include('layouts.cards.user_bids')
            {{-- End: Card User Bids --}}  



        </div>

    </div>


    <div class="bg-gray-700 h-16"></div>

</x-app-layout>



