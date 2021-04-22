<div class="bg-white">

    <table id="past_work" class="stripe hover w-100 m-0" style="margin:0px;width: 100%">
		<thead>
			<tr>
				<th data-priority="1">Project Name</th>
				<th data-priority="2">Client</th>
				<th data-priority="3">Awarded Bid</th>
				<th data-priority="4">Project Awarded</th>
				<th data-priority="5">Released Milestones</th>
				<th data-priority="6">Outcomes</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($past_works as $past_work)
				
				<?php 

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
						@if($milestones_released->count() < 1)
							{{'None'}}
						@else
							<?php /* ?>
							@foreach($milestones_released as $milestone_released)
								@if(!$loop->first || !$loop->first){{','}}@endif
								{{ $past_work->project_currency_symbol }}{{$milestone_released->amount}}
							@endforeach
							<?php */ ?>
							{{ $past_work->project_currency_symbol }}{{ $milestones_released->amount }}
						@endif
					</td>

					<td>{{ $past_work->status }}</td>

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