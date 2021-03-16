
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
            Experience
          </h3>

         
        </div>
      </div>         

      <br />
      <!-- Start: Reviews List -->
      @isset($data['experiences'])
        @foreach ($data['experiences'] as $experience)
          @include('layouts.profile_experience_list')
        @endforeach
      @endisset
      <!-- End: Reviews List -->
    </div>
    <!-- End: Grid Col 2 -->
  </div>
</div>

<!-- End File -->