<x-app-layout>
  <x-slot name="title">
    Got Work | Profile Page
  </x-slot>

  <!-- Start: Section Background Cover -->
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
  <!-- End: Section Background Cover -->

  <!-- Start: Section User Details And Verifications -->
  <section class="relative py-16">
      <div class="container mx-auto px-4">


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">

          <!-- Start: Col User Details -->
          <div class="col-span-2">
            <!-- Start: Card User Details -->
            @include('layouts.cards.user_details')
            <!-- End: Card User Details -->
          </div>
          <!-- End: Col User Details -->



          <!-- Start: Col Verifications -->
          <div class="col-span-2 md:col-span-1 lg:col-span-1">
            <!-- Start: Card Verifications -->
            @include('layouts.cards.verifications')
            <!-- End: Card Verifications -->
          </div>
          <!-- End: Col Verifications -->
        </div>
      </div>
  </section>
  <!-- End: Section User Details And Verifications -->

  <!-- Start: Section Reviews And Top Skills -->
  <section class="relative -mt-10 md:py-36 md:mt-12 lg:py-36 lg:mt-12">
      <div class="container mx-auto px-4">


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">

          <!-- Start: Col User Details -->
          <div class="col-span-2">
            <!-- Start: Card User Details -->
            @include('layouts.cards.reviews')
            <!-- End: Card User Details -->
          </div>
          <!-- End: Col User Details -->



          <!-- Start: Col Verifications -->
          <div class="col-span-2 md:col-span-1 lg:col-span-1">
            <!-- Start: Card Verifications -->
            @include('layouts.cards.top_skills')
            <!-- End: Card Verifications -->
          </div>
          <!-- End: Col Verifications -->
        </div>
      </div>
  </section>
  <!-- End: Section Reviews And Top Skills -->


  <!-- Start: Section Experience -->
  <section class="relative -mt-10 md:py-36 md:mt-12 lg:py-36 lg:mt-8">
      <div class="container mx-auto px-4">


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">

          <!-- Start: Col User Details -->
          <div class="col-span-2">
            <!-- Start: Card User Details -->
            @include('layouts.cards.experience')
            <!-- End: Card User Details -->
          </div>
          <!-- End: Col User Details -->
        </div>
      </div>
  </section>
  <!-- End: Section Experience -->


  <!-- Start: Section Education -->
  <section class="relative -mt-10 md:py-36 md:mt-12 lg:py-36 lg:-mt-4">
      <div class="container mx-auto px-4">


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">

          <!-- Start: Col User Details -->
          <div class="col-span-2">
            <!-- Start: Card User Details -->
            @include('layouts.cards.education')
            <!-- End: Card User Details -->
          </div>
          <!-- End: Col User Details -->
        </div>
      </div>
  </section>
  <!-- End: Section Education -->


  <!-- Start: Section Qualification -->
  <section class="relative -mt-10 md:py-36 md:mt-12 lg:py-36 lg:-mt-20">
      <div class="container mx-auto px-4">


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4">

          <!-- Start: Col User Details -->
          <div class="col-span-2">
            <!-- Start: Card User Details -->
            @include('layouts.cards.qualification')
            <!-- End: Card User Details -->
          </div>
          <!-- End: Col User Details -->
        </div>
      </div>
  </section>
  <!-- End: Section Qualification -->

</x-app-layout>

<!-- End File -->