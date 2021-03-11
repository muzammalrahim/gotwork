<div class="border-b border-gray-300">
  <div class="mb-2">

  <div class="flex justify-start">

    <div class="text-gray-500 text-center flex items-center justify-center rounded-full">
      <!-- Start: Review Rating -->
      <div class="flex mt-2 mb-4 w-full w-40 md:w-40 lg:w-100">

        <p 
          class="text-xs md:text-md lg:text-md leading-relaxed text-yellow-500 bg-gray-300 pl-1 pr-1"
        >
          4.9
        </p>

        <svg class="mx-1 w-4 h-4 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
          
        <svg class="mx-1 w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>

      </div>
      <!-- End: Review Rating -->


      
    </div>

    <p 
      class="text-md leading-relaxed mt-2"
    >
      $647.2 CAD
    </p>
    
  </div>

  <!-- Start: Review Title -->
  <p class="text-md leading-relaxed">
    Django project on apache server not running 
  </p>
  <!-- End: Review Title -->

  <!-- Start: Review Description -->
  <p class="text-md leading-relaxed text-gray-800">
    Django project on apache server not running, Django project on apache server not running.Django project on apache server not running. 
  </p>
  <!-- End: Review Description -->
  
  <!-- Start: Review Tag -->
  <div>
    <div
      class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-gray-300 text-black-700"
    >
      Tag
    </div>

    <div
      class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-gray-300 text-black-700"
    >
      Tag 2
    </div>
  </div>
  <!-- End: Review Tag -->


  <!-- Start: Reviewer Details -->
  <div class="flex flex-wrap justify-start">
      <div
        class="mt-2"
      >

      <?php 
        $image_class = "h-12";
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
      

      <!-- Start: Reviewer Name -->
      <div
        class="mt-4 ml-2"
      >
        <p class="text-md leading-relaxed">
          {{Auth::user()->name}}
        </p>
      </div>
  
      <!-- End: Reviewer Name -->

      <!-- Start: Dot Separater Between Name And Date -->
      <div
        class="-mt-2 ml-2"
      >
        <p class="text-4xl leading-relaxed">
          .
        </p>
      </div>
      <!-- End: Dot Separater Between Name And Date -->


      <!-- Start: Review Date -->
      <div
        class="mt-4 ml-2"
      >
        <p class="text-md leading-relaxed">
          28 days ago
        </p>
      </div>
  
      <!-- End: Review Date -->
      
    </div>

    <!-- End: Reviewer Details -->
  </div>

</div>

<!-- End File -->