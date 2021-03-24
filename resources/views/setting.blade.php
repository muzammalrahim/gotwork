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
						<li><a href="#tabs-1" class="w_full" onclick="appendTabUrl('#tabs-1')">Personal Information</a></li>
						<li><a href="#tabs-2" class="w_full" onclick="appendTabUrl('#tabs-2')">Experience</a></li>
						<li><a href="#tabs-3" class="w_full" onclick="appendTabUrl('#tabs-3')">Qualification</a></li>
						<li><a href="#tabs-4" class="w_full" onclick="appendTabUrl('#tabs-4')">Education</a></li>
						<li><a href="#tabs-5" class="w_full" onclick="appendTabUrl('#tabs-5')">Skills</a></li>
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

		        		<!-- Start: Alert Messages -->
		        		@include('layouts.alerts')
		        		<!-- End: Alert Messages -->

		        		<form action="{{route('personal-info.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf

			        		<div class="lg:px-16 md:px-8 sm:px-2 px-2  lg:py-10 md:py-5 sm:p-2 py-2 border-b border-gray-300 text-base">
			        			<h1 class="lg:text-xl md:text-base sm:text-sm text-sm font-bold"> Profile Image </h1>    			
			                    <input type="file" autofocus id="profile-img" name="profile_photo" class="rounded-sm mt-3 focus:outline-none lg:text-sm md:text-sm text-xs bg-gray-100 w-full" placeholder="Profile Image" accept="image/x-png,image/gif,image/jpeg"/>

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
						<!-- Start: Alert Messages -->
							@include('layouts.alerts') 
						<!-- End: Alert Messages -->
						<h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Qualifications 
	 	               		<button id="add-qualification-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs fontSize float-right">Add Qualifications</button>
	 	               	</h1>
	               	
	               

	        		@include('layouts.setting.qualification')

					</div>

					{{-- ============================ tab-4 of education============================ --}}


					<div id="tabs-4">
						<!-- Start: Alert Messages -->
							@include('layouts.alerts') 
						<!-- End: Alert Messages -->
					 <h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Education 
	               		<button id="add-eduction-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs fontSize float-right">Add Education</button>
	        		</h1>

	        		@include('layouts.setting.education')

					</div>

					{{-- ============================ tab-5 of User Skill ============================ --}}

					<div id="tabs-5">

						<!-- Start: Alert Messages -->
							{{-- @include('layouts.alerts') --}}
						<!-- End: Alert Messages -->

					 	<h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Skills 
	               		{{--
	               			<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs fontSize float-right">Add Skill</button>
	               		--}}
	        			</h1>

	        		@include('layouts.setting.user_skills')

					</div>

					{{-- ============================ tab-4 of end============================ --}}


				</div>
			</div>
		</div>

</div>



</section>


</x-app-layout>

@if(old('addDiv2') == 'addDiv2')

    <script>
        $(window).load(function(){
            $('#add-eduction-form').show();
        });
    </script>

@endif 


{{-- @section('custom_css') --}}


<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
$( function() {
	$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
	$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
} );
</script>

<script>

	function getUniversities(obj,loop_iteration) {
    	event.preventDefault();

      	obj = $(obj).val();
      	var route = '/ajax/universities/'+obj;

	    $.get(route,function(data)
	    {
	        $('.universityDiv-'+loop_iteration).html(data);
	        $('.universityInput').addClass('hidden');
	    });
    }
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


<script type="text/javascript">
	function appendTabUrl(tab) {
		window.history.pushState('page2', 'Title', '/setting'+tab);
	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
	  $("#load_limit").delay(5000).slideUp(600);
	});
</script>


<script type="text/javascript">
    $(document).ready(function(){   
    	console.log('doc ready');   
		var postURL = "<?php echo url('addmore'); ?>";
		var i=1;  

		/* Start: Qualification Tab */
			var count=1;
			$('#add-qualification-button').click(function(){  
				console.log('clicked add more');

				if (count < 2) {
			   		count++;
					var qualification_html = '<div id="add-qualification-main'+count+'">  <div class="grid grid-cols-12 gap-4"><h1 class="col-span-11 text-base mt-10 font-bold"> Add Qualification </h1> <button type="button" name="remove" id="'+count+'" class="btn btn-danger btn_remove text-red-600 bg-red-100 mt-2">X</button> </div> <form id="form-store-qualification" action="{{ route('personal-qualification.store') }}" method="POST"> @csrf <div class="grid grid-cols-4 gap-4 border-b border-gray-300 text-base"> <div class="col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Professional Certificate or Award</label> <input type="text" name="professional_certificate" autofocus id="title"  class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Enter Professional Certificate or Award" /> </div> <span id="professional-certificate-error" class="text-red-600"></span> </div> <div class="col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Conferring Organization</label> <input type="text" name="conferring_organization" autofocus id="conferring_organization" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Enter conferring organization" /> </div> </div> <div class="col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Sumamry</label> <textarea name="summary" type="text" autofocus id="summary" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Describe your qualification"> </textarea> </div> </div> <div class="col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Start Year</label> <select name="start_year" class = "text-sm w-full" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full"> <option value=" "> Select Year </option> @for ($x=date("Y"); $x>1900; $x--) <option value="{{$x}}"> {{$x}} </option> @endfor </select> </div> </div>  <div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red"> <div class="my-7 text-sm"> <button id="btn-store-qualification" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 md:px-12 text-xs md:text-base lg:text-base mb-4 rounded">Store Qualification</button> </div> </div>  </div> </form> </div>';
	    		 
	    		 	$('#add-qualification-form').append(qualification_html);
				}

			});

			$(document).on('click', '.btn_remove', function(){ 

				if (count > 1) {
					count--;
					var button_id = $(this).attr("id");   
			   		$('#add-qualification-main'+button_id+'').remove();
				} 
			   	  
			});  


			$('body').on('submit', '#form-store-qualification' , function(e){
		    	e.preventDefault();

		    	$('#professional-certificate-error').text(' ');
				$('#university-error').text(' ');
				$('#degree-error').text(' ');
				$('#start-year-error').text(' ');
				$('#end-year-error').text(' ');
		    	
		        var formData = $('#form-store-education').serializeArray();

		        var route = $('#form-store-education').attr('action');

		        console.log(route);
		        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		        $.ajax({
		              type: 'POST',
		              url: route,
		              data: formData,
		                success: function(response){

		                  success = response.msg;
		                  
		                  if (success == "Success") {
		                  	Swal.fire({
							  icon: 'success',
							  title: 'Your education has been added',
							  showConfirmButton: false,
							  timer: 1500
							});

		                  	location.reload();
		                  	
		                  }
		                  
		                  error = response.Error;
		                  if (error) {
		                  	if (error.country_id) {
		                  		$('#country-error').text(error.country_id[0]);
							}

							if (error.university_id) {
								$('#university-error').text(error.university_id[0]);
							}

							if (error.degree) {
								$('#degree-error').text(error.degree[0]);
							}

							if (error.start_year) {
								$('#start-year-error').text(error.start_year[0]);
							}

							if (error.end_year) {
								$('#end-year-error').text(error.end_year[0]);
							}
		                  }
		                  
		                },
		         });
	        });
		/* End: Qualification Tab */ 


		$('#add-eduction-button').click(function(){  
			console.log('clicked add more');
		    

		   	if (i<2) {
		   		i++;

		   		var html = '<div id="add-education-main'+i+'">  <div class="grid grid-cols-12 gap-4"><h1 class="col-span-11 text-base mt-10 font-bold"> Add Education </h1> <button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove text-red-600 bg-red-100 mt-2">X</button> </div> <form id="form-store-education" action="{{ route('personal-education.store') }}" method="POST"> <div class="grid grid-cols-4 gap-4 border-b border-gray-300 text-base"> @csrf <div class="lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Country</label> <div class="country_form" name="countries"> <select id="country_id" name="country_id" class = "country_select rounded-sm focus:outline-none text-sm bg-gray-100 w-full" onclick="getUniversities(this,'+0+')" > <option value=" ">Select Country</option> @foreach($countries as $country) <option value="{{ $country->id }}" >{{ $country->name }}</option> @endforeach </select> </div> <span id="country-error" class="text-red-600"></span> </div></div>  <div class="lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4 bg-red"> <div class="my-2 text-sm"><label for="university" class="block text-black font-semibold">University/College</label><input type="text" autofocus id="university" class="universityInput rounded-sm focus:outline-none text-sm bg-gray-100 w-full" readonly="true" placeholder="Please select your college or university" /><div class="universityDiv-0"></div> <span id="university-error" class="text-red-600"></span> </div>  </div>  <div class="col-span-4 bg-red"> <div class="my-2 text-sm"><label for="title" class="block text-black font-semibold">Degree</label><input type="text" name="degree" autofocus id="title" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Enter your degree"/> <span id="degree-error" class="text-red-600"></span> </div></div> <div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Start Year</label> <select name="start_year" class = "text-sm w-full"> <option value=" "> Select Year </option> @for ($x=date("Y"); $x>1900; $x--) <option value="{{$x}}"> {{$x}} </option> @endfor </select> <span id="start-year-error" class="text-red-600"></span> </div> </div>  <div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">End Year</label> <select name="end_year" class = "text-sm w-full"> <option value=" "> Select Year </option> @for ($x=date("Y"); $x>1900; $x--) <option value="{{$x}}"> {{$x}} </option> @endfor </select> <span id="end-year-error" class="text-red-600"></span> </div> </div> <div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red"> <div class="my-7 text-sm"> <button id="btn-store-education" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 md:px-12 text-xs md:text-base lg:text-base mb-4 rounded" >Store Education</button> </div></div>  </div> </form> </div>';

		   		$('#add-eduction-form').append(html);
		   }

		     
		});  


		$(document).on('click', '.btn_remove', function(){ 
			if (i > 1) {
				i--;
				var button_id = $(this).attr("id");   
		   		$('#add-education-main'+button_id+'').remove();
			} 
		   	  
		});  

		

		$('body').on('submit', '#form-store-education' , function(e){
	    	e.preventDefault();

	    	$('#country-error').text(' ');
			$('#university-error').text(' ');
			$('#degree-error').text(' ');
			$('#start-year-error').text(' ');
			$('#end-year-error').text(' ');
	    	
	        var formData = $('#form-store-education').serializeArray();

	        var route = $('#form-store-education').attr('action');

	        console.log(route);
	        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
	        $.ajax({
	              type: 'POST',
	              url: route,
	              data: formData,
	                success: function(response){

	                  success = response.msg;
	                  
	                  if (success == "Success") {
	                  	Swal.fire({
						  icon: 'success',
						  title: 'Your education has been added',
						  showConfirmButton: false,
						  timer: 1500
						});

	                  	location.reload();
	                  	
	                  }
	                  
	                  error = response.Error;
	                  if (error) {
	                  	if (error.country_id) {
	                  		$('#country-error').text(error.country_id[0]);
						}

						if (error.university_id) {
							$('#university-error').text(error.university_id[0]);
						}

						if (error.degree) {
							$('#degree-error').text(error.degree[0]);
						}

						if (error.start_year) {
							$('#start-year-error').text(error.start_year[0]);
						}

						if (error.end_year) {
							$('#end-year-error').text(error.end_year[0]);
						}
	                  }
	                  
	                },
	         });
        });
    });  
</script>


