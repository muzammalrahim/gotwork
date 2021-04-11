<x-app-layout>
    <x-slot name="title">
        Got Work | Projects
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>


    </x-slot>


    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> --}}


    <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white m-5 show-modal lg:hidden block">Filtering</button>

    <div class="modal h-screen w-full fixed left-0 top-0 flex justify-center items-start bg-black bg-opacity-50 hidden z-10 block lg:hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg sm:w-full md:w-4/5 w-full">
          <div class="border-b px-4 py-2 flex justify-between items-center">
            <h3 class="font-semibold text-lg font-bold">Filter</h3>
            <button class="text-black close-modal">&cross;</button>
          </div>
          <div class="p-3">
            <div class="flex-shrink overflow-hidden shadow-sm sm:rounded-lg bg-white mr-4 lg:col-span-1">
            <div class="block px-4 py-2 text-sm">
              <span class="font-bold">Project Type</span>
              <div class="mt-2">
                <div>
                  <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox" checked>
                    <span class="ml-2">Fixed Projects</span>
                  </label>
                </div>
                <div>
                  <label class="inline-flex items-center">
                    <input type="checkbox" class="form-checkbox">
                    <span class="ml-2">Hourly Projects</span>
                  </label>
                </div>
              </div>
            </div>

            <hr class="w-4/5 m-auto">

            <div class="skills px-4 py-2 text-sm">
                <div class="font-bold text-base mb-2"> Skills </div>
                <div class="skillsBox h-24">
                    <textarea rows="3" cols="16"></textarea>
                </div>

                <button class="bg-blue-500 btn-xs hover:bg-blue-700 text-white font-bold py-2 px-4">
                  Clear Skills
                </button>

                <div class="mt-2"><a href="" class="hover:underline"> Edit Profile Skills</a></div>

            </div>

            <hr class="w-4/5 m-auto">

            <div class="listingType px-4 py-2 text-sm">

                <div class="font-bold text-base"> Listing Types </div>
                <div class="block text-sm">
                  <div class="mt-2">
                    <div>
                      <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="ml-2">Featured</span>
                      </label>
                    </div>
                    <div>
                      <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox" checked>
                        <span class="ml-2">Sealed</span>
                      </label>
                    </div>
                    <div>
                      <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">NDA</span>
                      </label>
                    </div>
                    <div>
                      <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">Urgent</span>
                      </label>
                    </div>
                    <div>
                      <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">Fulltime</span>
                      </label>
                    </div>
                    <div>
                      <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox">
                        <span class="ml-2">Recruiter</span>
                      </label>
                    </div>
                  </div>
                </div>

            </div>


            <hr class="w-4/5 m-auto">

            <div class="w-4/5 m-2"> 
                <div class="font-bold text-base h-0 mt-2"> Fixed Price </div>
                <div class="min-max-slider" data-legendnum="2">
                    <label for="min">Minimum price</label>
                    <input id="min" class="min" name="min" type="range" step="1" min="0" max="3000" / >
                    <label for="max">Maximum price</label>
                    <input id="max" class="max" name="max" type="range" step="1" min="0" max="3000" />
                </div>
            </div>


            <hr class="w-4/5 m-auto">


            <div class="w-4/5 m-2"> 
                <div class="font-bold text-base h-0 mt-2"> Hourly Price </div>
                <div class="min-max-slider" data-legendnum="2">
                    <label for="min">Minimum price</label>
                    <input id="min" class="min" name="min" type="range" step="1" min="0" max="120" / >
                    <label for="max">Maximum price</label>
                    <input id="max" class="max" name="max" type="range" step="1" min="0" max="120" />
                </div>
            </div>

            <hr class="w-4/5 m-auto">

            <div class="px-4 py-2"> 
                <div class="font-bold text-base my-2"> Specific Location </div>
                <div class="flex">
                    <input type="text" name="" class="w-4/5 border-2 border-gray-200">
                    <button class=" w-1/5 bg-white text-black font-bold py-2 px-4 border-2 border-gray-200">
                      <i class="fa fa-map-marker"></i>
                    </button>
                </div>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs mt-2">Clear Location</button>
            </div>

            <hr class="w-4/5 m-auto">

            <div class="skills px-4 py-2 text-sm">
                <div class="font-bold text-base mb-2"> Languages </div>
                <div class="skillsBox h-24">
                    <textarea rows="3" cols="16"></textarea>
                </div>

                <button class="bg-blue-500 btn-xs hover:bg-blue-700 text-white font-bold py-2 px-4">
                  Clear Languages
                </button>

            </div>

        </div>

          </div>
          <div class="flex justify-end items-center w-100 border-t p-3">
            <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal">Cancel</button>
            <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white">Oke</button>
          </div>
        </div>
    </div>

    <div class="grid grid-cols-5 gap-3 mx-auto sm:px-6 lg:px-16 mb-3 lg:mt-8 mt-8">
        
        {{-- Start: Projects Left Side Filters --}}
            @include('backend.includes.projects_left_side_filters')
        {{-- End: Projects Left Side Filters --}}

        
        {{-- Second div project and search --}}
        
        <div class="lg:col-span-4 md:col-span-5 sm:col-span-5 col-span-5 overflow-hidden shadow-sm sm:rounded-lg lg:h-auto bg-white p-2">

            <div class="grid grid-cols-4 gap-3 searchProjectBox border-b border-gray-400 lg:text-base md:text-base text-xs">
                <form action="{{ route('projects') }}" method="get" class="bg-white p-4 flex h-16 lg:col-span-2 md:col-span-4 sm:col-span-4 col-span-4">
                    
                    <input class="w-full rounded p-2" name="search" type="text" placeholder="Search for Projects" value="{{ old('search') }}">
                    <button class="ml-4 bg-blue-500 hover:bg-blue-300 rounded text-white p-2 pl-4 pr-4">
                        <p class="font-semibold text-xs">Search</p>
                    </button>

                    <button href="{{ route('projects') }}" class="ml-4 bg-red-400 hover:bg-red-300 rounded text-white p-2 pl-4 pr-4">
                        <p class="font-semibold text-xs">Reset</p>
                    </button>
                </form>
                
                <div class="ml-4 lg:ml-0 md:ml-4 mr-4 mt-1 lg:col-span-1 md:col-span-2 sm:col-span-2 col-span-2 mt-4  lg:text-base md:text-base text-xs"> {{-- Results: 426582  --}} </div>
                <form action="{{ route('projects') }}" method="get" class="flex lg:col-span-1 md:col-span-2 sm:col-span-2 col-span-2 md:w-60">  
                    <span class="mt-4">Sort by: </span> 
                    <div class="block lg:m-2">
                         <select name="sort" class="cursor-pointer lg:text-base md:text-base text-xs p-0 md:p-1 lg:p-1 ml-2 md:my-2 mt-4 mb-2 lg:mb-0 w-40" onchange="this.form.submit();">
                            <option value=" ">Selct Sort Type</option>
                            <option>Latest</option>
                            <option>Oldest</option>
                            <option>Lowest Price</option>
                            <option>Highest Price</option>
                            <option>Most Bids</option>
                            <option>Fewer Bids</option>
                        </select>
                    </div>
                </form>

            </div>


            @foreach($projects_list as $project)
              <a class="block hover:bg-gray-200" href="{{route('projectDetail' , ["slug" => $project->slug ])}}">
                @include('backend.includes.projects_list')  
                {{-- backend/includes/projects_list --}}
              </a>
            @endforeach

            <div class="mt-4">
                <!-- Start: Pagination -->
                    {!! $projects_list->links() !!}
                <!-- End: Pagination -->
            </div>
            
        </div>

    </div>


    <div class="bg-gray-700 h-16"></div>

</x-app-layout>


{{-- modal --}}

<style>
span.symbol {
  position: absolute;
  top: 38px;
  left: 132px;
  display: block;
  font-size: 12px;
  font-weight: bold;
}
</style>