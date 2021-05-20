
<x-app-layout>
    <x-slot name="title">
        Got Work | Projects
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>


    </x-slot>


    <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white m-5 show-modal lg:hidden block">Filtering</button>




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
                
                <div class="ml-4 lg:ml-0 md:ml-4 mr-4 mt-1 lg:col-span-1 md:col-span-2 sm:col-span-2 col-span-2 mt-4  lg:text-base md:text-base text-xs md:w-20"> {{-- Results: 426582  --}} </div>
                <form action="{{ route('projects') }}" method="get" class="flex lg:col-span-1 md:col-span-2 sm:col-span-2 col-span-2 md:w-60 md:-ml-10">  
                    <span class="mt-4">Sort by: </span> 
                    <div class="block lg:m-2">
                         <select name="sort" class="cursor-pointer lg:text-base md:text-base text-xs p-0 md:p-1 lg:p-1 ml-2 md:my-2 mt-4 mb-2 lg:mb-0 w-40" onchange="this.form.submit();">
                            <option value=" "
                            >
                                Selct Sort Type
                            </option>
                            {{-- Getting Project Sort Types From Helpers --}}
                            @foreach( getProjectSortTypes() as $project_sort )
                                <option value="{{$project_sort}}" {{($project_sort==$selected_sort)?'selected':''}}
                                >
                                    {{ucFirst(str_replace('_',' ',$project_sort))}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>

            </div>


            <div id="updateDiv">
                <div class="overlay"></div>

                @include('backend.includes.projects_list')  
                {{-- backend/includes/projects_list --}}
            </div>
            
        </div>

    </div>


    <div class="bg-gray-700 h-16"></div>

</x-app-layout>



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

{{-- Start: Page Modals --}}
    <!-- Start: Filter Modal For Mobile -->
            @include('backend.includes.modals.projects_filters_for_mobile')
    <!-- End: Filter Modal For Mobile -->
{{-- End: Page Modals --}}

{{-- Start: Page Scripts --}}
@include('scripts.projects')
{{-- End: Page Scripts --}}



    