<x-app-layout>
    <x-slot name="title">
        Got Work | Setting
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting') }}
        </h2>
    </x-slot>



  	<section class="relative py-16">

        {{-- <div class="grid grid-cols-4 gap-4 px-16"> --}}

        	{{-- <div class="col-span-1 bg-white"> --}}

	        	{{-- <div class="px-4 py-2 text-base hover:bg-blue-300 hover:text-white cursor-pointer border-b-2 border-gray-300">
	               <p> <span> Experience </span> </p> 
	            </div>

	            <div class="px-4 py-2 text-base hover:bg-blue-300 hover:text-white cursor-pointer border-b-2 border-gray-300">
	               <p> <span> Education </span> </p> 
	            </div> --}}



        	{{-- </div> --}}

        	{{-- <div class="col-span-3 bg-white pt-10"> --}}

        		{{-- <div class="heading px-16 pb-10 border-b border-gray-300">
        			<h1 class="text-3xl font-bold"> Personal Information </h1>    			
        		</div>


        		<div class="px-16 py-10 border-b border-gray-300 text-base">
        			<h1 class="text-xl font-bold"> Username </h1>    			
                    <input type="text" autofocus id="username" value="{{$user->name}}" class="rounded-sm mt-3 focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
                </div> --}}


                {{-- <h1 class="text-xl font-bold px-16 py-10 border-b border-gray-300 text-base"> Experience 
               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Add Experience</button>
        		</h1>

        		@include('layouts.setting.experience') --}}
                

               {{--  <h1 class="text-xl font-bold px-16 py-10 border-b border-gray-300 text-base"> Qualifications 
               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Add Qualifications</button>
        		</h1>

        		@include('layouts.setting.qualification') --}}

               

        	{{-- </div> --}}

        {{-- </div> --}}


<div id="tabs" class="md:px-16 lg:px-16 lg:text-xl">

	<div class="grid grid-cols-4 gap-4">

			<div class="col-span-1 bg-white h-content">
				<div class="abc">	
					<ul class="w_ful">
						<li><a href="#tabs-1">Personal Information</a></li>
						<li><a href="#tabs-2">Experience</a></li>
						<li><a href="#tabs-3">Qualification</a></li>
						<li><a href="#tabs-4">Education</a></li>
					</ul>
				</div>
			</div>

			<div class="col-span-3 bg-white">
				<div class="tab-contentss">
					
					{{-- ============================ tab-1 of personal information ============================ --}}
					
					<div id="tabs-1">
						<div class="heading px-16 py-10 border-b border-gray-300">
	        				<h1 class="text-3xl font-bold"> Personal Information </h1>    			
		        		</div>

		        		<div class="px-16 py-10 border-b border-gray-300 text-base">
		        			<h1 class="text-xl font-bold"> Username </h1>    			
		                    <input type="text" autofocus id="username" value="{{$user->name}}" class="rounded-sm mt-3 focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
		                </div>

		                <div class="px-16 py-10 border-b border-gray-300 text-base">
		        			<h1 class="text-xl font-bold"> Email </h1>    			
		                    <input type="text" autofocus id="username" value="{{$user->email}}" class="rounded-sm mt-3 focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
		                </div>

					</div>

					{{-- ============================ tab-2 of Experience ============================ --}}


					<div id="tabs-2">
						<h1 class="text-xl font-bold px-16 py-10 border-b border-gray-300 text-base"> Experience 
		               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Add Experience</button>
		        		</h1>

		        		@include('layouts.setting.experience')
					</div>

					{{-- ============================ tab-3 of Qualification============================ --}}

					<div id="tabs-3">

					 <h1 class="text-xl font-bold px-16 py-10 border-b border-gray-300 text-base"> Qualifications 
	               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Add Qualifications</button>
	        		</h1>

	        		@include('layouts.setting.qualification')

					</div>

					{{-- ============================ tab-4 of education============================ --}}


					<div id="tabs-4">

					 <h1 class="text-xl font-bold px-16 py-10 border-b border-gray-300 text-base"> Education 
	               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Add Education</button>
	        		</h1>

	        		@include('layouts.setting.education')

					</div>

					{{-- ============================ tab-4 of education============================ --}}


				</div>
			</div>
		</div>

</div>





</section>


</x-app-layout>


{{-- @section('custom_css') --}}

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<style>
	.ui-tabs-vertical .ui-tabs-nav { padding: .2em .1em .2em .2em; float: left; width: 12em; }
	.ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
	.ui-tabs-vertical .ui-tabs-nav li a { display:block; }
	.ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
	.ui-tabs-vertical .ui-tabs-panel { padding: 0px !important;}
	#tabs{padding-right: 4rem !important; padding-left: 4rem !important;background: #f3f4f6 !important ; border: none;}
	.ui-tabs-tab{background: white !important}
	.w_ful{width: 100% !important;}
	.ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active{background:#3b82f6 !important }
	.ui-tabs-tab , .ui-widget-header {border:none !important;}
</style>

<script>
$( function() {
	$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
	$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
} );
</script>