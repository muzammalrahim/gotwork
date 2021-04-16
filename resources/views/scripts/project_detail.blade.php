

<script type="text/javascript">
	

	$(document).ready(function(){
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
				$('.error_in_amount').removeClass('hidden');
			}
			else{
				if (mile_stone_price >=  bid_amount) {
				// console.log("The value for the sum here : " + mile_stone_price);
				$('.adddMileStone_button').addClass('hidden');
				$('.error_in_amount').addClass('hidden');


				}
				else{
					$('.adddMileStone_button').removeClass('hidden');
					$('.error_in_amount').addClass('hidden');

				}

			}	
			
		}

		var i = 2;
		$(document).on('click' , '.adddMileStone_button', function(){
			if (i < 20) {
			var milestone_div = '<div class="mile_stone relative flex w-full flex-wrap items-stretch mb-3 mt-5">';
				milestone_div += '<div class="w-full grid grid-cols-2 gap-4">' 
                milestone_div += '<div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">'
                milestone_div += '<input type="text" class="w-full py-3 relative" name="mile_stone['+i+'][task]" placeholder="Describe your task">'
                milestone_div += '</div>';
                milestone_div += '<div class="lg:col-span-1 md:col-span-1 sm:col-span-1 col-span-10">';
                milestone_div += '<span class="px-2 bg-gray-200 z-10 leading-snug font-normal absolute w-8 py-3 m-0.5">$';
                milestone_div += '</span>';
                milestone_div += '<input type="number" class="mileStonePrice px-3 py-3 relative pl-16" name="mile_stone['+i+'][currency_symbol]" onchange="addmileStone()" value="">';
                milestone_div += '<span class ="removeMileStone cursor-pointer hover:underline"> Remove </span>';
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


