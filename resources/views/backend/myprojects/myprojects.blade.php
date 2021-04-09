<x-app-layout>


    <x-slot name="title">
        Got Work | My Projects
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('myProjects') }}
        </h2>
    </x-slot>




    <div class="abcdef px-24 mt-8">

        <div class="projectAnd text-3xl font-bold">
            Projects and Contests
        </div> 


        <div class="flex flex-wrap" id="tabs-id">
            <div class="w-full">
            <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-pink-600 cursor-pointer" onclick="changeAtiveTab(event,'tab-profile')">
                    <i class="fa fa-space-shuttle text-base mr-1"></i>  Open Projects
                </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-pink-600 bg-white cursor-pointer" onclick="changeAtiveTab(event,'tab-settings')">
                    <i class="fa fa-cog text-base mr-1"></i>  Work in Progress
                </a>
                </li>
                <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-pink-600 bg-white cursor-pointer" onclick="changeAtiveTab(event,'tab-options')">
                    <i class="fa fa-briefcase text-base mr-1"></i>  Past Projects
                </a>
                </li>
            </ul>
                <div class="flex my-3">
                    <div class="w-8/12">
                        <input class="w-full rounded" name="search" type="text" placeholder="Search for Projects" value="">
                    </div>
                    <div class="w-2/12">
                        
                       <span class="mx-3"> Show: </span>
                    {{-- </div> --}}
                    {{-- <div class="w-1/12"> --}}
                        <select name="sort" class="cursor-pointer">
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>
                    <div class="w-2/12">View:
                    {{-- </div> --}}
                    {{-- <div class="w-1/12"> --}}
                        <select name="sort" class="cursor-pointer  ml-3">
                            <option>All</option>
                            <option>Recruiter</option>
                        </select>
                    </div>
                </div>

            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                <div class="px-4 flex-auto">
                    <div class="tab-content tab-space">
                        {{-- Open Project --}}
                        <div class="block h-72 py-16 text-center" id="tab-profile">
                            @include('backend.myprojects.openProject')
                        </div>

                        {{-- Work in progress --}}

                        <div class="hidden h-72 py-16 text-center" id="tab-settings">
                            @include('backend.myprojects.closeProject')
                        </div>

                        {{-- Past Projects --}}

                        <div class="hidden h-72 py-16 text-center" id="tab-options">
                            @include('backend.myprojects.pastProjects')
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

    </div>
    
    <div class="bg-gray-700 h-16"></div>


</x-app-layout>


<script type="text/javascript">
    function changeAtiveTab(event,tabID){
      let element = event.target;
      while(element.nodeName !== "A"){
        element = element.parentNode;
      }
      ulElement = element.parentNode.parentNode;
      aElements = ulElement.querySelectorAll("li > a");
      tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
      for(let i = 0 ; i < aElements.length; i++){
        aElements[i].classList.remove("text-white");
        aElements[i].classList.remove("bg-pink-600");
        aElements[i].classList.add("text-pink-600");
        aElements[i].classList.add("bg-white");
        tabContents[i].classList.add("hidden");
        tabContents[i].classList.remove("block");
      }
      element.classList.remove("text-pink-600");
      element.classList.remove("bg-white");
      element.classList.add("text-white");
      element.classList.add("bg-pink-600");
      document.getElementById(tabID).classList.remove("hidden");
      document.getElementById(tabID).classList.add("block");
    }
  </script>