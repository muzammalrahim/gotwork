<div class="lg:px-16 md:px-8 sm:px-4 px-4 border-b border-gray-300 text-base">

		@foreach ($experience as $exp)

            <div id="add-experience-form"></div>

			<div class="grid grid-cols-12 gap-4">
				<h1 class="col-span-11 text-base mt-10 font-bold"> Experience {{$loop->index+1}} </h1>
				
                <a href="{{ route('personal-experience.remove', ['id' => $exp->id]) }}" class="mt-2 pt-3 cursor-pointer text-red-600 bg-red-100" onclick="return confirm('Are you sure you want to delete this item?');"> <span class="text-red-600 text-lg m-9">X</span> </a>
			</div>

            <form action="{{ route('personal-experience.update') }}" method="POST">
            @csrf

                <input type="hidden" name="experience_id" value="{{ $exp->id }}">

	  			<div class="grid grid-cols-4 gap-4 border-b border-gray-300 text-base">

				<div class="lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4 bg-red">
					<div class="my-2 text-sm">
                        <label for="title" class="block text-black font-semibold">Title</label>
                        <input name="title" type="text" autofocus id="title" value="{{$exp->title}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
                    </div>
				</div>

				<div class="lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4 bg-red">
					<div class="my-2 text-sm">
                        <label for="company" class="block text-black font-semibold">Company</label>
                        <input name="company_name" type="text" autofocus id="company" value="{{$exp->company_name}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
                    </div>
				</div>

				<div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red">
					<div class="my-2 text-sm">
                        <label for="title" class="block text-black font-semibold">Start Month</label>
                        <select name="start_month" class = "text-sm w-full">
                        	<option {{$exp->start_month == 'January' ? 'selected' : '' }} >January</option>
                        	<option {{$exp->start_month == 'February' ? 'selected' : '' }} >February</option>
                        	<option {{$exp->start_month == 'March' ? 'selected' : '' }} >March</option>
                        	<option {{$exp->start_month == 'April' ? 'selected' : '' }} >April</option>
                        	<option {{$exp->start_month == 'May' ? 'selected' : '' }} >May</option>
                        	<option {{$exp->start_month == 'June' ? 'selected' : '' }} >June</option>
                        	<option {{$exp->start_month == 'July' ? 'selected' : '' }} >July</option>
                        	<option {{$exp->start_month == 'August' ? 'selected' : '' }} >August</option>
                        	<option {{$exp->start_month == 'September' ? 'selected' : '' }} >September</option>
                        	<option {{$exp->start_month == 'October' ? 'selected' : '' }} >October</option>
                        	<option {{$exp->start_month == 'November' ? 'selected' : '' }} >November</option>
                        	<option {{$exp->start_month == 'December' ? 'selected' : '' }} >December</option>
                        </select>
                       
                    </div>
				</div>

				<div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red">
					<div class="my-2 text-sm">
                        <label for="title" class="block text-black font-semibold">Start Year</label>
                        <select name="start_year" class = "text-sm w-full">
                        	@for ($x=date("Y"); $x>1900; $x--)
                        			<option {{$exp->start_year == $x ? 'selected' : '' }} value="{{$x}}"> {{$x}} </option>
                    		@endfor	
                        </select>
                    </div>
				</div>

				

				<div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red">
					<div class="my-2 text-sm">
                        <label for="title" class="block text-black font-semibold">End Month</label>

                        <select id="end_month-{{$exp->id}}" name="end_month" class = "text-sm w-full" {{ ($exp->is_current == "Yes")?'disabled':'' }}>
                        	<option {{$exp->end_month == 'January' ? 'selected' : '' }} >January</option>
                        	<option {{$exp->end_month == 'February' ? 'selected' : '' }} >February</option>
                        	<option {{$exp->end_month == 'March' ? 'selected' : '' }} >March</option>
                        	<option {{$exp->end_month == 'April' ? 'selected' : '' }} >April</option>
                        	<option {{$exp->end_month == 'May' ? 'selected' : '' }} >May</option>
                        	<option {{$exp->end_month == 'June' ? 'selected' : '' }} >June</option>
                        	<option {{$exp->end_month == 'July' ? 'selected' : '' }} >July</option>
                        	<option {{$exp->end_month == 'August' ? 'selected' : '' }} >August</option>
                        	<option {{$exp->end_month == 'September' ? 'selected' : '' }} >September</option>
                        	<option {{$exp->end_month == 'October' ? 'selected' : '' }} >October</option>
                        	<option {{$exp->end_month == 'November' ? 'selected' : '' }} >November</option>
                        	<option {{$exp->end_month == 'December' ? 'selected' : '' }} >December</option>
                        </select>
                       
                    </div>
				</div>

				<div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red">
					<div class="my-2 text-sm">
                        <label for="title" class="block text-black font-semibold">End Year</label>
                        <select id="end_year-{{$exp->id}}" name="end_year" class = "text-sm w-full" {{ ($exp->is_current == "Yes")?'disabled':'' }}>
                        	@for ($x=date("Y"); $x>1900; $x--)
                        			<option {{$exp->end_year == $x ? 'selected' : '' }} value="{{$x}}"> {{$x}} </option>
                    		@endfor	
                        </select>
                    </div>
				</div>

				<div class="col-span-4 bg-red">
					<input id="iscurrent-{{$exp->id}}" class="is-current" type="checkbox" name="is_current"  {{ ($exp->is_current == "Yes")?'checked':'' }}> I am currently working here
				</div>

				<div class="col-span-4 bg-red">
					<div class="mt-2 mb-10 text-sm">
                        <label for="title" class="block text-black font-semibold">Summary</label>
                        <textarea autofocus id="title" name="summary" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Enter experience summary">{{$exp->summary}}</textarea>
                    </div>
				</div>

                <div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red">
                    <div class="my-7 text-sm">
                        <button type="submit" class="md:w-60 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 md:px-12 text-xs md:text-base lg:text-base mb-4 rounded">Update Experience</button>
                    </div>
                </div>
			</div>
        </form>	

		@endforeach
    
</div>

