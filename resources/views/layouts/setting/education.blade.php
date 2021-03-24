
<div class="lg:px-16 md:px-8 sm:px-4 px-4 border-b border-gray-300 text-base">
    @foreach ($user->educations as $education)
    
            <?php
                $country_exits = false; 
                $university_exits = false;
                
                $selected_country = null;
                $selected_university = null;
                
                if ($education->country_id) {
                    $selected_country =  DB::table('countries')->where('id',$education->country_id)->first();

                    $country_exits = true;
                }

                if ($education->university_id) {

                    $selected_university = DB::table('linkedin_universities')->where('id' , $education->university_id)->first();

                    if ($selected_university) {
                        $university_exits = true;
                    }
                    else if ( !$selected_university || is_null($selected_university) ) {
                        $selected_university = DB::table('webometric_universities')->where('id' , $education->university_id)->first();

                        if ($selected_university) {
                            $university_exits = true;
                        }  
                    }
                }

            ?>

            <div id="add-eduction-form"></div>
            
    		<div class="grid grid-cols-12 gap-4">
				<h1 class="col-span-11 text-base mt-10 font-bold"> Education {{$loop->index+1}} </h1>
				{{-- <button href="{{ route('personal-education.remove', ['id' => $education->id]) }}" type="submit" class="btn btn-danger text-red-600 bg-red-100 mt-2">X</button> --}}
                <!-- Delete Button -->
                <a href="{{ route('personal-education.remove', ['id' => $education->id]) }}" class="mt-2 pt-3 cursor-pointer text-red-600 bg-red-100"> <span class="text-red-600 text-lg m-9">X</span> </a>
			</div>
            
            
            <form action="{{ route('personal-education.update') }}" method="POST">

		        <div class="grid grid-cols-4 gap-4 border-b border-gray-300 text-base">

                    @csrf

                    <input type="hidden" name="education_id" value="{{ $education->id }}">

                    @if($country_exits)
                        <div class="{{ ($university_exits)?'lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4':'lg:col-span-4 md:col-span-4 sm:col-span-4 col-span-4' }} bg-red"> 
                            
                            <div class="my-2 text-sm">
                            <label for="title" class="block text-black font-semibold">Selected Country</label>
                            
                            <div class="country_form" name="countries">
                                <input type="hidden" name="selected_country_id" value="{{$selected_country->id}}">
                                <input type="text" autofocus id="title" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" readonly="true" value = "{{$selected_country->name}}" />
                                    
                            </div>
                            

                            </div>
                        </div>
                    @endif

                    @if($university_exits)

                        <div class="{{ ($country_exits)?'lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4':'lg:col-span-4 md:col-span-4 sm:col-span-4 col-span-4' }} bg-red"> 
                            
                            <div class="my-2 text-sm">
                            <label for="title" class="block text-black font-semibold">Selected University</label>
                            
                            <div class="country_form" name="countries">
                                <input type="hidden" name="selected_university_id" value="{{$selected_university->id}}">
                                <input type="text" autofocus id="title" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" readonly="true" value = "{{$selected_university->name}}" />
                                    
                            </div>
                            

                            </div>
                        </div>
                    @endif

					<div class="lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4 bg-red">

    					<div class="my-2 text-sm">
	                    <label for="title" class="block text-black font-semibold">{{($country_exits)? 'Change Country' : 'Select Country' }}</label>
                        
                        <div class="country_form" name="countries">
                            <select id="country_id" name="country_id" class = "country_select rounded-sm focus:outline-none text-sm bg-gray-100 w-full" onclick="getUniversities(this, <?php echo $loop->iteration; ?>)" >

                                    <option value=" ">Select Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->id }}" >{{ $country->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        

	                    </div>
    				</div>



    				<div class="lg:col-span-2 md:col-span-2 sm:col-span-4 col-span-4 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="university" class="block text-black font-semibold">University/College</label>
	                        <input type="text" autofocus id="university" class="universityInput rounded-sm focus:outline-none text-sm bg-gray-100 w-full" readonly="true" placeholder="Please select your college or university" />

                            <div class="universityDiv-{{$loop->iteration}}">
                            </div>
	                    </div>
    				</div>

    				<div class="col-span-4 bg-red">
    					<div class="my-2 text-sm">
	                        <label for="title" class="block text-black font-semibold">Degree</label>
	                        <input type="text" name="degree" autofocus id="title" class="rounded-sm focus:outline-none text-sm bg-gray-100 w-full" placeholder="Enter your degree" value="{{ $education->degree }}" />
	                    </div>
    				</div>

    				<div class="lg:col-span-1 md:col-span-1 sm:col-span-2 col-span-2 bg-red">
					<div class="my-2 text-sm">
                        <label for="title" class="block text-black font-semibold">Start Year</label>
                        <select name="start_year" class = "text-sm w-full">

                            @if($education->start_year)
                                <option value="{{$education->start_year}}"> {{$education->start_year}} </option>
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
					<div class="my-2 text-sm">
                        <label for="title" class="block text-black font-semibold">End Year</label>
                        <select name="end_year" class = "text-sm w-full">
                            @if($education->end_year)
                                <option value="{{$education->start_year}}"> {{$education->end_year}} </option>
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
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 md:px-12 text-xs md:text-base lg:text-base mb-4 rounded">Update Education</button>
                    </div>
                </div>

    	       </div>

            </form>

    @endforeach
</div>