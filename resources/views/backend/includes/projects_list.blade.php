<div class="projects cursor-pointer border-b border-gray-400 p-4">
    <div class="grid grid-cols-12 gap-3">
        <div class="font-bold mr-4 mt-2 text-xl col-span-1 hidden lg:block ">
            <i class="fa fa-tv text-blue-800"></i>
        </div>
        
        <div class="lg:col-span8 md:col-span-8 sm:col-span-11 col-span-8">
            <h1 class="md:text-base lg:text-base text-sm font-bold"> {{ $project->title }} </h1>
            <p class="md:text-sm lg:text-sm text-xs "> {{ $project->description }} </p>


            <p class="md:text-sm lg:text-sm text-xs mt-5 mb-2">  
                @foreach( $project->projectSkills as $skill )
                    <span class=" bg-gray-300 hover:bg-gray-300 text-black font-bold py-1 px-2 text-xs mr-4">{{$skill->skillName->name}} 
                    </span> 
                @endforeach
            </p>

            <p class="md:text-sm lg:text-sm text-xs mt-5 mb-2">  
                @foreach( $project->projectListingTypes as $listing_type )
                    <span class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 text-xs mr-4 rounded-xl">{{strtoupper($listing_type->listingType->title)}} 
                    </span> 
                @endforeach
            </p>
        </div>

        {{-- <div class="sm:col-span-1"></div> --}}
        <div class="col-span-3 lg:text-xl md:text-xl sm:text-base text-xs">
            <p class="{{($project->projectType->name != 'Hourly')?'ml-5':''}}"> {{($project->projectType->name == 'Hourly')?'~':''}} 
                <span>$</span>
                <span> {{ $project->min_amount }} - {{ $project->max_amount }} </span>
                <span>USD <span class="text-base">{{ $project->projectType->name }}</span> </span>
            </p>

            <p class="ml-5">  
                <span class="text-sm">Posted {{ $project->created_at->diffForHumans() }} </span> 
            </p>
        </div>
    </div>

    <div class="projectDetal">

        <div class="text-base mt-3 grid grid-cols-8 gap-3">


                <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                    
                    <i class="fas fa-clock text-base" aria-hidden="true"></i>
                    <span class="text-sm"> 
                        <span class="text-black-500"> {{ $project->projectType->name }} 
                        </span> 
                    </span>
                </div>

                <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                    
                    <i class="fas fa-list"></i>
                    <span class="text-sm"> 
                        <span class="text-black-500"> {{$project->bids->count()}} BIDS 
                        </span> 
                    </span>
                </div>
                
                <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                    <p class="text-sm"> <i class="fa fa-hourglass font-bold mr-3"></i> <span class="text-green-500"> Open </span> </p>
                </div>

                <div class="lg:col-span-3 md:col-span-2 sm:col-span-2 col-span-10">
                    
                    <i class="far fa-clock text-base" aria-hidden="true"></i>
                    <span class="text-sm"> 
                        <span class="text-black-500"> 
                            <?php 
                                $expires_at = $project->expires_at ;
                                $hours_expires_at = Carbon\Carbon::parse($expires_at)->format('H');
                                
                                $datework = \Carbon\Carbon::createFromDate($expires_at);
                                $now = \Carbon\Carbon::now();
                                

                                $today_hours = Carbon\Carbon::parse($now)->format('H');

                                $expires_days_remaining = $datework->diffInDays($now);
                                $expires_hours_remaining = abs( (int) $hours_expires_at - $today_hours);

                            ?> 

                            {{ ($expires_days_remaining == 1)?'1 DAY': $expires_days_remaining.' DAYS'}}, {{ $expires_hours_remaining }} HOURS LEFT TO BID
                        </span> 
                    </span>
                </div>

                
        </div>
        
    </div>




</div>