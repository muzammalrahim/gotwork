<form id="projects_filters_form" action="{{ route('dashboard') }}" method="get" class="flex-shrink overflow-hidden shadow-sm sm:rounded-lg bg-white mr-4 lg:col-span-1 md:hidden lg:block hidden">


  <div class="project bg-gray-200 px-4 py-2 text-base cursor-pointer border-b-2 border-gray-300">
     <p><i class="fa fa-file mr-4"></i> <span> Filters </span> </p> 
  </div>
  {{--  
  <div class="contests px-4 py-2 text-base hover:bg-gray-200 cursor-pointer border-b-2 border-gray-300">
     <p><i class="fa fa-trophy mr-4"></i> <span> Contests </span> </p> 
  </div>
  --}}
  <div class="block px-4 py-2 text-sm">
    <span class="font-bold">Project Type</span>
    <div class="mt-2">
      
      @foreach($project_types as $project_type)
          <div>
            @if($filter_project_types == null)
              <label class="inline-flex items-center">
                <input type="checkbox" name="search_project_types[]" class="form-checkbox cursor-pointer" value="{{ $project_type->id }}">
                <span class="ml-2">{{ $project_type->name }} Projects</span>
              </label>
            @else
              <label class="inline-flex items-center">
                <input type="checkbox" name="search_project_types[]" class="form-checkbox cursor-pointer" value="{{ $project_type->id }}" {{ in_array($project_type->id, $filter_project_types) ? "checked" : "" }} >
                <span class="ml-2">{{ $project_type->name }} Projects</span>
              </label>
            @endif
          </div>
      @endforeach
    </div>
  </div>

  <hr class="w-4/5 m-auto">

  <div class="w-4/5 m-2"> 
      <div class="font-bold text-base h-0 mt-2"> Fixed Price </div>

      <?php /* ?>
      <div class="min-max-slider" data-legendnum="2">
          <label for="min">Minimum price</label>
          <input id="min" class="min" name="fixed_min" type="range" step="1" min="0" max="3000" / >
          <label for="max">Maximum price</label>
          <input id="max" class="max" name="fixed_max" type="range" step="1" min="0" max="3000" />
          

          {{-- @if($fixed_min == null)
            <input id="min" class="min" name="fixed_min" type="range" step="1" min="0" max="3000" / >
          @else
            <input id="min" class="min fixed_projects" name="fixed_min" type="range" step="1" min="{{$fixed_min}}" max="3000" / >
          @endif

          <label for="max">Maximum price</label>
          @if($fixed_max == null)
            <input id="max" class="max" name="fixed_max" type="range" step="1" min="0" max="3000" />
          @else
            <input id="max" class="max fixed_projects" name="fixed_max" type="range" step="1" min="0" max="{{$fixed_max}}" />
          @endif --}}
        {{-- <button class="ml-52 mt-2 bg-blue-500 hover:bg-blue-300 rounded text-white p-2 pl-4 pr-4">
          <p class="font-semibold text-xs">Search</p>
        </button> --}}
      </div>
      <?php */ ?>
      @include('backend.includes.projects_range_slider')
      
  </div>

  <hr class="w-4/5 m-auto">

  <div class="w-4/5 m-2"> 
      <div class="font-bold text-base h-0 mt-2"> Hourly Price </div>
      <div class="min-max-slider" data-legendnum="2">

        <label for="min">Minimum price</label>
        <input id="min" class="min" name="hourly_min" type="range" step="1" min="0" max="120" / >
        
        <label for="max">Maximum price</label>
        <input id="max" class="max" name="hourly_max" type="range" step="1" min="0" max="120" />
      </div>
  </div>

  <hr class="w-4/5 m-auto">

  <div class="listingType px-4 py-2 text-sm">
      <div class="font-bold text-base"> Listing Types </div>
      <div class="block text-sm">
        <div class="mt-2">
          @foreach($listing_types as $listing_type)
            <div>
              @if($filter_listing_types == null)
                <label class="inline-flex items-center">
                  <input type="checkbox" name="search_listing_types[]" class="form-checkbox cursor-pointer" value="{{ $listing_type->id }}">
                  <span class="ml-2">{{ $listing_type->title }}</span>
                </label>
              @else
                <label class="inline-flex items-center">
                <input type="checkbox" name="search_listing_types[]" class="form-checkbox cursor-pointer" value="{{ $listing_type->id }}" {{ in_array($listing_type->id, $filter_listing_types) ? "checked" : "" }} >
                <span class="ml-2">{{ $listing_type->title }}</span>
              </label>
              @endif
            </div>
          @endforeach
        </div>
      </div>
  </div>


  <hr class="w-4/5 m-auto">

  <div class="listingType px-4 py-2 text-sm">
      <div class="font-bold text-base"> Skills </div>
      <div class="block text-sm">
        <div class="mt-2">
          @foreach($skills_list as $skill)
            <div>
              @if($filter_listing_skills == null)
                <label class="inline-flex items-center">
                  <input type="checkbox" name="search_project_skills[]" class="form-checkbox cursor-pointer" value="{{ $skill->id }}">
                  <span class="ml-2">{{ $skill->name }}</span>
                </label>
              @else
                <label class="inline-flex items-center">
                <input type="checkbox" name="search_project_skills[]" class="form-checkbox cursor-pointer" value="{{ $skill->id }}" {{ in_array($skill->id, $filter_listing_skills) ? "checked" : "" }} >
                <span class="ml-2">{{ $skill->name }}</span>
              </label>
              @endif
            </div>
          @endforeach
        </div>
      </div>
  </div>

</form>

<script type="text/javascript">  
    $(function(){
      $('.form-checkbox,.min,.max').on('change',function(){
        $('#projects_filters_form').submit();
      });
    });


    $(document).ready( function() {
      $( ".upper" ).after( "<span class='symbol'>USD+</span>" );
    });


    /*$(function() { 
        var fixed_min = '';
        var fixed_max = '';
        var hourly_min = '';
        var hourly_max = '';

        console.log(fixed_min);

        var $slide = $(".fixed_projects").slider({
            range: true,
            min: 0,
            max: 100
        });
        $slide.slider("option", "min", 25); // left handle should be at the left end, but it doesn't move
        $slide.slider("value", $slide.slider("value")); //force the view refresh, re-setting the current value
    }); */
</script>