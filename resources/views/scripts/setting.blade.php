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
	$(document).on('click', '.ui-tabs-tab', function(){ 
		$('.alert').remove();
	});
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
					var qualification_html = '<div id="add-qualification-main'+count+'">  <div class="grid grid-cols-12 gap-4"><h1 class="col-span-11 text-base mt-10 font-bold"> Add Qualification </h1> <button type="button" name="remove" id="'+count+'" class="alert-delete btn btn-danger btn_remove text-red-600 bg-red-100 mt-2">X</button> </div> <form id="form-store-qualification" action="{{ route('personal-qualification.store') }}" method="POST"> @csrf <div class="grid grid-cols-4 gap-4 border-b border-gray-300 text-base"> <div class="col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Professional Certificate or Award</label> <input type="text" name="professional_certificate" autofocus id="title"  class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Enter Professional Certificate or Award" /> </div> <span id="professional-certificate-error" class="text-red-600"></span> </div> <div class="col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Conferring Organization</label> <input type="text" name="conferring_organization" autofocus id="conferring_organization" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Enter conferring organization" /> </div> <span id="conferring-organization-error" class="text-red-600"></span> </div> <div class="col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Sumamry</label> <textarea name="summary" type="text" autofocus id="summary" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Describe your qualification"> </textarea> </div> <span id="summary-error" class="text-red-600"></span> </div> <div class="col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Start Year</label> <select name="start_year" class = "text-sm w-full" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full"> <option value=" "> Select Year </option> @for ($x=date("Y"); $x>1900; $x--) <option value="{{$x}}"> {{$x}} </option> @endfor </select> <span id="start-year-error" class="text-red-600"></span> </div> </div>  <div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red"> <div class="my-7 text-sm"> <button id="btn-store-qualification" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 md:px-12 text-xs md:text-base lg:text-base mb-4 rounded">Store Qualification</button> </div> </div>  </div> </form> </div>';
	    		 
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
				$('#conferring-organization-error').text(' ');
				$('#summary-error').text(' ');
				$('#start-year-error').text(' ');
		    	
		        var formData = $('#form-store-qualification').serializeArray();

		        var route = $('#form-store-qualification').attr('action');

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
		                  	if (error.professional_certificate) {
		                  		$('#professional-certificate-error').text(error.professional_certificate[0]);
							}

							if (error.conferring_organization) {
								$('#conferring-organization-error').text(error.conferring_organization[0]);
							}

							if (error.summary) {
								$('#summary-error').text(error.summary[0]);
							}

							if (error.start_year) {
								$('#start-year-error').text(error.start_year[0]);
							}
		                  }
		                  
		                },
		         });
	        });
		/* End: Qualification Tab */ 


		/* Start: Education Tab */
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
		/* End: Education Tab */


		/* Start: Experience Tab */
			var count_experience = 1;
			$('#add-experience-button').click(function(){  
				console.log('clicked add more');

				if (count_experience < 2) {
			   		count_experience++;
					
					var html_experience = '<div id="add-experience-main'+count_experience+'">  <div class="grid grid-cols-12 gap-4"><h1 class="col-span-11 text-base mt-10 font-bold"> Add Experience </h1> <button type="button" name="remove" id="'+count_experience+'" class="alert-delete btn btn-danger btn_remove text-red-600 bg-red-100 mt-2">X</button> </div> <form id="store-experience-form" action="{{ route('personal-experience.store') }}" method="POST"> <div class="grid grid-cols-4 gap-4 border-b border-gray-300 text-base">  <div class="lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4 bg-red"> <div class="my-2 text-sm"><label for="title" class="block text-black font-semibold">Title</label><input name="title" type="text" autofocus id="title" value="{{old("title")}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Enter experience title" /> </div> <span id="title-error" class="text-red-600"></span> </div>    <div class="lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4 bg-red"> <div class="my-2 text-sm"><label for="company" class="block text-black font-semibold">Company</label><input name="company_name" type="text" autofocus id="company" value="{{old("company_name")}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Enter company name" /> </div> <span id="company_name-error" class="text-red-600"></span></div>               <div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red">  <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Start Month</label> <select name="start_month" class = "text-sm w-full"><option @if(old("start_month")) {{ "selected" }} @endif >January</option><option @if(old("start_month") ) {{ "selected" }} @endif >February</option><option @if(old("start_month") ) {{ "selected" }} @endif>March</option><option @if(old("start_month") ) {{ "selected" }} @endif>April</option><option @if(old("start_month")) {{ "selected" }} @endif>May</option><option @if(old("start_month") ) {{ "selected" }} @endif>June</option><option @if(old("start_month") ) {{ "selected" }} @endif>July</option><option @if(old("start_month")) {{ "selected" }} @endif>August</option><option @if(old("start_month") ) {{ "selected" }} @endif>September</option><option @if(old("start_month") ) {{ "selected" }} @endif>October</option> <option @if(old("start_month") ) {{ "selected" }} @endif>November</option><option @if(old("start_month") ) {{ "selected" }} @endif>December</option> </select> </div> <span id="start_month-error" class="text-red-600"></span> </div>                  <div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">Start Year</label> <select name="start_year" class = "text-sm w-full"> @for ($x=date("Y"); $x>1900; $x--) <option @if( old("start_year")) {{ "selected" }} @endif  value="{{$x}}"> {{$x}} </option> @endfor </select> </div> <span id="start_year-error" class="text-red-600"></span> </div>                 <div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">End Month</label> <select id="end_month-1" name="end_month" class = "text-sm w-full"><option @if(old("end_month") ) {{ "selected" }} @endif>January</option><option @if(old("end_month") ) {{ "selected" }} @endif>February</option><option @if(old("end_month") ) {{ "selected" }} @endif>March</option><option @if(old("end_month") ) {{ "selected" }} @endif>April</option><option  @if(old("end_month") ) {{ "selected" }} @endif>May</option><option @if(old("end_month") ) {{ "selected" }} @endif>June</option><option @if(old("end_month") ) {{ "selected" }} @endif>July</option><option @if(old("end_month") ) {{ "selected" }} @endif>August</option><option @if(old("end_month") ) {{ "selected" }} @endif>September</option><option @if(old("end_month") ) {{ "selected" }} @endif>October</option><option @if(old("end_month") ) {{ "selected" }} @endif>November</option><option @if(old("end_month") ) {{ "selected" }} @endif>December</option> </select> </div> <span id="start_year-error" class="text-red-600"></span> </div>           <div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red"> <div class="my-2 text-sm"> <label for="title" class="block text-black font-semibold">End Year</label> <select id="end_year-1" name="end_year" class = "text-sm w-full"> @for ($x=date("Y"); $x>1900; $x--) <option @if(old("start_year")) {{ "selected" }} @endif value="{{$x}}"> {{$x}} </option> @endfor</select> <span id="end_year-error" class="text-red-600"></span> </div>  <span id="end_year-error" class="text-red-600"></span> </div>             <div class="col-span-4 bg-red"> <input id="iscurrent-1" class="is-current" type="checkbox" name="is_current" @if(old("is_current") == "on") {{ "selected" }} @endif> I am currently working here </div> <span id="is_current-error" class="text-red-600"></span> <div class="col-span-4 bg-red"> <div class="mt-2 mb-10 text-sm"> <label for="title" class="block text-black font-semibold">Summary</label> <textarea autofocus id="title" name="summary" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Enter experience summary">{{old("summary")}}</textarea> <span id="summary-error" class="text-red-600"></span> </div>  </div> <div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red"> <div class="my-7 text-sm"> <button type="submit" class="md:w-60 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 md:px-12 text-xs md:text-base lg:text-base mb-4 rounded">Store Experience</button> </div> </div>                 </div> </form> </div>';     
	    		 
	    		 	$('#add-experience-form').append(html_experience);
				}

			});

			$(document).on('click', '.btn_remove', function(){ 

				if (count_experience > 1) {
					count_experience--;
					var button_id = $(this).attr("id");   
			   		$('#add-experience-main'+button_id+'').remove();
				} 
			   	  
			});  


			$('body').on('submit', '#store-experience-form' , function(e){
		    	e.preventDefault();

		    	$('#title-error').text(' ');
				$('#company_name-error').text(' ');
				$('#start_month-error').text(' ');
				$('#start-year-error').text(' ');
				$('#end_month-error').text(' ');
				$('#end_year-error').text(' ');
				$('#is_current-error').text(' ');
		    	


		        var formData = $('#store-experience-form').serializeArray();

		        var route = $('#store-experience-form').attr('action');

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
							  title: 'Your experience has been added',
							  showConfirmButton: false,
							  timer: 1500
							});

		                  	location.reload();
		                  	
		                  }
		                  
		                  error = response.Error;
		                  if (error) {
		                  	if (error.title) {
		                  		$('#title-error').text(error.title[0]);
							}

							if (error.company_name) {
								$('#company_name-error').text(error.company_name[0]);
							}

							if (error.start_month) {
								$('#start_month-error').text(error.start_month[0]);
							}

							if (error.start_year) {
								$('#start-year-error').text(error.start_year[0]);
							}

							if (error.end_month) {
								$('#end_month-error').text(error.end_month[0]);
							}

							if (error.end_year) {
								$('#end_month-error').text(error.end_month[0]);
							}

							if (error.is_current) {
								$('#is_current-error').text(error.is_current[0]);
							}

							if (error.summary) {
								$('#summary-error').text(error.summary[0]);
							}

		                  }
		                  
		                },
		         });
	        });


	        $('body').click('.is-current' , function(event){
		        var id = event.target.id;

		        var integer_part = id.split("-")[1];
		        
		        if(!$('#'+id).is(':checked')) {
		            $('#end_month-'+integer_part).prop("disabled", false);
		            $('#end_year-'+integer_part).prop("disabled", false);
		        }else if($('#'+id).is(':checked')) {
		            $('#end_month-'+integer_part).prop("disabled", true);
		            $('#end_year-'+integer_part).prop("disabled", true);
		        }
		    });
		/* End: Experience Tab */ 
		
    });  
</script>

