@if ($errors->any())
  	<div class="mt-2 ml-16 mr-16 bg-red-100 border border-red-400 text-red-700 lg:px-16 md:px-8 sm:px-2 px-2  lg:py-10 md:py-5 sm:p-2 py-2 rounded relative" role="alert" id="load_limit">
	  	<strong class="font-bold">Whoops!</strong>
	  	<span class="block sm:inline">Something went wrong.</span>
	  	<ul>
            @foreach ($errors->all() as $error)
              <li >{{ $error }}</li>
            @endforeach
       	</ul>
	  	<span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="close-icon" onclick="hideAlert()">
	    	<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
	  	</span>
	</div>
@endif

@if(session()->has('success'))
	<div class="mt-2 ml-16 mr-16 bg-green-100 border border-green-400 text-green-700 lg:px-16 md:px-8 sm:px-2 px-2  lg:py-10 md:py-5 sm:p-2 py-2 rounded relative" role="alert" id="load_limit">
	  	<strong class="font-bold">Congrats!</strong>
	  	<span class="block sm:inline">{{ session()->get('success') }}</span>
	  	<span class="absolute top-0 bottom-0 right-0 px-4 py-3">
	    	<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
	  	</span>
	</div>
@endif

@if(session()->has('error'))
	<div class="mt-2 ml-16 mr-16 bg-red-100 border border-red-400 text-red-700 lg:px-16 md:px-8 sm:px-2 px-2  lg:py-10 md:py-5 sm:p-2 py-2 rounded relative" role="alert" id="load_limit">
	  	<strong class="font-bold">Whoops!</strong>
	  	<span class="block sm:inline">{{ session()->get('error') }}</span>
	  	<span class="absolute top-0 bottom-0 right-0 px-4 py-3">
	    	<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
	  	</span>
	</div>
@endif

<script type="text/javascript">
	$(document).ready(function() {
	  $("#load_limit").delay(5000).slideUp(600);
	});
</script>

<script type="text/javascript">
	function hideAlert() {
		console.log("clicked");
	}
</script>