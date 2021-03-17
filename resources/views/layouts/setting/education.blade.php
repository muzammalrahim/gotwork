<div class="lg:px-16 md:px-8 sm:px-4 px-4 border-b border-gray-300 text-base">
    	{{-- @foreach ($user->Qualification as $qualif) --}}
    		<div class="grid grid-cols-12 gap-4">
					<h1 class="col-span-11 text-base mt-10 font-bold"> Education </h1>
					<i class="col-span-1 fa fa-edit text-base mt-10 font-bold"></i>
				</div>
		  			<div class="grid grid-cols-4 gap-4 border-b border-gray-300 text-base">

					<div class="lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4 bg-red">
    					<div class="my-2 text-sm">
	                    <label for="title" class="block text-black font-semibold">Country</label>
                        <form class="country_form" name="countries">
                            <select name="country_id" class = "country_select text-sm">
                                @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </form>


	                    </div>
    				</div>

    				<div class="lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="university" class="block text-black font-semibold">University/Colege</label>
	                        <input type="text" autofocus id="university" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full universityInput" readonly="true" placeholder="Please select your college or university" />

                            <div class="universityDiv">
                                
                            </div>
	                    </div>
    				</div>

    				<div class="col-span-4 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="title" class="block text-black font-semibold">Degree</label>
	                        <input type="text" autofocus id="title" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Enter your degree" />
	                    </div>
    				</div>

    				<div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red">
					<div class="my-2 text-sm">
                        <label for="title" class="block text-black font-semibold">Start Year</label>
                        <select name="start_year" class = "text-sm w-full">
                        	@for ($x=date("Y"); $x>1900; $x--)
                        			<option value="{{$x}}"> {{$x}} </option>
                    		@endfor	
                        </select>
                    </div>
				</div>

				<div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red">
					<div class="my-2 text-sm">
                        <label for="title" class="block text-black font-semibold">End Year</label>
                        <select name="start_year" class = "text-sm w-full">
                        	@for ($x=date("Y"); $x>1900; $x--)
                        			<option value="{{$x}}"> {{$x}} </option>
                    		@endfor	
                        </select>
                    </div>
				</div>

    			</div>
    	{{-- @endforeach --}}
</div>