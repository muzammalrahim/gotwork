<form id="projects_filters_form" action="{{ route('projects') }}" method="get" class="flex-shrink overflow-hidden shadow-sm sm:rounded-lg bg-white mr-4 lg:col-span-1 md:hidden lg:block hidden">


  <div class="project bg-gray-200 px-4 py-2 text-base cursor-pointer border-b-2 border-gray-300">
     <p><i class="fa fa-file mr-4"></i> <span> Filters </span> </p> 
  </div>
  

  <div class="block px-4 py-2 text-sm">
    {{-- Start: Project Types --}}
      @include('backend.includes.forms.fields.project_types')
    {{-- End: Project Types --}}
  </div>

  <hr class="w-4/5 m-auto">

  
  <div class="w-4/5 m-2"> 
    {{-- Start: Fixed Price Range Slider --}}
      @include('backend.includes.range_sliders.fixed_price')
    {{-- End: Fixed Price Range Slider --}}
  </div>
  

  <hr class="w-4/5 m-auto">

  
  <div class="w-4/5 m-2">
    {{-- Start: Hourly Price Range Slider --}} 
      @include('backend.includes.range_sliders.hourly_price')
    {{-- End: Hourly Price Range Slider --}}
  </div>
  

  <hr class="w-4/5 m-auto">

  <div class="listingType px-4 py-2 text-sm">
    {{-- Start: Listing Types --}} 
      @include('backend.includes.forms.fields.listing_types')
    {{-- End: Listing Types --}}
  </div>


  <hr class="w-4/5 m-auto">

  <div class="listingType px-4 py-2 text-sm">
    {{-- Start: Skills List --}} 
      @include('backend.includes.forms.fields.skills_list')    
    {{-- End: Skills List --}} 
  </div>

</form>

