<div class="bg-white">

    <table id="current_work" class="stripe hover w-100 m-0" style="margin:0px;width: 100%">
		<thead>
			<tr>
				<th data-priority="1">Project Name</th>
				<th data-priority="2">Client</th>
				<th data-priority="3">Awarded Bid</th>
				<th data-priority="4">Deadline</th>
				<th data-priority="5">In Progress Milestones</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach($current_works as $current_work)
				
				<?php 

					$deadline = (new Carbon\Carbon($current_work->accepted_at))->addDays($current_work->project_delivery);

					$milestones_count = App\Models\Milestone::where('bid_id', '=', $current_work->bid_id)->count();

				?>

				<tr>
					<td>{{ $current_work->title }}</td>
					<td> {{'@'}}{{ $current_work->user->username }}</td>
					<td>
						{{ $current_work->project_currency_symbol }} {{ $current_work->bid_amount }} 
						<br/> 
						{{ ($current_work->projectType->name == "Hourly")?'/ hour':'' }}
					</td>
					<td>{{ $deadline->diffForHumans() }}</td>
					<td>
						{{ $current_work->project_currency_symbol }} {{ $current_work->amount }}
						<br>
						( {{ $milestones_count }} {{($milestones_count==1)?' Milestone':' Milestones'}} )
					</td>

				</tr>
			@endforeach
		</tbody>
		
	</table>
</div>


<script>
    $(document).ready(function() {
        
        var table = $('#current_work').DataTable( {
        		rowReorder: {
		            selector: 'td:nth-child(2)'
		        },
                responsive: true
            } )
            .columns.adjust()
            .responsive.recalc();
    } );

</script>