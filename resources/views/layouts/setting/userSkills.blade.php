

<div class="px-16 py-10 border-b border-gray-300 text-base">
    	@foreach ($user->userSkills as $skill)
	        <span class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 text-xs mr-4">{{$skill->skillName->name}} <span class="ml-4 cursor-pointer"> x </span> </span>
    	@endforeach
</div>