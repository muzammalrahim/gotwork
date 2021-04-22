<div class="bg-white">
	@if($past_projects->count() < 1)
		<p class="text-sm font-bold"> Create a New Project </p>
    	<p class="text-sm mt-2"> Millions of talented freelancers are ready to help you do amazing things. </p>
        <button class="bg-blue-600 hover:bg-blue-700 px-3 py-1  text-white block mt-9 m-auto">Post Project</button> 
	@else
	    <table id="past" class="stripe hover w-100 m-0" style="margin:0px;width: 100%">
			<thead>
				<tr>
					<th data-priority="1">Project Name</th>
					<th data-priority="2">Freelancer</th>
					<th data-priority="3">Awarded Bid</th>
					<th data-priority="4">Project Awarded</th>
					<th data-priority="5">Released Milestones</th>
					<th data-priority="6">Outcomes</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($past_projects as $past_project)
					
					<?php 
						$milestones_count = 0;
						$freelancer_name = null;

						$project_awarded_at = (new Carbon\Carbon($past_project->awarded_at));

						$milestones_released = App\Models\Milestone::where('bid_id', '=', $past_project->bid_id)->where('milestone_status','=','Released')->orderBy('id','DESC')->first();

						if (!is_null($milestones_released)) {
							$milestones_count = $milestones_released->count();
						}

						$freelancer_data = App\Models\User::where('id', '=',$past_project->assignee_id)->first();

						if ($freelancer_data->username) {
							$freelancer_name = '@'. $freelancer_data->username;
						}
						
					?>

					<tr>
						<td>{{ $past_project->title }}</td>
						<td>{{ $freelancer_name }}</td>
						<td>
							{{ $past_project->project_currency_symbol }} {{ $past_project->bid_amount }} 
							<br/> 
							{{ ($past_project->projectType->name == "Hourly")?'/ hour':'' }}
						</td>
						<td>{{ $project_awarded_at->diffForHumans() }}</td>
						<td>
							@if($milestones_count < 1 )
								{{'None'}}
							@else
								<?php /* ?>
								@foreach($milestones_released as $milestone_released)
									@if(!$loop->first || !$loop->first){{','}}@endif
									{{ $past_project->project_currency_symbol }}{{$milestone_released->amount}}
								@endforeach
								<?php */ ?>
								{{ $past_project->project_currency_symbol }}{{ $milestones_released->amount }}
							@endif
						</td>

						<td>{{ $past_project->status }}</td>

					</tr>
				@endforeach
			</tbody>
			
		</table>
	@endif
</div>


<script>
    $(document).ready(function() {
        

        var table = $('#past').DataTable( {
	        	rowReorder: {
		            selector: 'td:nth-child(2)'
		        },
                responsive: true
            } )
            .columns.adjust()
            .responsive.recalc();
    } );

</script>