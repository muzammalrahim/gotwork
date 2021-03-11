<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg md:-mt-64">
  <div class="px-6 mb-20">
    <!-- Start: Grid 1 -->
    <div>
    </div>
    <!-- End: Grid Col 1 -->

    <!-- Start: Grid Col 2 -->
    <div class="mt-8">
      <div class="border-b border-gray-300"> 
        <div class=" flex flex-wrap content-start ">
          <h3
            class=" text-2xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
          >
            Reviews
          </h3>

          <p class="ml-12 pl-20 md:ml-10 md:pl-11 lg:ml-44 lg:pl-56 px-1 lg:order-3 lg:text-right lg:self-center md:text-lg lg:text-lg leading-relaxed">
            Filter reviews by: 
          </p>

          <select class="ml-32 md:ml-0 lg:ml-0 lg:order-3 lg:text-right lg:self-center mb-1">
            <option>View All</option>
            <option>No</option>
            <option>Maybe</option>
          </select>
        </div>
      </div>         

      


      <div class="flex justify-start">

        <div class="text-gray-500 text-center flex items-center justify-center rounded-full">
          
          <p class="text-md leading-relaxed">
            Showing 1 - 5 out of 50+ reviews 
          </p>
        </div>
      </div>

      <br />

      <!-- Start: Reviews List -->
      @include('layouts.profile_reviews_list')
      @include('layouts.profile_reviews_list')
      <!-- End: Reviews List -->
    </div>
    <!-- End: Grid Col 2 -->
  </div>
</div>

<!-- End File -->