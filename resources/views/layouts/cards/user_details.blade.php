<div class="relative flex flex-col min-w-0 break-words bg-white w-full  mb-6 shadow-xl rounded-lg -mt-64">
  <div class="px-6 mb-6">

    <div class="grid grid-cols-3 gap-4">

      <!-- Start: Grid 1 -->
      <div>

        
        <div class="flex flex-wrap justify-start">
          <div
            class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center"
          >

          <?php 
            $image_class = "ml-2 shadow-xl h-auto align-middle border-none relative mt-12 md:ml-2 lg:ml-20";
          ?>
            
            @if(Auth::user()->profile_photo_url && Auth::user()->profile_photo)
              <img
                alt="..."
                src="{{UPLOADS}}{{Auth::user()->profile_photo}}"
                class="{{$image_class}}"
                style="max-width: 150px;"
              />
            @elseif(Auth::user()->profile_photo_url)
              <img
                alt="..."
                src="{{Auth::user()->profile_photo_url}}"
                class="{{$image_class}}"
                style="max-width: 150px;"
              />
            @elseif(Auth::user()->profile_photo)
              <img
                alt="..."
                src="{{UPLOADS}}{{Auth::user()->profile_photo}}"
                class="{{$image_class}}"
                style="max-width: 150px;"
              />
            @else
              <img
                alt="..."
                src="{{ASSETS_BACKEND}}images/default-profile.png"
                class="{{$image_class}}"
                style="max-width: 150px;"
              />
            @endif

            
          </div>
          
          
        </div>
        

        <div class="flex justify-start mt-5">
          <div class="bg-green-500 h-3 w-3 text-white text-center font-extrabold flex items-center justify-center rounded-full"></div>

          <div class="text-green-500 text-center flex items-center justify-center rounded-full -mt-2 ml-2">
              <p class="mb-4 mt-1 text-xs md:text-md lg:text-xl lg:mt-0 leading-relaxed text-green-500">
                I'm Online.
              </p>
          </div>

        </div>


        <div class="flex justify-start md:-ml-1">

          <div class="text-gray-500 text-center flex items-center justify-center rounded-full">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path></svg>
            
            {{-- class="text-xs md:text-md lg:text-xl leading-relaxed md:mt-0 lg:mt-0" --}}
            <p>
              Joined {{ Auth::user()->created_at->format('F j, Y') }}
            </p>
          </div>
        </div>

      </div>
      <!-- End: Grid Col 1 -->


      <!-- Start: Grid Col 2 -->
      <div class="col-span-2">
        <div class="mt-12 ml-20 sm:ml-20 md:ml-20 lg:mt-12">
          <h3 class="text-base md:text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2">
            {{ Auth::user()->name }}
          </h3>

            <a href="{{ route('setting') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Edit Profile</a>

          <div class="flex justify-start">
            <div class="flex mt-2 mb-4 w-full w-64 md:w-64 lg:w-100">

              <p 
                class="text-xs md:text-md lg:text-md leading-relaxed text-yellow-500 bg-gray-300 pl-1 pr-1"
              >
                {{ number_format($data['user_rating'], 1) }}
              </p>

              @php ($stars = ( round($data['user_rating'],0) ) -1 ) 
              @php ($i=0)
              @for($i; $i<= $stars ; $i++)
                <svg class="mx-1 w-4 h-4 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
              @endfor
              
              @php ($empty_stars = (5.0 - $stars) -1)
              @php ($j=0)
              
              @for($j; $j< $empty_stars ; $j++)
                <svg class="mx-1 w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
              @endfor
             
              <p 
                class="text-xs md:text-md lg:text-md leading-relaxed text-black-500 pl-1 pr-1"
              >
                ( {{ $data['user_reviews_count'] }} reviews )
              </p>

            </div>
          </div>

          <p 
            class="text-xs md:text-md lg:text-xl leading-relaxed text-gray-500"
          >
            I'm Online. adshsdajshdakjhsa dsahjsdahjskdah dashjsadhjsda adshkkjhsajdsa ashdjsahdjkdash asdhjsadhjdsah shadjsdhajsdahjsda sadhjsadhjsdahdsa sadhjdashjdsa ashjsdahjsda.
          </p>
        </div>
      </div>

      <!-- End: Grid Col 2 -->

    </div> 
  </div>
</div>

<!-- End File -->