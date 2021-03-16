<div class="border-b border-gray-300">
  <div class="mb-2">

  <!-- Start: Position Title -->
  <h4
    class="text-xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
  >
    {{ $experience->title }}
  </h4>
  <!-- End: Position Title -->

  <!-- Start: Company Name -->
  <h4
    class="text-xxl font-semibold leading-normal mb-2 text-gray-800 mb-2"
  >
    {{ $experience->company_name }}
  </h4>
  <!-- End: Company Name -->
  
  <!-- Start: Start Year -->
  <p
    class="text-sm font-semibold leading-normal mb-2 text-gray-800 mb-2"
  >
    <span>
      {{ $experience->start_month }}
    </span>

    <span>
      {{ $experience->start_year }}
    </span>
    -
    @if($experience->is_current == "Yes")
      <span>
        Present
      </span>
    @else
      <span>
        {{ $experience->end_month }}
      </span>

      <span>
        {{ $experience->end_year }}
      </span>
    @endif
  </p>
  <!-- End: Start Year -->



  <!-- End: Experience Details -->
  </div>

</div>

<!-- End File -->