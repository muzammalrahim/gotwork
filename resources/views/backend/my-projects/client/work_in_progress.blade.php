<?php 
	$assignee = false;
?>

<div class="bg-white">
	@if($works_in_progress->count() < 1)
		@include('layouts.post_project')
	@else
	    <table id="work_in_progress" class="stripe hover w-100 m-0" style="margin:0px;width: 100%; margin-bottom: 25px;">
			<thead>
				<tr>
					<th data-priority="1">Project Name</th>
					<th data-priority="2">Freelancer</th>
					<th data-priority="3">Awarded Bid</th>
					<th data-priority="4">Deadline</th>
					<th data-priority="5">In Progress Milestones</th>
					<th data-priority="6">Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($works_in_progress as $work_in_progress)
					
					<?php 
						
						if ( Auth::user()->id == $work_in_progress->assignee_id ) {
							$assignee = true;
						}

						$deadline = (new Carbon\Carbon($work_in_progress->accepted_at))->addDays($work_in_progress->project_delivery);

						$freelancer = App\Models\User::where('id', '=', $work_in_progress->assignee_id)->first();

						$milestone = new App\Models\Milestone;
					
						$milestones = $milestone->where('bid_id', '=', $work_in_progress->bid_id)->get();
						
						$milestone_inprogress = $milestone->where('milestone_status', '=', 'Inprogress')->first();

						$milestones_count = $milestones->count();
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
							@if($milestone_inprogress)
								{{ $work_in_progress->project_currency_symbol }} {{ $milestone_inprogress->amount }}
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
									    	<a id="view_milestones"  data-bid="{{ $work_in_progress->bid_id }}" class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap -mt-1 cursor-pointer" >View Milestones</a>
										</li>

										{{-- 
										<li>
									    	<a id="view_milestones"  data-bid="{{ $work_in_progress->bid_id }}" class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap -mt-1 cursor-pointer" >Cancel Project</a>
										</li>
										--}}

										<li>
											<a class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap -mt-1 cursor-pointer" href="{{ route('project.cancel',["project_id"=>$work_in_progress->bid_project_id]) }}">Cancel Project</a>
										</li>
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



<!--Start: Modals-->
@include('modals.milestones')
<!--End: Modals-->

<!--Start: Scripts-->
@include('scripts.work_in_progress')
<!--End: Scripts-->
