<div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex  justify-center">
	<div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

	<div class="modal-container bg-white w-11/12 md:max-w-lg md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
	  
	  <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col  mt-4 mr-4 text-white text-sm z-50">
	    <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
	      <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
	    </svg>
	    <span class="text-sm">(Esc)</span>
	  </div>

	  <!-- Add margin if you want to see some of the overlay behind the modal-->
	  <div class="modal-content py-4 text-left px-6">
	    <!--Title-->
	    <div class="flex justify-between items-center pb-3">
	      <p class="text-2xl font-bold">Milestones</p>
	      <div class="modal-close cursor-pointer z-50">
	        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
	          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
	        </svg>
	      </div>
	    </div>

	    <form action="{{ route('bid-milestone-status.update') }}" method="POST"> 
	    	@csrf
		    <!-- Start: Modal Body -->
		    	<div class="alert  bg-green-100 border border-green-400 text-green-700 p-5 delay-500" >
					<strong id="inprogress_alert"></strong>
				</div>
				
		    	<div id="milestones_data"></div>
		    <!-- End: Modal Body -->

		    <!--Footer-->
		    <div class="flex justify-end pt-2">

		    	@if($assignee)
		      		<button class="px-4 bg-transparent p-3 rounded-lg text-indigo-600 font-bold hover:bg-gray-100 hover:text-indigo-400 mr-2">Change Status</button>
		      	@endif
		      <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
		    </div>
	    </form>
	  </div>
	</div>
</div>