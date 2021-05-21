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



				        		<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-8 md:px-12 md:py-2 lg:px-12 text-xs md:text-base lg:text-base float-right mr-2 lg:mr-16 mt-2 mb-4 rounded">Update Profile</button>
				                
				        	</form>

						</div>

						{{-- ============================ tab-2 of Experience ============================ --}}


						<div id="tabs-2">
							<!-- Start: Alert Messages -->
			        		@include('layouts.alerts')
			        		<!-- End: Alert Messages -->
							<h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Experience 
			               		<button id="add-experience-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs fontSize float-right">Add Experience</button>
			        		</h1>

			        		@include('layouts.setting.experience')
						</div>

						{{-- ============================ tab-3 of Qualification============================ --}}

						<div id="tabs-3">
							<!-- Start: Alert Messages -->
								@include('layouts.alerts') 
							<!-- End: Alert Messages -->
							<h1 class="text-xl font-bold lg:px-16 md:px-8 sm:px-2 px-2 py-10 border-b border-gray-300 text-base"> Qualifications 
		 	               		<button id="add-qualification-button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs fontSize float-right">Add Qualification</button>
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

		        		@include('layouts.setting.education') {{-- layouts/setting/education --}}

						</div>

						{{-- ============================ tab-5 of User Skill ============================ --}}

						<div id="tabs-5">

							<!-- Start: Alert Messages -->
								@include('layouts.alerts')
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


<!-- Start: Custom Scripts -->
@include('scripts.setting')
<!-- End: Custom Scripts -->





