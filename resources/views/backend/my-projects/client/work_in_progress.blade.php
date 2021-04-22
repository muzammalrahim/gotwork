<div class="bg-white">
	@if($works_in_progress->count() < 1)
		<p class="text-sm font-bold"> Create a New Project </p>
    	<p class="text-sm mt-2"> Millions of talented freelancers are ready to help you do amazing things. </p>
        <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1  text-white block mt-9 m-auto">Post Project</button> 
	@else
	    <table id="work_in_progress" class="stripe hover w-100 m-0" style="margin:0px;width: 100%">
			<thead>
				<tr>
					<th data-priority="1">Project Name</th>
					<th data-priority="2">Freelancer</th>
					<th data-priority="3">Awarded Bid</th>
					<th data-priority="4">Deadline</th>
					<th data-priority="5">In Progress Milestones</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($works_in_progress as $work_in_progress)
					
					<?php 

						$deadline = (new Carbon\Carbon($work_in_progress->accepted_at))->addDays($work_in_progress->project_delivery);

						$milestones_count = App\Models\Milestone::where('bid_id', '=', $work_in_progress->bid_id)->count();

						$freelancer = App\Models\User::where('id', '=', $work_in_progress->assignee_id)->first();

					?>

					<tr>
						<td>{{ $work_in_progress->title }}</td>
						<td> {{'@'}}{{ $freelancer->username }}</td>
						<td>
							{{ $work_in_progress->project_currency_symbol }} {{ $work_in_progress->bid_amount }} 
							<br/> 
							{{ ($work_in_progress->projectType->name == "Hourly")?'/ hour':'' }}
						</td>
						<td>{{ $deadline->diffForHumans() }}</td>
						<td>
							{{ $work_in_progress->project_currency_symbol }} {{ $work_in_progress->amount }}
							<br>
							( {{ $milestones_count }} {{($milestones_count==1)?' Milestone':' Milestones'}} )
						</td>

					</tr>
				@endforeach
			</tbody>
			
		</table>
	@endif
</div>


<script>
    $(document).ready(function() {
        
        var table = $('#work_in_progress').DataTable( {
        	rowReorder: {
	            selector: 'td:nth-child(2)'
	        },
                responsive: true
            } )
            .columns.adjust()
            .responsive.recalc();
    } );

</script>