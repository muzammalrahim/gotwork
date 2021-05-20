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
            class=" text-2xl font-semibold leading-normal mb-2 text-gray-800 mb-2 mr-8"
          >
            Reviews
          </h3>

          <p class="md:ml-52 lg:text-right lg:self-center md:text-lg lg:text-lg leading-relaxed">
            Filter reviews by:&nbsp; 
          </p>

          <select id="filter_review_by_skill" name="filter_review_by_skill" onchange="filterReviewsTrigger()" class="ml-32 md:ml-0 lg:ml-0 lg:order-3 lg:text-right lg:self-center mb-1">
            @isset($user_skills)
              <option value=" " disabled>Select Skill</option>
              <option value="view_all" {{('view_all'==$data['selected_reviews'])?'selected':''}}>View All</option>
              @foreach($user_skills as $skill)
                 <option value="{{$skill->name}}" {{($skill->name==$data['selected_reviews'])?'selected':''}}>{{ $skill->name }}</option>
              @endforeach
            @endisset
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
        {{-- {!! $user_reviews->fragment('reviews')->links() !!} --}}
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

<script type="text/javascript">
  function filterReviewsTrigger () {
    let queryString = window.location.search;  // get url parameters
    let params = new URLSearchParams(queryString);  // create url search params object
    params.delete('reviews');  // delete reviews parameter if it exists, in case you change the dropdown more then once
    params.append('reviews', document.getElementById("filter_review_by_skill").value); // add selected reviews
    document.location.href = "?" + params.toString(); // refresh the page with new url
  }
</script>