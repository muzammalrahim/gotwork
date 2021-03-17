<?php 
  $user_university = null;
  $user_country = null;
  $total_years_count = null;

  if ( $education->start_year && $education->end_year ) {
    $total_years_count = $education->end_year - $education->start_year;
  }

  if ( $education->university_id ){ 

    $user_university = DB::table('linkedin_universities')->where(['id'=>$education->university_id])->first(); 
    $user_university = $user_university->name;     

    if ( !$user_university || is_null($user_university) ) {
      $user_university = DB::table('webometric_universities')->where(['id'=>$education->university_id])->first();
      $user_university = $user_university->name;
    }            
  }

  if ( $education->country_id ){ 
    $user_country = DB::table('countries')->where(['id'=>$education->country_id])->first(); 
    $user_country = $user_country->name;
  }

?> 
<div class="border-b border-gray-300">
  <div class="mb-2">

  <!-- Start: Degree Title -->
  <h4
    class="text-xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
  >
    {{ $education->degree }}
  </h4>
  <!-- End: Degree Title -->

  <!-- Start: University Name -->
  <p
    class="text-sm font-semibold leading-normal mb-2 text-gray-800 mb-2"
  >
    <span>      
      {{ $user_university }}
    </span>
    ,
    <span>
      {{ $user_country }}
    </span>
  </p>
  <!-- End: University Name -->
  
  <!-- Start: Duration Period -->
  <p
    class="text-sm font-semibold leading-normal mb-2 text-gray-800 mb-2"
  >
    <span>
      {{ $education->start_year }}
    </span>
    -
    <span>
      {{ $education->end_year }}
    </span>

    <span>
      (  {{ $total_years_count }} {{ ($total_years_count==1)? ' year': ' years' }} )
    </span>
  </p>
  <!-- End: Duration Period -->


  <!-- End: Experience Details -->
  </div>

</div>

<!-- End File -->