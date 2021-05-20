<form id="bid_form" class="pt-5" action="{{ route('update_bid') }}" name="placebid" class="placebid" method="POST">
    @csrf
    
    {{-- Start: Bid Amount Details --}}
    <div class="font-bold text-md relative flex w-full flex-wrap items-stretch mb-3">

        {{-- Start: Form Hidden Fields --}}
        <input type="hidden" class="project_id" name="project_id" value="{{ $project_details->id }}">
        <input type="hidden" class="bid_id" name="bid_id" value="{{ $bid_data->id }}">
        
        <input type="hidden" name="project_currency_symbol" value="{{ $project_details->currency->symbol }}">
        {{-- End: Form Hidden Fields --}}

        <div class="grid grid-cols-2 gap-4"> 
            <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                <p class="font-bold text-sm">Bid Amount</p>

                <span class="px-2 bg-gray-200 z-10 leading-snug font-normal absolute w-8 py-3 m-0.5" name="currency_symbol">
                    {{ $project_details->currency->symbol }}
                </span>
                <input type="text" class="bid_amount px-3 py-3 relative pl-10" name="bid_amount" value="{{ $bid_data->bid_amount }}" />

                <span class="z-10 leading-snug font-normal absolute text-center absolute bg-gray-200 rounded text-base items-center justify-center w-16 py-3 p-4 mt-0.5" name="currency_symbol" style="margin-left: -4.1rem;">
                    {{ $project_details->currency->code }}
                </span>
            </div>

            <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                <p class="font-bold text-sm">This project will be delivered in</p>
                <span class="px-2 bg-gray-200 z-10 leading-snug font-normal absolute w-14 py-3 m-0.5" name="currency_symbol">
                    Days
                </span>
               
                <input type="number" name="project_delivery" class="px-3 py-3 relative  pl-16" value="{{ $bid_data->project_delivery }}"/>
            </div>
          
        </div>
    </div>
    {{-- End: Bid Amount Details --}}


    {{-- Start: Project Milestones --}}
    <p class="font-bold pt-5 ">Suggest milestone payments</p>
    <p class="md:text-base lg:text-base text-xs ">Help the client by providing a breakdown of tasks to be done in this project.</p>
    
    @foreach( $bid_data->milestones as $milestone )
        <input type="hidden" name="mile_stone[{{ $loop->index+1 }}][id]" value="{{ $milestone->id }}">
        <div class="relative flex w-full flex-wrap items-stretch mb-3 mt-5">
            <div class="w-full grid grid-cols-2 gap-4"> 
                <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                    <input type="text" class="w-full py-3 relative" name="mile_stone[{{ $loop->index+1 }}][task]" placeholder="Describe your task" value="{{ $milestone->task }}" />
                    <p class="error_milestone_desc text-red-500 hidden">Milestone description is required</p>
                </div>
              
                <div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">
                    <span class="px-2 bg-gray-200 z-10 leading-snug font-normal absolute w-8 py-3 m-0.5">
                        {{ $project_details->currency->symbol }}
                    </span>
                    <input type="number" class="mileStonePrice px-3 py-3 relative pl-16" name="mile_stone[{{ $loop->index+1 }}][amount]" onchange="addmileStone()" value="{{ $milestone->amount }}"/>
                    <p class="error_milestone_amount text-red-500 hidden">Milestone amount is required</p>
                </div>
            </div>
        </div>
    @endforeach

    <div class="added_milestones">

    </div>
    
    {{-- 
    <div class="buttonDiv">
        <a class="adddMileStone_button bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white mt-9 m-auto cursor-pointer hidden">Add milestone</a>
    </div> 
    --}}

    <div class="buttonDiv">
        <a class="adddMileStone_button md:w-72 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 md:px-12 text-xs md:text-base lg:text-base mb-4 rounded cursor-pointer disabled">Add another milestone</a>
    </div> 

    <div class="error_in_amount bg-red-200 py-4 px-8 border border-2 border-red-600 hidden">
        <p class = "errorDiv text-red text-sm"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            Total suggested milestone payment amount must not exceed the bid amount 
            Please ensure it is between <span> ${{ $project_details->min_amount }} - ${{ $project_details->max_amount }} </span>
        </p>
    </div>
    {{-- End: Project Milestones --}}


    {{-- Start: Proposal --}}

    <p class="font-bold pt-5 text-sm">Describe your proposal</p>

    <div class="relative flex w-full flex-wrap items-stretch">
        <textarea class="resize-y border rounded-md w-full" rows="8" name="proposal">{{$bid_data->proposal}}</textarea>
        <p class="error_proposal text-red-500 hidden">Proposal is required</p>

        @error('proposal')
            <p class="text-red-500" >{{$message}}</p>
        @enderror
    </div>

    {{-- End: Proposal --}}
    
    <button id="btn_place_bid" class="bg-blue-600 hover:bg-blue-700 px-3 py-1 text-white mt-9 m-auto cursor-pointer place_bid_button">Update Bid</button>
</form>                            
