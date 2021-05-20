<div class="bg-white">

    <table id="past_work" class="stripe hover w-100 m-0" style="margin:0px;width: 100%">
		<thead>
			<tr>
				<th data-priority="1">Project Name</th>
				<th data-priority="2">Client</th>
				<th data-priority="3">Awarded Bid</th>
				<th data-priority="4">Project Awarded</th>
				<th data-priority="5">Released Milestones</th>
				<th data-priority="6">Outcome</th>
				<th data-priority="7">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($past_works as $past_work)
				<?php 

					Session::put('user_id',$past_work->user_id);

					$milestones_count = 0;
					
					$project_awarded_at = (new Carbon\Carbon($past_work->awarded_at));

					$milestones_released = App\Models\Milestone::where('bid_id', '=', $past_work->bid_id)->where('milestone_status','=','Released')->orderBy('id','DESC')->first();

				?>

				<tr>
					<td>{{ $past_work->title }}</td>
					<td>{{'@'}}{{ $past_work->user->username }}</td>
					<td>
						{{ $past_work->project_currency_symbol }} {{ $past_work->bid_amount }} 
						<br/> 
						{{ ($past_work->projectType->name == "Hourly")?'/ hour':'' }}
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

					<td>{{ $past_work->status }}</td>

					<td>
						<div class="p-5">
							<div class="dropdown inline-block relative">
								<button class="bg-gray-300 text-black-700 font-semibold py-2 px-4 rounded inline-flex items-center">
								  <span class="ml-6 mr-5">Action</span>
								  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
								</button>

								<ul class="dropdown-menu absolute hidden text-gray-700 pt-1">

									@if( $past_work->status == "Completed" )
										<li>
											<a class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-7 block whitespace-no-wrap -mt-1 cursor-pointer" href="{{ route('project.review',["project_id"=>$past_work->bid_project_id]) }}">Review Client</a>
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
</div>


<script>
    $(document).ready(function() {
        
        var table = $('#past_work').DataTable( {
        		rowReorder: {
		            selector: 'td:nth-child(2)'
		        },
                responsive: true
            } )
            .columns.adjust()
            .responsive.recalc();
    } );

</script>