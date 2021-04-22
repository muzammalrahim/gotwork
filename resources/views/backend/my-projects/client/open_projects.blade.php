<div class="bg-white">
    @if($open_projects->count() < 1)
		<p class="text-sm font-bold"> Create a New Project </p>
    	<p class="text-sm mt-2"> Millions of talented freelancers are ready to help you do amazing things. </p>
        <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1  text-white block mt-9 m-auto">Post Project</button> 
	@else
	    <table id="bid" class="stripe hover w-100" style="margin:0px;width: 100% ">
			<thead>
				<tr>
					<th data-priority="1">Project Name</th>
					<th data-priority="2">Total Bids</th>
					<th data-priority="3">Average Bid</th>
					<th data-priority="4">Project Budget</th>
					<th data-priority="5">Expires At</th>
				</tr>
			</thead>
			<tbody>
				@foreach($open_projects as $open_project)
				
					<?php 
					
						$count_bids = 0;
						$project_bids = null;

						$project_bids = App\Models\bids::where('project_id','=',$open_project->project_id)->get();

						$average_bid = App\Models\bids::where('project_id','=',$open_project->project_id)->avg('bid_amount');

						$count_bids = $project_bids->count();
					
					?>

					<tr>
						<td>{{ $open_project->title }}</td>
						<td>{{ $count_bids }}</td>
						<td>{{ $open_project->project_currency_symbol }} {{ $average_bid }}</td>
						<td>
							<?php /* ?>
							{{ $open_project->project_currency_symbol }} {{ $open_project->bid_amount }} 
							<br/> 
							{{ ($open_project->projectType->name == "Hourly")?'/ hour':'' }}
							<?php */ ?>
							{{($open_project->projectType->name == 'Hourly')?'~':''}} 
	                        
	                        <span>$</span>
	                        <span> {{ $open_project->min_amount }} - {{ $open_project->max_amount }} </span>
	                        <span>USD <span class="text-base">{{ $open_project->projectType->name }}</span> </span>
						</td>
						<td>{{ Carbon\Carbon::parse($open_project->expires_at)->diffForHumans() }}</td>
					</tr>
				@endforeach
			</tbody>
			
		</table>
	@endif
</div>

<!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
	
<script>
    $(document).ready(function() {
        
        var table = $('#bid').DataTable( {
        		rowReorder: {
		            selector: 'td:nth-child(2)'
		        },
                responsive: true
            } )
            .columns.adjust()
            .responsive.recalc();
    } );

</script>