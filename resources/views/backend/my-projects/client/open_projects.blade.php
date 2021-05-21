<style>
	.dropdown:hover .dropdown-menu {
	  display: block;
	}

	.awarded {
		background-color: #d7f05c9c !important;
	}

	.denied {
		background-color: #ffb1b1 !important;
	}
</style>

<div class="bg-white">
    @if($open_projects->count() < 1)
		@include('layouts.post_project')
	@else
	    <table id="bid" class="stripe hover w-100 cus-table" style="margin:0px;width: 100%; margin-bottom: 31px; ">
			<thead>
				<tr>
					<th data-priority="1">Project Name</th>
					<th data-priority="2">Total Bids</th>
					<th data-priority="3">Average Bid</th>
					<th data-priority="4">Project Budget</th>
					<th data-priority="5">Expires At</th>
					<th data-priority="6">Awarded At</th>
					<th data-priority="7">Actions</th>
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

					<tr class="{{($open_project->status=="awarded")? 'awarded':(($open_project->status=="denied")? 'denied':'') }}">
						<td>{{ $open_project->title }}</td>
						<td>{{ $count_bids }}</td>
						<td>{{ $open_project->project_currency_symbol }} {{ $average_bid }}</td>
						<td>
							{{($open_project->projectType->name == 'Hourly')?'~':''}} 
	                        
	                        <span>{{ $open_project->currency->symbol }}</span>
	                        <span> {{ $open_project->min_amount }} - {{ $open_project->max_amount }} </span>
	                        <span>{{ $open_project->currency->code }} <span class="text-base">{{ $open_project->projectType->name }}</span> </span>
						</td>
						<td>{{ Carbon\Carbon::parse($open_project->expires_at)->diffForHumans() }}</td>
						<td>
							{{($open_project->status=="awarded")? Carbon\Carbon::parse($open_project->awarded_at)->diffForHumans():'Not Awarded' }}
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
									    	@if($open_project->status=="awarded")
									    		<a class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-8 block whitespace-no-wrap -mt-1" href="{{ route('bid.reward',["id"=>$open_project->id]) }}">Reward Bid &nbsp;</a>
									    	@elseif($open_project->status=="denied")
									    		<a class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-7 block whitespace-no-wrap -mt-1" href="{{ route('bid.reward',["id"=>$open_project->id]) }}">Reward Again</a>
									    	@else
									    		<a class="w-auto rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap -mt-1" href="{{ route('bid.reward',["id"=>$open_project->id]) }}">Cancel Rewarded</a>
									    	@endif
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