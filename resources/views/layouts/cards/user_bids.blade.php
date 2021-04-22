<div class="yourBids mt-4 bg-white border border-gray-200">
    <div class="bidDiv p-4 border-b-2 border-gray-200">
        <span class="bids tex-xl font-bold"> Your Bids </span><span class="float-right text-xs"> {{ strtoupper($user_membership_details->membership_type) }} MEMBER </span>
    </div>
    <p class="text-base mt-2 p-4"><b> {{ $remaining_bids }} bids</b> left out of {{$membership_details->total_bids}}  </p>

    <div class="bidInsights text-center p-4">
        {{--
        <a href="" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 shadow w-full">View Bid Insights</a>
        --}}
    </div>
</div>