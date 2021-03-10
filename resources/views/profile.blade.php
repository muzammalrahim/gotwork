<x-app-layout>
    <x-slot name="title">
        Got Work | Profile Page
    </x-slot>

    <section class="relative block" style="height: 500px;">
        <div
          class="absolute top-0 w-full h-full bg-center bg-cover"
          style='background-image: url("https://images.unsplash.com/photo-1499336315816-097655dcfbda?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2710&amp;q=80");'
        >
          <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-50 bg-black"
          ></span>
        </div>
        <div
          class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
          style="height: 70px; transform: translateZ(0px);"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-gray-300 fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
    </section>

    <section class="relative py-16 bg-gray-300">
        <div class="container mx-auto px-4">

          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">

            <div class="col-span-2">
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full  mb-6 shadow-xl rounded-lg -mt-64">
                  <div class="px-6">

                    <div class="grid grid-cols-3 gap-4">

                      <!-- Start: Grid 1 -->
                      <div>

                        
                        <div class="flex flex-wrap justify-start">
                          <div
                            class="w-full lg:w-3/12 px-4 lg:order-2 flex justify-center"
                          >

                          <?php 
                            $image_class = "ml-2 shadow-xl h-auto align-middle border-none relative mt-12 md:ml-2 lg:ml-20";
                          ?>
                            
                            @if(Auth::user()->profile_photo_url && Auth::user()->profile_photo)
                              <img
                                alt="..."
                                src="{{UPLOADS}}{{Auth::user()->profile_photo}}"
                                class="{{$image_class}}"
                                style="max-width: 150px;"
                              />
                            @elseif(Auth::user()->profile_photo_url)
                              <img
                                alt="..."
                                src="{{Auth::user()->profile_photo_url}}"
                                class="{{$image_class}}"
                                style="max-width: 150px;"
                              />
                            @elseif(Auth::user()->profile_photo)
                              <img
                                alt="..."
                                src="{{UPLOADS}}{{Auth::user()->profile_photo}}"
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
                          
                          
                        </div>
                        

                        <div class="flex justify-start mt-5">
                          <div class="bg-green-500 h-3 w-3 text-white text-center font-extrabold flex items-center justify-center rounded-full"></div>

                          <div class="text-green-500 text-center flex items-center justify-center rounded-full -mt-2 ml-2">
                              <p class="mb-4 mt-1 text-xs md:text-md lg:text-xl lg:mt-0 leading-relaxed text-green-500">
                                I'm Online.
                              </p>
                          </div>

                        </div>


                        <div class="flex justify-start md:-ml-1">

                          <div class="text-gray-500 text-center flex items-center justify-center rounded-full">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" class="transform transition-transform duration-500 ease-in-out"><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd"></path></svg>
                            
                            <p class="text-xs md:text-md lg:text-xl leading-relaxed md:mt-0 lg:mt-0">
                              Joined {{ Auth::user()->created_at->format('F j, Y') }}
                            </p>
                          </div>
                        </div>

                      </div>
                      <!-- End: Grid Col 1 -->


                      <!-- Start: Grid Col 2 -->
                      <div class="col-span-2">
                        <div class="mt-12 ml-20 sm:ml-20 md:ml-20 lg:mt-12">
                          <h3
                            class="text-base md:text-4xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                          >
                            {{ Auth::user()->name }}
                          </h3>


                          <p 
                            class="text-xs md:text-md lg:text-xl leading-relaxed text-gray-500"
                          >
                            I'm Online. adshsdajshdakjhsa dsahjsdahjskdah dashjsadhjsda adshkkjhsajdsa ashdjsahdjkdash asdhjsadhjdsah shadjsdhajsdahjsda sadhjsadhjsdahdsa sadhjdashjdsa ashjsdahjsda.
                          </p>
                        </div>
                      </div>

                      <!-- End: Grid Col 2 -->

                    </div> 
                      
                      

                  </div>
              </div>
            </div>




            <!-- Start: Card Verifications -->

            <div>
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg md:-mt-64">
                  <div class="px-6 mb-20">

                    <div class="">

                      <!-- Start: Grid 1 -->
                      <div>

                        
                        
                        

                        

                      </div>
                      <!-- End: Grid Col 1 -->


                      <!-- Start: Grid Col 2 -->
                      <div class="mt-12">
                        <h3
                          class="border-b border-gray-300 text-2xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
                        >
                          Verifications
                        </h3>


                        <div class="flex justify-start">

                          <div class="text-gray-500 text-center flex items-center justify-center rounded-full">
                            <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="transform transition-transform duration-500 ease-in-out {{(Auth::user()->email_verified_at)?'text-green-500':''}}"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            
                            <p class="text-md leading-relaxed">
                              Email Verified: 
                              @if(Auth::user()->email_verified_at)
                                <i class="fas fa-check text-green-500"></i>
                              @else
                                <form method="POST" action="{{ route('verification.send') }}">
                                  <button type="submit" class="text-blue-500">Verify</button>
                                </form>
                              @endif
                            </p>
                          </div>
                        </div>
                      </div>

                      <!-- End: Grid Col 2 -->

                    </div> 
                      
                      

                  </div>
              </div>
            </div>
          </div>
        </div>
    </section>


</x-app-layout>