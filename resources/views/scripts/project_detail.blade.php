

<script type="text/javascript">
	

	$(document).ready(function(){


		
		/* Start: Validations For Bid Form */
			$('#bid_form textarea[name="proposal"]').blur(function(){
		        if(!$(this).val()){
		            $(".error_proposal").removeClass('hidden');
		            $("#btn_place_bid").addClass('disabled');
		        } 
		        else {
		        	$(".error_proposal").addClass('hidden');
		        	$("#btn_place_bid").removeClass('disabled');
		        } 
		    });

		    $('#bid_form input[name="mile_stone[1][task]"]').blur(function(){
		        if(!$(this).val()){
		            $(".error_milestone_desc").removeClass('hidden');
		            $("#btn_place_bid").addClass('disabled');
		        } 
		        else {
		        	$(".error_milestone_desc").addClass('hidden');
		        	$("#btn_place_bid").removeClass('disabled');
		        } 
		    });

		    $('#bid_form input[name="mile_stone[1][amount]"]').blur(function(){
		        if(!$(this).val()){
		            $(".error_milestone_amount").removeClass('hidden');
		            $("#btn_place_bid").addClass('disabled');
		        } 
		        else {
		        	$(".error_milestone_amount").addClass('hidden');
		        	$("#btn_place_bid").removeClass('disabled');
		        } 
		    });

		/* End: Validations For Bid Form */


		this.addmileStone = function(){
			var bid_amount = $('.bid_amount').val();
			var sum = 0;
			jQuery("input.mileStonePrice").each(function() {
			    var t = jQuery(this).val();
			    sum = sum + parseInt(t);
			});
			
			var mile_stone_price = sum;
			if (sum > bid_amount ) {
				// var error = '<p class = "errorDiv text-red" > Total suggested milestone payment amount must not exceed the bid amount </p>';
				$('.error_in_amount').removeClass('disabled');
			}
			else{
				if (mile_stone_price >=  bid_amount) {
				// console.log("The value for the sum here : " + mile_stone_price);
				$('.adddMileStone_button').addClass('disabled');
				$('.error_in_amount').addClass('hidden');
				
				}
				else{
					$('.adddMileStone_button').removeClass('disabled');
					$('.error_in_amount').addClass('hidden');
				}

			}	
			
		}

		var i;
		

		@if (isset($bid_data))  
			i = {{count($bid_data->milestones)}} + 1;
		@else
			i=2;
		@endif
		

		$(document).on('click' , '.adddMileStone_button', function(){
			
			if (i < 5) {
			var milestone_div = '<div class="mile_stone relative flex w-full flex-wrap items-stretch mb-3 mt-5">';
				milestone_div += '<div class="w-full grid grid-cols-2 gap-4">' 
                milestone_div += '<div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">'
                milestone_div += '<input id="mile_stone_task" type="text" class="w-full py-3 relative" name="mile_stone['+i+'][task]" placeholder="Describe your task">'
                milestone_div += '<p class="error_milestone_desc['+i+'] text-red-500 hidden">Milestone description is required</p>'
                milestone_div += '</div>';
                milestone_div += '<div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">';
                milestone_div += '<span class="px-2 bg-gray-200 z-10 leading-snug font-normal absolute w-8 py-3 m-0.5">$';
                milestone_div += '</span>';
                milestone_div += '<input type="number" class="mileStonePrice px-3 py-3 relative pl-16" name="mile_stone['+i+'][amount]" onchange="addmileStone()" value="">';
                milestone_div += '<p class="error_milestone_amount['+i+'] text-red-500 hidden">Milestone amount is required</p>';
                milestone_div += '<span class ="ml-1 removeMileStone text-blue-500 cursor-pointer hover:underline"> Remove </span>';
                milestone_div += '</div>';
                milestone_div += '</div>';
                milestone_div += '</div>';
				$('.added_milestones').append(milestone_div);


				i++
			}
			else{
				return false;
			}


		});


		// ================================================== remmove milestone ================================================== 
		
		$(document).on('click' , '.removeMileStone', function(){
			$(this).closest('.mile_stone').remove();

		});
		
		// ================================================== Place bid ================================================== 

		/*$(document).on('click' , '.place_bid_button' , function(){

			// var form_data = $('.placebid').serializeArray();
		    var formData = $('.placebid').serializeArray();
			console.log('form_data ' + formData);

		});*/



	});

</script>


