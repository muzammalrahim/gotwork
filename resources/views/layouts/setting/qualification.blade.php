<div class="lg:px-16 md:px-8 sm:px-4 px-4 border-b border-gray-300 text-base">
    	@foreach ($user->qualifications as $qualif)
    		<div class="grid grid-cols-12 gap-4">
					<h1 class="col-span-11 text-base mt-10 font-bold"> Qualification {{$loop->index+1}} </h1>
					<i class="col-span-1 fa fa-edit text-base mt-10 font-bold"></i>
				</div>
		  			<div class="grid grid-cols-4 gap-4 border-b border-gray-300 text-base">

					<div class="col-span-2 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="title" class="block text-black font-semibold">Title</label>
	                        <input type="text" autofocus id="title" value="{{$qualif->professional_certificate}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
	                    </div>
    				</div>

    				<div class="col-span-2 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="title" class="block text-black font-semibold">Organization</label>
	                        <input type="text" autofocus id="title" value="{{$qualif->conferring_organization}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
	                    </div>
    				</div>

    				<div class="col-span-2 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="title" class="block text-black font-semibold">Start Year</label>
	                        <input type="text" autofocus id="title" value="{{$qualif->start_year}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
	                    </div>
    				</div>

    				<div class="col-span-2 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="title" class="block text-black font-semibold">Sumamry</label>
	                        <input type="text" autofocus id="title" value="{{$qualif->summary}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
	                    </div>
    				</div>

    			</div>
    	@endforeach
</div>