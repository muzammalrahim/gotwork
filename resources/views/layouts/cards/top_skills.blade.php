<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg md:-mt-64">
  <div class="px-6 mb-20">
    <!-- Start: Grid 1 -->
    <div>
    </div>
    <!-- End: Grid Col 1 -->

    <!-- Start: Grid Col 2 -->
    <div class="mt-8">
      <h3
        class="border-b border-gray-300 text-2xl font-semibold leading-normal mb-2 text-gray-800 mb-2"
      >
        Top Skills
      </h3>

      @isset($user_skills)
        @foreach($user_skills as $skill)
          <div class="flex justify-start">

            <div class="text-black-700 text-center flex items-center justify-center rounded-full">
              
              <p class="text-md leading-relaxed">
                {{ $skill->name }}  
              </p>
            </div>
          </div>
        @endforeach
      @endisset
    </div>
    <!-- End: Grid Col 2 -->
  </div>
</div>

<!-- End File -->