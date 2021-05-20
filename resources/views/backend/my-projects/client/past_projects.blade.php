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
					<th data-priority="4">Released Milestones</th>
					<th data-priority="5">Posted Date</th>
					<th data-priority="6">Status</th>
					<th data-priority="7">Actions</th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($past_projects as $past_project)
					
					<?php 

						Session::put('user_id',$past_project->assignee_id);

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
						{{-- <td>{{ $project_awarded_at->diffForHumans() }}</td> --}}
						<td>
							@if($milestones_count < 1 )
								{{'None'}}
							@else
								{{ $past_project->project_currency_symbol }}{{ $milestones_released->amount }}
							@endif
						</td>

						<td>{{ $past_project->created_at->diffForHumans() }}</td>

						<td>{{ $past_project->status }}</td>

						<td>
						<div class="p-5">
							<div class="dropdown inline-block relative">
								<button class="bg-gray-300 text-black-700 font-semibold py-2 px-4 rounded inline-flex items-center">
								  <span class="ml-6 mr-5">Action</span>
								  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
								</button>

								<ul class="dropdown-menu absolute hidden text-gray-700 pt-1">

									@if( $past_project->status == "Completed" )
										<li>
											<a class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap -mt-1 cursor-pointer" href="{{ route('project.review',["project_id"=>$past_project->bid_project_id]) }}">Review Freelancer</a>
										</li>
									@endif
								</ul>
							</div>
						</div>
					</td>

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