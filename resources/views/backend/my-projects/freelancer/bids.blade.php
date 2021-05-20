<style>
	.dropdown:hover .dropdown-menu {
	  display: block;
	}

	.awarded {
		background-color: #d7f05c9c !important;
	}

	.denied {
		background-color: #ffb1b1 !important;
	}
</style>

<div class="bg-white">
    @if($bids->count() < 1)
		<p class="text-sm font-bold">Search Projects</p>
    	<p class="text-sm mt-2"> Start bidding now on projects that meet your skills. </p>
        <a href="{{ route('projects') }}" class="bg-blue-600 hover:bg-blue-700 w-40 px-3 py-3  md:w-36 md:px-2 md:py-2 md:w-40 md:px-3 md:py-3 text-white block mt-9 m-auto">Browse Projects</a> 
	@else

	    <table id="bids" class="stripe hover w-100" style="margin:0px;width: 100% ">
			<thead>
				<tr>
					<th data-priority="1">Project Name</th>
					<th data-priority="2">Total Bids</th>
					<th data-priority="3">Average Bid</th>
					<th data-priority="4">My Bid</th>
					<th data-priority="5">Bid Placed</th>
					<th data-priority="6">Actions</th>
				</tr>
			</thead>
			<tbody>

				@foreach($bids as $bid)
				
					<?php 
						$count_bids = 0;
						$project_bids = null;

						$project_bids = App\Models\bids::where('project_id','=',$bid->project_id)->get();

						$average_bid = App\Models\bids::where('project_id','=',$bid->project_id)->avg('bid_amount');

						$count_bids = $project_bids->count();
					?>

					<tr class="{{($bid->status=="awarded")? 'awarded':(($bid->status=="denied")? 'denied':'') }}">
						<td>{{ $bid->title }}</td>
						<td>{{ $count_bids }}</td>
						<td>{{ $bid->project_currency_symbol }} {{ $average_bid }}</td>
						<td>
							{{ $bid->project_currency_symbol }} {{ $bid->bid_amount }} 
							<br/> 
							{{ ($bid->projectType->name == "Hourly")?'/ hour':'' }}
						</td>
						<td>{{ $bid->created_at->diffForHumans() }}</td>
						

						<td>
							<div class="p-5">
								<div class="dropdown inline-block relative">
									<button class="bg-gray-300 text-black-700 font-semibold py-2 px-4 rounded inline-flex items-center">
									  <span class="ml-6 mr-5">Action</span>
									  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
									</button>

									<ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
										@if($bid->status=="awarded")
											<li>
												<a class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap -mt-1" href="{{ route('project.accept',["project_id"=>$bid->project_id]) }}">Accept Project</a>
											</li>

											<li>
												<a class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap -mt-1" href="{{ route('project.deny',["project_id"=>$bid->project_id]) }}">Deny Project</a>
											</li>
										@else
											<li>
												<a class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-9 block whitespace-no-wrap -mt-1" href="{{ route('bid.edit',["slug"=>$bid->slug,"id"=>$bid->id]) }}">Update Bid</a>
											</li>
										@endif
									</ul>
								</div>
							</div>
							<br/>
						</td>
					</tr>
				@endforeach
			</tbody>
			
		</table>
	@endif
</div>

<!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
	
<script>
    $(document).ready(function() {
        
        var table = $('#bids').DataTable( {
	        	rowReorder: {
	            selector: 'td:nth-child(2)'
	        },
                responsive: true
            } )
            .columns.adjust()
            .responsive.recalc();
    } );

</script>