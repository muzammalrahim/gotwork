<div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-start bg-black bg-opacity-50 hidden z-10 block lg:hidden projects-modal">
    <!-- modal -->
    <div class="bg-white rounded shadow-lg sm:w-full md:w-4/5 w-full">
      <div class="border-b px-4 py-2 flex justify-between items-center">
        <h3 class="font-semibold text-lg font-bold">Filter</h3>
        <button class="text-black close-modal">&cross;</button>
      </div>
      <div class="p-3">
        
        <form id="projects_filters_form" action="{{ route('projects') }}" method="get" class="flex-shrink overflow-hidden shadow-sm sm:rounded-lg bg-white mr-4 lg:col-span-1">

        <div class="">
        
        
        <div class="block px-4 py-2 text-sm">
            {{-- Start: Project Types --}}
              @include('backend.includes.forms.fields.project_types')
            {{-- End: Project Types --}}
        </div>

        <?php /* ?>
        <hr class="w-4/5 m-auto">

        <div class="block px-4 py-2 text-sm">
            {{-- Start: Fixed Price Range Slider --}}
              @include('backend.includes.range_sliders.fixed_price')
            {{-- End: Fixed Price Range Slider --}}
        </div>
        
        <hr class="w-4/5 m-auto">


        <div class="block px-4 py-2 text-sm">
            {{-- Start: Hourly Price Range Slider --}} 
              @include('backend.includes.range_sliders.hourly_price')
            {{-- End: Hourly Price Range Slider --}}

        </div>
        <?php */ ?>

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


        <hr class="w-4/5 m-auto">

    </div>
</form>

      </div>
      <div class="flex justify-end items-center w-100 border-t p-3">
        <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal">Cancel</button>
      </div>
    </div>
</div>