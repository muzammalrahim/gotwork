<?php 
	// Getting Those Skills In Drop down Which Don't Exits
	$skills_not_selected = [];
	$not_assigned_skills = null;
	$exist_skills = DB::table('user_skills')->where('user_id',Auth::user()->id)->get('skill_id');
	$all_skills = DB::table('skills')->get('id');
	$dropdown_skills = [];
	foreach ($all_skills as $all_skill) {
		if ($all_skill) {
			if ( !is_null($exist_skills) && $exist_skills ) {
				foreach ($exist_skills as $exist_skill) {
					if ($exist_skill) {
						if ($all_skill->id == $exist_skill->skill_id) {
							continue;
						}
						else {
							$skills_not_selected[] =  $all_skill->id;
						}
					} 
				}
			}
		}
	}
	
	if ( $skills_not_selected ) {

		foreach ($skills_not_selected as $dropdown) {
			$dropdown_skills[] = DB::table('skills')->where('id',$dropdown)->get();
		}
	}
	else {
		$dropdown_skills[] = DB::table('skills')->get();
	}
?>


@if( $user->userSkills->count() > 0 )
	<div class="px-16 py-10 border-b border-gray-300 text-base">
		<h1 class="lg:text-xl md:text-base sm:text-sm text-sm font-bold mb-3"> My Skills </h1>  
		@foreach ($user->userSkills as $skill)
		    <span class=" bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs mr-4">{{$skill->skillName->name}} <a href="{{ route('personal-skills.remove', ['id' => $skill->id]) }}" class="ml-4 cursor-pointer"> x </a> </span>
		@endforeach
	</div>
@endif

<div>

	<style>
	  [x-cloak] {
	      display: none;
	  }
	</style>

	<h1 class="w-full ml-16 mx-auto lg:text-xl md:text-base sm:text-sm text-sm font-bold mb-2 mt-6"> Add Skills </h1>

	<select x-cloak id="select" name="skills[]" required="required">
		@foreach ($dropdown_skills as $skill)
			@foreach ($skill as $data)
				<option value="{{$data->id}}">{{$data->name}}</option>
			@endforeach
		@endforeach
	</select>

	<div x-data="dropdown()" x-init="loadOptions()" class="w-full ml-16 h-48 flex flex-col mx-auto">
		<form action="{{route('personal-skills.update')}}" method="POST">
			@csrf
			
			<input name="values" type="hidden" x-bind:value="selectedValues()">
			<div class="inline-block relative w-96">
			    <div class="flex flex-col items-center relative">
			        <div x-on:click="open" class="w-full  svelte-1l8159u">
			            <div class="my-2 p-1 flex border border-blue-500 bg-white rounded svelte-1l8159u">
			                <div class="flex flex-auto flex-wrap">
			                    <template x-for="(option,index) in selected" :key="options[option].value">
			                        <div
			                            class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 bg-teal-100 border border-teal-300 ">
			                            <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
			                                options[option]" x-text="options[option].text"></div>
			                            <div class="flex flex-auto flex-row-reverse">
			                                <div x-on:click="remove(index,option)">
			                                    <svg class="fill-current h-6 w-6 " role="button" viewBox="0 0 20 20">
			                                        <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
			                                   c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
			                                   l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
			                                   C14.817,13.62,14.817,14.38,14.348,14.849z" />
			                                    </svg>

			                                </div>
			                            </div>
			                        </div>
			                    </template>
			                    <div x-show="selected.length    == 0" class="flex-1">
			                        <input placeholder="Select a option"
			                            class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800"
			                            x-bind:value="selectedValues()"
			                        >
			                    </div>
			                </div>
			                <div
			                    class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">

			                    <button type="button" x-show="isOpen() === true" x-on:click="open"
			                        class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
			                        <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
			                            <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83 c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25 L17.418,6.109z" />
			                        </svg>

			                    </button>
			                    <button type="button" x-show="isOpen() === false" @click="close"
			                        class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
			                        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
			                            <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83 c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z" />
			                        </svg>

			                    </button>
			                </div>
			            </div>
			        </div>
			        <div class="w-full px-4">
			            <div x-show.transition.origin.top="isOpen()"
			                class="absolute shadow top-100 bg-white z-40 w-full lef-0 rounded max-h-select overflow-y-auto svelte-5uyqqj"
			                x-on:click.away="close">
			                <div class="flex flex-col w-full">
			                    <template x-for="(option,index) in options" :key="option">
			                        <div>
			                            <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100"
			                                @click="select(index,$event)">
			                                <div x-bind:class="option.selected ? 'border-teal-600' : ''"
			                                    class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
			                                    <div class="w-full items-center flex">
			                                        <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </template>
			                </div>
			            </div>
			        </div>
			    </div>
			<!-- on tailwind components page will no work  -->
		    	{{-- <button disabled class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">Test</button> --}}
			</div>
		    
		    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 md:px-12 text-xs md:text-base lg:text-base mt-2 mb-4 rounded">Add Skills</button>

		</form>

		@error('values')
		    <div class="red-text" style=" color: red; ">Please select skills.</div>
		@enderror
		


	</div>



	<script>
	    function dropdown() {
	        return {
	            options: [],
	            selected: [],
	            show: false,
	            open() { this.show = true },
	            close() { this.show = false },
	            isOpen() { return this.show === true },
	            select(index, event) {

	                if (!this.options[index].selected) {

	                    this.options[index].selected = true;
	                    this.options[index].element = event.target;
	                    this.selected.push(index);

	                } else {
	                    this.selected.splice(this.selected.lastIndexOf(index), 1);
	                    this.options[index].selected = false
	                }
	            },
	            remove(index, option) {
	                this.options[option].selected = false;
	                this.selected.splice(index, 1);


	            },
	            loadOptions() {
	                const options = document.getElementById('select').options;
	                for (let i = 0; i < options.length; i++) {
	                    this.options.push({
	                        value: options[i].value,
	                        text: options[i].innerText,
	                        selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
	                    });
	                }


	            },
	            selectedValues(){
	                return this.selected.map((option)=>{
	                    return this.options[option].value;
	                })
	            }
	        }
	    }
	</script>


	<script type="text/javascript">
		
	</script>
</div>
