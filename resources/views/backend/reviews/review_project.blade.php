<x-app-layout>
    <x-slot name="title">
        Got Work | Review
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ASSETS_BACKEND}}css/reviews.css"/>

  	<section class="relative py-16 lg:px-16 md:px-8 sm:px-2">


		<div id="tabs" class="lg:text-xl">

			<div class="grid grid-cols-4 gap-4">

					<div class="lg:col-span-1 md:col-span-1 sm:col-span-4 col-span-4 bg-white h-content shadow-xl rounded-xl">
						<div class="abc">	
							<ul class="w_ful">
								<li><a href="#tabs-1" class="w_full" onclick="appendTabUrl('#tabs-1')">Review</a></li>
							</ul>
						</div>
					</div>

					<div class="lg:col-span-3 md:col-span-3 sm:col-span-4 col-span-4 bg-white shadow-xl rounded-xl">
						<div class="tab-contentss">
							
							{{-- ============================ tab-1 of personal information ============================ --}}
							
							<div id="tabs-1">
								<div class="heading lg:px-16 md:px-8 sm:px-2 px-2 lg:py-10 md:py-5 sm:py-2 py-2 border-b border-gray-300">
			        				<h1 class="lg:text-2xl md:text-xl sm:text-xl font-bold -ml-1"> Review Information </h1>    			
				        		</div>

				        		<!-- Start: Alert Messages -->
				        		@include('layouts.alerts')
				        		<!-- End: Alert Messages -->

				        		<form action="{{route('review.store')}}" method="POST">
		                        @csrf

		                        	{{-- Start: Form hidden fields --}}
		                        		<input type="hidden" name="project_id" value="{{$project_id}}">
		                        	{{-- End: Form hidden fields --}}

					        		<div class="lg:px-16 md:px-8 sm:px-2 px-2  lg:py-10 md:py-5 sm:p-2 py-9 border-b border-gray-300 text-base">
					        			<h3 class="lg:text-xl md:text-base sm:text-sm text-sm font-bold"> Choose Rating </h3>    		
					        			

					        			<fieldset class="rating">
										    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
										    <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
										    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
										    <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
										    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
										    <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
										    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
										    <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
										    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
										    <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
										</fieldset>	
					                   
					                </div>

					        		
					                <div class="lg:px-16 md:px-8 sm:px-2 px-2  lg:py-10 md:py-5 sm:p-2 py-2 border-b border-gray-300 text-base">
					        			<h3 class="lg:text-xl md:text-base sm:text-sm text-sm font-bold"> Comment </h3>    			
					                    <textarea autofocus id="description" name="comment" class="rounded-sm mt-3 focus:outline-none lg:text-sm md:text-sm text-xs bg-gray-100 w-full" placeholder="Description" rows="5" maxlength="1000" ></textarea>
					                </div>



					        		<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-4 md:px-12 md:py-2 lg:px-12 text-xs md:text-base lg:text-base float-right mr-2 lg:mr-16 mt-2 mb-4 rounded">Submit Review</button>
					        	</form>
							</div>
						</div>
					</div>
				</div>

		</div>
	</section>

	<div class="bg-gray-700 h-16 mt-56"></div>
</x-app-layout>

@if(old('addDiv2') == 'addDiv2')

    <script>
        $(window).load(function(){
            $('#add-eduction-form').show();
        });
    </script>

@endif 


{{-- @section('custom_css') --}}

<script>
$( function() {
	$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
	$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
} );
</script>





