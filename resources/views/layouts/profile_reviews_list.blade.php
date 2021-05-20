<?php 
$project_amount = App\Models\bids::where('project_id', '=', $review->review_project_id)->where('status','=','awarded')->first();
$reviewer_details = App\Models\User::where('id', '=', $review->review_user_id)->first();
$project_tags = App\Models\ProjectTag::join('tags','tags.id', '=', 'project_tags.tag_id')->where('project_id', '=', $review->review_project_id)->orderBy('tags.name','asc')->get();
?>

<div class="border-b border-gray-300">
  <div class="mb-2">

  <div class="flex justify-start">

    <div class="text-gray-500 text-center flex items-center justify-center rounded-full">
      <!-- Start: Review Rating -->
      <div class="flex mt-2 mb-4 w-full w-40 md:w-40 lg:w-100">

        <p 
          class="text-xs md:text-md lg:text-md leading-relaxed text-yellow-500 bg-gray-300 pl-1 pr-1"
        >
          {{ number_format($review->review_rating, 1) }}
        </p>

        @php ($stars = ($review->review_rating) -1) 
        @php ($i=0)
        @for($i; $i<= $stars ; $i++)
          <svg class="mx-1 w-4 h-4 fill-current text-yellow-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
        @endfor
        
        @php ($empty_stars = (5.0 - $stars) -1)
        @php ($j=0)
        
        @for($j; $j< $empty_stars ; $j++)
          <svg class="mx-1 w-4 h-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
        @endfor
         
        

      </div>
      <!-- End: Review Rating -->


      
    </div>

    <p 
      class="text-md leading-relaxed mt-1.5"
    >
      <!-- Start: Currency Symbol -->
      <span>
        {{ ($project_amount)?$review->currency->symbol:'' }} 
      </span>
      <!-- End: Currency Symbol -->
      
      <!-- Start: Project Amount -->
      <span>
        {{-- $review->project->milestones->sum('amount') --}}
        {{ ($project_amount)?$project_amount->bid_amount:'' }}
      </span>
      <!-- End: Project Amount --> 
      
    </p>
    
  </div>

  <!-- Start: Review Title -->
  <p class="text-md leading-relaxed">
    {{ $review->title }} 
  </p>
  <!-- End: Review Title -->

  <!-- Start: Review Description -->
  <p class="text-md leading-relaxed text-gray-800">
    {{ $review->review_comment }} 
  </p>
  <!-- End: Review Description -->
  
  <!-- Start: Review Tag -->
  <div>
    @isset($project_tags)
      @foreach($project_tags as $tag)
        <div
          class="text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-gray-300 text-black-700"
        >
          {{ $tag->name }}
        </div>
      @endforeach
    @endisset
  </div>
  <!-- End: Review Tag -->


  <!-- Start: Reviewer Details -->
  @isset($reviewer_details)
    <div class="flex flex-wrap justify-start">
      <div
        class="mt-2"
      >

      <?php 
        $image_class = "h-12";
      ?>
        
          @if($reviewer_details->profile_photo_url && $reviewer_details->profile_photo)
            <img
              alt="..."
              src="{{UPLOADS}}{{$reviewer_details->profile_photo}}"
              class="{{$image_class}}"
              style="max-width: 150px;"
            />
          @elseif($reviewer_details->profile_photo_url)
            <img
              alt="..."
              src="{{$reviewer_details->profile_photo_url}}"
              class="{{$image_class}}"
              style="max-width: 150px;"
            />
          @elseif($reviewer_details->profile_photo)
            <img
              alt="..."
              src="{{UPLOADS}}{{$reviewer_details->profile_photo}}"
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
          {{ $reviewer_details->name }}
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
          {{ Carbon\Carbon::parse($review->review_created_at)->diffForHumans() }}
        </p>
      </div>
  
      <!-- End: Review Date -->
      
    </div>

    @endisset
    <!-- End: Reviewer Details -->
  </div>

</div>

<!-- End File -->