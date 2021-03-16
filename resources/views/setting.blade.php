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

        <div class="grid grid-cols-4 gap-4 px-16">

        	<div class="col-span-1 bg-white">

	        	<div class="px-4 py-2 text-base hover:bg-blue-300 hover:text-white cursor-pointer border-b-2 border-gray-300">
	               <p> <span> Experience </span> </p> 
	            </div>

	            <div class="px-4 py-2 text-base hover:bg-blue-300 hover:text-white cursor-pointer border-b-2 border-gray-300">
	               <p> <span> Education </span> </p> 
	            </div>



        	</div>

        	<div class="col-span-3 bg-white pt-10">

        		<div class="heading px-16 pb-10 border-b border-gray-300">
        			<h1 class="text-3xl font-bold"> Personal Information </h1>    			
        		</div>


        		<div class="px-16 py-10 border-b border-gray-300 text-base">
        			<h1 class="text-xl font-bold"> Username </h1>    			
                    <input type="text" autofocus id="username" value="{{$user->name}}" class="rounded-sm mt-3 focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
                </div>


                <h1 class="text-xl font-bold px-16 py-10 border-b border-gray-300 text-base"> Experience 
               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Add Experience</button>
        		</h1>

                <div class="px-16 border-b border-gray-300 text-base">

        				@foreach ($experience as $exp)

        					<div class="grid grid-cols-12 gap-4">
	        					<h1 class="col-span-11 text-base mt-10 font-bold"> Experience {{$loop->index+1}} </h1>
	        					<i class="col-span-1 fa fa-edit text-base mt-10 font-bold"></i>
	        				</div>
      			  			<div class="grid grid-cols-4 gap-4 border-b border-gray-300 text-base">
     
	        					<div class="col-span-2 bg-red">
			    					<div class="my-2 text-sm">
				                        <label for="title" class="block text-black font-semibold">Title</label>
				                        <input type="text" autofocus id="title" value="{{$exp->title}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
				                    </div>
			    				</div>

			    				<div class="col-span-2 bg-red">
			    					<div class="my-2 text-sm">
				                        <label for="company" class="block text-black font-semibold">Company</label>
				                        <input type="text" autofocus id="company" value="{{$exp->company_name}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
				                    </div>
			    				</div>

			    				<div class="col-span-1 bg-red">
			    					<div class="my-2 text-sm">
				                        <label for="title" class="block text-black font-semibold">Start Month</label>
				                        <select name="start_month" class = "text-sm">
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

			    				<div class="col-span-1 bg-red">
			    					<div class="my-2 text-sm">
				                        <label for="title" class="block text-black font-semibold">Start Year</label>
				                        <select name="start_year" class = "text-sm">
				                        	@for ($x=date("Y"); $x>1900; $x--)
				                        			<option {{$exp->start_year == $x ? 'selected' : '' }} value="{{$x}}"> {{$x}} </option>
			                        		@endfor	
				                        </select>
				                    </div>
			    				</div>

			    				

			    				<div class="col-span-1 bg-red">
			    					<div class="my-2 text-sm">
				                        <label for="title" class="block text-black font-semibold">End Month</label>

				                        <select name="end_month" class = "text-sm">
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

			    				<div class="col-span-1 bg-red">
			    					<div class="my-2 text-sm">
				                        <label for="title" class="block text-black font-semibold">Start Year</label>
				                        <select name="end_year" class = "text-sm">
				                        	@for ($x=date("Y"); $x>1900; $x--)
				                        			<option {{$exp->end_year == $x ? 'selected' : '' }} value="{{$x}}"> {{$x}} </option>
			                        		@endfor	
				                        </select>
				                    </div>
			    				</div>

			    				<div class="col-span-4 bg-red">
			    					<input type="checkbox" name=""> I am currently working here
			    				</div>

			    				<div class="col-span-4 bg-red">
			    					<div class="mt-2 mb-10 text-sm">
				                        <label for="title" class="block text-black font-semibold">Summary</label>
				                        <input type="text" autofocus id="title" value="{{$exp->summary}}" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Username" />
				                    </div>
			    				</div>
        					</div>	

        				@endforeach
                    
                </div>

                <h1 class="text-xl font-bold px-16 py-10 border-b border-gray-300 text-base"> Qualifications 
               		<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs float-right">Add Qualifications</button>
        		</h1>

                <div class="px-16 border-b border-gray-300 text-base">
                	@foreach ($user->Qualification as $qualif)
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

            


        	</div>

        </div>

  </section>


</x-app-layout>
