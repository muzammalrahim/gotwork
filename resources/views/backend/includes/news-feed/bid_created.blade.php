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
            {{-- @if($news_feed->description == "Bid updated") --}}
                
                <p class="text-sm ml-4 w-5/6">
                    <a class="text-blue-500"> {{(Auth::user()->id == $news_feed->causer_id)? 'You ': $causer_data->name}} </a> have palced bid on <a class="text-blue-500"> {{$project_data->title}}</a>
                </p>
                
            {{-- @else
                <p class="text-sm ml-4 w-5/6">
                    <a class="text-blue-500"> {{(Auth::user()->id == $news_feed->causer_id)? 'You ': $causer_data->name}} </a> have palced bid on <a class="text-blue-500"> {{$project_data->title}} </a>
                </p>
            @endif --}}

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