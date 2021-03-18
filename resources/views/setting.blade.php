<x-app-layout>
    <x-slot name="title">
        Got Work | Setting
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting') }}
        </h2>
    </x-slot>



  	<section class="relative py-16 lg:px-16 md:px-8 sm:px-2">

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


                {{-- <h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Experience 
               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Add Experience</button>
        		</h1>

        		@include('layouts.setting.experience') --}}
                

               {{--  <h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Qualifications 
               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Add Qualifications</button>
        		</h1>

        		@include('layouts.setting.qualification') --}}

               

        	{{-- </div> --}}

        {{-- </div> --}}


<div id="tabs" class="lg:text-xl">

	<div class="grid grid-cols-4 gap-4">

			<div class="lg:col-span-1 md:col-span-1 sm:col-span-4 col-span-4 bg-white h-content shadow-xl rounded-xl">
				<div class="abc">	
					<ul class="w_ful">
						<li><a href="#tabs-1" class="w_full">Personal Information</a></li>
						<li><a href="#tabs-2" class="w_full">Experience</a></li>
						<li><a href="#tabs-3" class="w_full">Qualification</a></li>
						<li><a href="#tabs-4" class="w_full">Education</a></li>
						<li><a href="#tabs-5" class="w_full">Skills</a></li>
					</ul>
				</div>
			</div>

			<div class="lg:col-span-3 md:col-span-3 sm:col-span-4 col-span-4 bg-white shadow-xl rounded-xl">
				<div class="tab-contentss">
					
					{{-- ============================ tab-1 of personal information ============================ --}}
					
					<div id="tabs-1">
						<div class="heading lg:px-16 md:px-8 sm:px-2 px-2 lg:py-10 md:py-5 sm:py-2 py-2 border-b border-gray-300">
	        				<h1 class="lg:text-3xl md:text-xl sm:text-xl font-bold"> Personal Information </h1>    			
		        		</div>

		        		@if ($errors->any())
					      	<div class="mt-2 ml-16 mr-16 bg-red-100 border border-red-400 text-red-700 lg:px-16 md:px-8 sm:px-2 px-2  lg:py-10 md:py-5 sm:p-2 py-2 rounded relative" role="alert">
							  	<strong class="font-bold">Whoops!</strong>
							  	<span class="block sm:inline">Something went wrong.</span>
							  	<ul>
						            @foreach ($errors->all() as $error)
						              <li >{{ $error }}</li>
						            @endforeach
						       	</ul>
							  	<span class="absolute top-0 bottom-0 right-0 px-4 py-3">
							    	<svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
							  	</span>
							</div>
					    @endif



		        		<form action="{{route('personal-info.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        	<input type="hidden" name="user_id" value="Auth::user()->id" />

			        		<div class="lg:px-16 md:px-8 sm:px-2 px-2  lg:py-10 md:py-5 sm:p-2 py-2 border-b border-gray-300 text-base">
			        			<h1 class="lg:text-xl md:text-base sm:text-sm text-sm font-bold"> Profile Image </h1>    			
			                    <input type="file" autofocus id="profile-img" class="rounded-sm mt-3 focus:outline-none lg:text-sm md:text-sm text-xs bg-gray-100 w-full" placeholder="Profile Image" accept="image/x-png,image/gif,image/jpeg"/>

			                    <img src="" id="profile-img-tag" width="150px" class="mt-2" />
			                </div>

			        		<div class="lg:px-16 md:px-8 sm:px-2 px-2  lg:py-10 md:py-5 sm:p-2 py-2 border-b border-gray-300 text-base">
			        			<h1 class="lg:text-xl md:text-base sm:text-sm text-sm font-bold"> Name </h1>    			
			                    <input type="text" autofocus id="name" name="name" value="{{$user->name}}" class="rounded-sm mt-3 focus:outline-none lg:text-sm md:text-sm text-xs bg-gray-100 w-full" placeholder="Name" maxlength="191" />
			                </div>

			                <div class="lg:px-16 md:px-8 sm:px-2 px-2  lg:py-10 md:py-5 sm:p-2 py-2 border-b border-gray-300 text-base">
			        			<h1 class="lg:text-xl md:text-base sm:text-sm text-sm font-bold"> Email </h1>    			
			                    <input type="text" autofocus id="email" name="email" value="{{$user->email}}" class="rounded-sm mt-3 focus:outline-none lg:text-sm md:text-sm text-xs bg-gray-100 w-full" placeholder="Username" maxlength="191" />
			                </div>

			                <div class="lg:px-16 md:px-8 sm:px-2 px-2  lg:py-10 md:py-5 sm:p-2 py-2 border-b border-gray-300 text-base">
			        			<h1 class="lg:text-xl md:text-base sm:text-sm text-sm font-bold"> Description </h1>    			
			                    <textarea autofocus id="description" name="description" class="rounded-sm mt-3 focus:outline-none lg:text-sm md:text-sm text-xs bg-gray-100 w-full" placeholder="Description" rows="5" maxlength="1000" > {!! $user->description !!} </textarea>
			                </div>



			        		<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 md:px-12 lg:px-12 text-xs md:text-base lg:text-base float-right mr-2 lg:mr-16 mt-2 mb-4 rounded">Update Profile</button>
			                
			        	</form>

					</div>

					{{-- ============================ tab-2 of Experience ============================ --}}


					<div id="tabs-2">
						<h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Experience 
		               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs fontSize float-right">Add Experience</button>
		        		</h1>

		        		@include('layouts.setting.experience')
					</div>

					{{-- ============================ tab-3 of Qualification============================ --}}

					<div id="tabs-3">

					 <h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Qualifications 
	               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs fontSize float-right">Add Qualifications</button>
	        		</h1>

	        		@include('layouts.setting.qualification')

					</div>

					{{-- ============================ tab-4 of education============================ --}}


					<div id="tabs-4">

					 <h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Education 
	               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs fontSize float-right">Add Education</button>
	        		</h1>

	        		@include('layouts.setting.education')

					</div>

					{{-- ============================ tab-4 of User Skill ============================ --}}

					<div id="tabs-5">

					 <h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Skills 
	               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs fontSize float-right">Add Skill</button>
	        		</h1>

	        		@include('layouts.setting.userSkills')

					</div>

					{{-- ============================ tab-4 of end============================ --}}


				</div>
			</div>
		</div>

</div>



</section>


</x-app-layout>


{{-- @section('custom_css') --}}

<script>
$( function() {
	$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
	$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
} );



$(document).ready(function(){
    $('.country_select').on('change' , function(){
    	var formData = $('.country_form').serializeArray();
    	console.log(formData);
	   	$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

	    $.ajax({
	          type: 'GET',
	          url: '/ajax/universities',
	          data: formData,
	            success: function(data){
	              // $('.interviewLoader').prop('disabled',false);
	              $('.universityDiv').html(data);
	              $('.universityInput').addClass('hidden');
	            }
	      });

	    })





});


</script>


<script type="text/javascript">
	// Start: Preview Profile Image
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
    // End: Preview Profile Image

</script>