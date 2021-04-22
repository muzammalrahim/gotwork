
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

					<tr>
						<td>{{ $bid->title }}</td>
						<td>{{ $count_bids }}</td>
						<td>{{ $bid->project_currency_symbol }} {{ $average_bid }}</td>
						<td>
							{{ $bid->project_currency_symbol }} {{ $bid->bid_amount }} 
							<br/> 
							{{ ($bid->projectType->name == "Hourly")?'/ hour':'' }}
						</td>
						<td>{{ $bid->created_at->diffForHumans() }}</td>
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