<?php 
	$assignee = false;
?>

<div class="bg-white">

    <table id="current_work" class="stripe hover w-100 m-0" style="margin:0px;width: 100%">
		<thead>
			<tr>
				<th data-priority="1">Project Name</th>
				<th data-priority="2">Client</th>
				<th data-priority="3">Awarded Bid</th>
				<th data-priority="4">Deadline</th>
				<th data-priority="5">In Progress Milestones</th>
				<th data-priority="6">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($current_works as $current_work)
				
				<?php 


					if ( Auth::user()->id == $current_work->assignee_id ) {
						$assignee = true;
					}

					$deadline = (new Carbon\Carbon($current_work->accepted_at))->addDays($current_work->project_delivery);

					$milestone = new App\Models\Milestone;
					
					$milestones = $milestone->where('bid_id', '=', $current_work->bid_id)->get();
					
					$milestone_inprogress = $milestone->where('milestone_status', '=', 'Inprogress')->first();

					$milestones_count = $milestones->count();
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
						@if($milestone_inprogress)
							{{ $current_work->project_currency_symbol }} {{ $milestone_inprogress->amount }}
						@else
							{{'Not in progress'}}
						@endif
						<br>
						( {{ $milestones_count }} {{($milestones_count==1)?' Milestone':' Milestones'}} )
					</td>

					<td>
						<div class="p-5">
							<div class="dropdown inline-block relative">
								<button class="bg-gray-300 text-black-700 font-semibold py-2 px-4 rounded inline-flex items-center">
								  <span class="ml-6 mr-5">Action</span>
								  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
								</button>

								<ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
									<li>
								    	<a id="view_milestones"  data-bid="{{ $current_work->bid_id }}" class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap -mt-1 cursor-pointer" >View Milestones</a>
									</li>
								</ul>
							</div>
						</div>
					</td>

				</tr>
			@endforeach
		</tbody>
		
	</table>
</div>

<!--Start: Modals-->
@include('modals.milestones')
<!--End: Modals-->

<!--Start: Scripts-->
@include('scripts.work_in_progress')
@include('scripts.current_work')
<!--End: Scripts-->