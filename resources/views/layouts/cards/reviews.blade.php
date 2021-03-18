<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg md:-mt-64" id="reviews">
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

      

      <br />

      <!-- Start: Reviews List -->
      @isset($user_reviews)
        <div class="container mb-2">
          @foreach($user_reviews as $review)
            @include('layouts.profile_reviews_list')
          @endforeach
        </div>

        <!-- Start: Pagination -->
        {!! $user_reviews->fragment('reviews')->links() !!}
        <!-- End: Pagination -->
      @endisset
      <!-- End: Reviews List -->
    </div>
    <!-- End: Grid Col 2 -->
  </div>
</div>

<!-- End File -->

<script type="text/javascript">
  document.getElementById("results").innerHTML = "reviews";
</script>