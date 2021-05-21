<div class="lg:px-16 md:px-8 sm:px-4 px-4 border-b border-gray-300 text-base">
	<form action="{{ route('project.store') }}" method="POST">
		@csrf

		{{-- Start: Form hidden fields --}}
			
		{{-- End: Form hidden fields --}}


		<div class="grid grid-cols-4 gap-4 border-b border-gray-300 text-base">

			<div class="lg:col-span-4 md:col-span-4 sm:col-span-4 col-span-4 bg-red">
				<div class="my-2 text-sm">
	                <label for="title" class="block text-black font-semibold">Select project category</label>
	                <select name="category" class = "text-sm w-full">
	                	@foreach($categories as $category)
                    		<option value="{{$category->id}}" {{ (old('category') == $category->id)? 'selected':'' }} > {{$category->name}} </option>
                    	@endforeach
                    </select>
	            </div>
	        </div>

			<div class="lg:col-span-4 md:col-span-4 sm:col-span-4 col-span-4 bg-red">
				<div class="my-2 text-sm">
	                <label for="title" class="block text-black font-semibold">Enter title of the project</label>
	                <input name="title" type="text" autofocus id="title" value="{{ old('title') }}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="e.g. Build a website for me" />
	            </div>
			</div>

			<div class="lg:col-span-4 md:col-span-4 sm:col-span-4 col-span-4 bg-red">
				<div class="my-2 text-sm">
	                <label for="title" class="block text-black font-semibold">Enter slug</label>
	                <input name="slug" type="text" autofocus id="slug" value="{{ old('slug') }}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="e.g. build-a-website" />
	                <span class="red-text" id="slug-error" style=" color: red; "></span>
	            </div>
			</div>

			<div class="lg:col-span-4 md:col-span-4 sm:col-span-4 col-span-4 bg-red">
				<div class="my-2 text-sm">
	                <label for="title" class="block text-black font-semibold">Enter description about your project</label>
	                <textarea name="description" type="text" autofocus id="title" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Describe about the project..." rows="3"/>{{ old('description') }}</textarea>
	            </div>
	        </div>

	        <div class="lg:col-span-4 md:col-span-4 sm:col-span-4 col-span-4 bg-red">
				<div class="my-2 text-sm">
			        {{-- Start: Multi-select skills --}}
			        	@include('backend.projects.forms.fields.multiselect_skills')
			        {{-- End: Multi-select skills --}}
	        	</div>
	        </div>

	        <div class="lg:col-span-4 md:col-span-4 sm:col-span-4 col-span-4 bg-red">
				<div class="my-2 text-sm">
	                <label for="title" class="block text-black font-semibold">Choose how do you want to pay?</label>
	                <small class="lg:text-sm md:text-sm sm:text-sm text-xs bg-red"><strong>Fixed price:</strong> Hire a freelancer based on an agreed price and release the payment when the job gets done. Best for one-off tasks.</small>
	                <br>
	                <small class="lg:text-sm md:text-sm sm:text-sm text-xs bg-red"><strong>Hourly rate:</strong> Hire a freelancer based on an hourly rate and pay for hours billed. Best for ongoing work. </small>
	                <select name="project_type" class = "text-sm w-full mt-1 cursor-pointer">
	                	<option value=" "> Select pay type </option>
	                	@foreach($project_types as $project_type)
                    		<option value="{{$project_type->id}}" {{ (old('project_type') == $project_type->id)? 'selected':'' }} > {{$project_type->name}} </option>
                    	@endforeach
                    </select>
	            </div>
	        </div>

	        <div class="lg:col-span-4 md:col-span-4 sm:col-span-4 col-span-4 bg-red">
				<div class="my-2 text-sm -mb-3">
					<label for="title" class="block text-black font-semibold">Enter your estimated budget</label>
				</div>
	        </div>
	        
	        <div class="lg:col-span-1 md:col-span-1 sm:col-span-4 col-span-4 bg-red">
				<div class="my-2 text-sm">
	                <select name="currency" class = "text-sm w-full -mt-2 cursor-pointer">
	                	@foreach($currencies as $currency)
                    		<option value="{{$currency->id}}" {{($currency->name =='US Dollar' )?'selected':''}} {{ (old('currency') == $currency->id)? 'selected':'' }} > {{$currency->name}} </option>
                    	@endforeach
                    </select>
	            </div>
	        </div>

	        <div class="lg:col-span-1 md:col-span-1 sm:col-span-4 col-span-4 bg-red">
				<div class="my-2 text-sm">
	                <input name="min_amount" type="number" autofocus class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full -mt-2" placeholder="Minimum budget" min="1" max="999999" value="{{ old('min_amount') }}"/>
	            </div>
	        </div>

	        <div class="lg:col-span-1 md:col-span-1 sm:col-span-4 col-span-4 bg-red mb-6">
				<div class="my-2 text-sm">
	                <input name="max_amount" type="number" autofocus class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full -mt-2" placeholder="Maximum budget" value="{{ old('max_amount') }}"/>
	            </div>
	        </div>

	    	

		</div>
		
		<div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red">
            <div class="my-7 text-sm">
                <button type="submit" class="md:w-60 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 md:px-12 text-xs md:text-base lg:text-base mb-4 rounded">Post My Project</button>
            </div>
        </div>
		{{-- lg:col-span-2 md:col-span-2 sm:col-span-4 --}}

	</form>
</div>


<script>

	$(document).ready(function () {

		$('#title').blur(function()	{
			let slug = $('#title').val();
			
			$('#slug').val(slugify(slug, "-"));

			check_slug_in_db();
		})
		
		function slugify (text, separator = "-") {
		    return text
		        .toString()
		        .normalize('NFD')   // split an accented letter in the base letter and the acent
		        .replace(/[\u0300-\u036f]/g, '')   // remove all previously split accents
		        .toLowerCase()
		        .trim()
		        .replace(/[^a-z0-9 ]/g, '')   // remove all chars not letters, numbers and spaces (to be replaced)
		        .replace(/\s+/g, separator);
		};

		$('#slug').blur(function()	{ 
			check_slug_in_db()
		})

		function check_slug_in_db() {
			$('#slug-error').text('');

			let _token   = $('meta[name="csrf-token"]').attr('content');
			var slug = $('#slug').val();
			$.ajax({
				url: "/slug-check",
				type:"POST",
				data:{
					slug:slug,
					_token: _token
				},
				success:function(response) {
					if(response) {
						$('#slug-error').text(response.error);
					}
				},
			});
		}
	});
	

	
</script>