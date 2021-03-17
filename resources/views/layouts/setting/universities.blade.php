

{{-- @dump($university) --}}


	{{-- expr --}}

<select class="w-full" name="university_id">

	@if ($university->count() > 0)
		@foreach ($university as $uni)
			<option class="w-full" value="{{$uni->id}}"> {{$uni->name}} </option>
		@endforeach
		@else
		<option class="w-full"> No univeristy belongs to this country</option>

	@endif
</select>



