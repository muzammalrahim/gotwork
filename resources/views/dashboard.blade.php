<x-app-layout>
    <x-slot name="title">
        Got Work | Dashboard
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
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
        <div class="flex-shrink overflow-hidden shadow-sm sm:rounded-lg bg-white mr-4 lg:col-span-1 md:hidden lg:block hidden">
            <div class="project bg-gray-200 px-4 py-2 text-base cursor-pointer border-b-2 border-gray-300">
               <p><i class="fa fa-file mr-4"></i> <span> Project </span> </p> 
            </div>
            <div class="contests px-4 py-2 text-base hover:bg-gray-200 cursor-pointer border-b-2 border-gray-300">
               <p><i class="fa fa-trophy mr-4"></i> <span> Contests </span> </p> 

            </div>
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

            <div class="w-4/5 m-auto"> 
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

        
        {{-- Second div project and search --}}
        
        <div class="lg:col-span-4 md:col-span-5 sm:col-span-5 col-span-5 overflow-hidden shadow-sm sm:rounded-lg lg:h-screen bg-white p-2">

            <div class="grid grid-cols-4 gap-3 searchProjectBox border-b border-gray-400 lg:text-base md:text-base text-xs">
                <div class="bg-white p-4 flex h-16 lg:col-span-2 md:col-span-4 sm:col-span-4 col-span-4">
                    {{-- <span class="w-auto flex justify-end items-center text-gray-500 p-2">
                        <i class="fa fa-search"></i>
                    </span> --}}
                    <input class="w-full rounded p-2" type="text" placeholder="Search for Projects">
                    <button class="bg-red-400 hover:bg-red-300 rounded text-white p-2 pl-4 pr-4">
                            <p class="font-semibold text-xs">Search</p>
                    </button>
                </div>
                    <div class="ml-4 lg:ml-0 md:ml-4 mr-4 mt-1 lg:col-span-1 md:col-span-2 sm:col-span-2 col-span-2 mt-4  lg:text-base md:text-base text-xs"> Results: 426582 </div>
                    <div class="flex lg:col-span-1 md:col-span-2 sm:col-span-2 col-span-2">  
                        <span class="mt-4">Sort by: </span> 
                        <div class="block lg:m-2">
                             <select class="cursor-pointer lg:text-base md:text-base text-xs p-0 md:p-1 lg:p-1 ml-2 md:my-2 mt-4 mb-2 lg:mb-0">
                                <option>Latest</option>
                                <option>Oldest</option>
                                <option>Lowest Price</option>
                                <option>Highest Price</option>
                                <option>Most Bids</option>
                                <option>Fewer Bids</option>
                            </select>
                        </div>
                    </div>

            </div>


            <div class="projects cursor-pointer border-b border-gray-400 p-4">
                <div class="grid grid-cols-12 gap-3">
                    <div class="font-bold mr-4 mt-2 text-xl col-span-1 hidden lg:block ">
                        <i class="fa fa-tv text-blue-800"></i>
                    </div>
                    
                    <div class="lg:col-span-9 md:col-span-11 sm:col-span-11 col-span-11">
                        <h1 class="md:text-base lg:text-base text-sm font-bold"> ASP.NET C# solution to upload files and store them on web server </h1>
                        <p class="md:text-sm lg:text-sm text-xs ">I need a simple ASP.NET C# solution so a user can upload a file from a webpage to the webserver.I have an ASP.NET C# web application where customers can register themself. </p>
                    </div>

                    {{-- <div class="sm:col-span-1"></div> --}}
                    <div class="col-span-2 lg:text-2xl md:text-xl sm:text-base text-xs">
                        <p class=""> $36-$298 </p>
                        <div class="lg:float-right md:float-none sm:float-none md:text-sm lg:text-sm text-xs">USD</div>
                    </div>
                </div>

                <div class="projectDetal">
                    <div class="text-base mt-3 grid grid-cols-11 gap-3"> 
                            <div class="lg:col-span-1 lg:block hidden"></div>
                            <div class="lg:col-span-5 md:col-span-5 sm:col-span-5 col-span-10">
                                <p class="text-sm"> <i class="fa fa-hourglass font-bold mr-3"></i> <span class="text-green-500"> Open </span> 11 minutes ago __9 bids </p>
                            </div>

                            <div class="lg:col-span-5 md:col-span-5 sm:col-span-5 col-span-10">
                                <p class="text-sm flex">
                                    <span class="text-xl"> <i class="fa fa-user float-left"></i> </span> 

                                    <button class="bg-yellow-400 btn-xs hover:bg-yellow-500 text-white font-bold p-1 h-6 text-xs ml-3 rounded">5.0</button>
                                        <span class="rate float-left text-sm">
                                            <input type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                          </span>
                                    <span class="relative bottom-3 text-xs">    (2 reviews) </span> 
                                </p>
                            </div>
                    </div>
                    
                </div>


            </div>

        </div>

    </div>


    <div class="bg-gray-700 h-16"></div>

</x-app-layout>


{{-- modal --}}

