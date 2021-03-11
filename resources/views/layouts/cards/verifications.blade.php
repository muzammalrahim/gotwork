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

<!-- End Of File -->