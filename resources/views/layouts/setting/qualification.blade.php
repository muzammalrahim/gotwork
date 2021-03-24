<div class="lg:px-16 md:px-8 sm:px-4 px-4 border-b border-gray-300 text-base">
    	@foreach ($user->qualifications as $qualif)

    		<div id="add-qualification-form"></div>

			<div class="grid grid-cols-12 gap-4">
				<h1 class="col-span-11 text-base mt-10 font-bold"> Qualification {{$loop->index+1}} </h1>
				<!-- Delete Button -->
				<a href="{{ route('personal-qualification.remove', ['id' => $qualif->id]) }}" class="mt-2 pt-3 cursor-pointer text-red-600 bg-red-100"> <span class="text-red-600 text-lg m-9">X</span> </a>
			</div>

			<!-- Start: Qualification Update Form -->
			<form action="{{ route('personal-qualification.update') }}" method="POST">
		  		@csrf

		  		<input type="hidden" name="qualification_id" value="{{ $qualif->id }}">

		  		<div class="grid grid-cols-4 gap-4 border-b border-gray-300 text-base">

					<div class="col-span-2 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="title" class="block text-black font-semibold">Professional Certificate or Award </label>
	                        <input type="text" name="professional_certificate" autofocus id="title" value="{{$qualif->professional_certificate}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
	                    </div>
    				</div>

    				<div class="col-span-2 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="title" class="block text-black font-semibold">Organization</label>
	                        <input type="text" name="conferring_organization" autofocus id="conferring_organization" value="{{$qualif->conferring_organization}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
	                    </div>
    				</div>

    				<div class="col-span-2 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="title" class="block text-black font-semibold">Sumamry</label>
	                        <textarea name="summary" type="text" autofocus id="summary" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username">{{$qualif->summary}}
	                        </textarea>
	                    </div>
    				</div>

    				<div class="col-span-2 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="title" class="block text-black font-semibold">Start Year</label>
	                        <select name="start_year" class = "text-sm w-full" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full">

	                            @if($qualif->start_year)
	                                <option value="{{$qualif->start_year}}"> {{$qualif->start_year}} </option>
	                            @else
	                                <option value=" "> Select Year </option>
	                            @endif
	                        	@for ($x=date("Y"); $x>1900; $x--)
	                        		<option value="{{$x}}"> {{$x}} </option>
	                    		@endfor	
	                        </select>

	                    </div>
    				</div>

    				<div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red">
	                    <div class="my-7 text-sm">
	                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 md:px-12 text-xs md:text-base lg:text-base mb-4 rounded">Update Qualification</button>
	                    </div>
	                </div>

    			</div>
    		</form>
    		<!-- End: Qualification Update Form -->
    	@endforeach
</div>