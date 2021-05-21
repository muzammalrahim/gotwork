<x-app-layout>
    <x-slot name="title">
        Got Work | Post Project
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting') }}
        </h2>
    </x-slot>


  	<section class="relative py-16 lg:px-16 md:px-8 sm:px-2">


		<div id="tabs" class="lg:text-xl">

			<div class="grid grid-cols-4 gap-4">

					<div class="lg:col-span-1 md:col-span-1 sm:col-span-4 col-span-4 bg-white h-content shadow-xl rounded-xl">
						<div class="abc">	
							<ul class="w_ful">
								<li><a href="#tabs-1" class="w_full" onclick="appendTabUrl('#tabs-1')">Post Project</a></li>
							</ul>
						</div>
					</div>

					<div class="lg:col-span-3 md:col-span-3 sm:col-span-4 col-span-4 bg-white shadow-xl rounded-xl">
						<div class="tab-contentss">

							<!-- Start: Alert Messages -->
			        			@include('layouts.alerts')
			        		<!-- End: Alert Messages -->
							
							{{-- ============================ tab-1 of personal information ============================ --}}
							
							<div id="tabs-1">
								
				        		<h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Project Information 
				        		</h1>

				        		<!-- Start: Post Project Form -->
				        			@include('backend.projects.forms.post_project')
				        		<!-- End: Post Project Form -->
							</div>
						</div>
					</div>
				</div>

		</div>
	</section>

	<div class="bg-gray-700 h-16 mt-20"></div>
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





