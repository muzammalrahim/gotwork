<script>

	$('#view_milestones').on('click', function(event) {
		event.preventDefault();

		var bid_id = $(this).data("bid");

		var route = '/bidmilestones/'+bid_id;

		var check_previous = $('#bid_id').val();

		if (!check_previous) {
			$.get(route,function(data)
		{

			$.each(data, function(key, value) {
				
				var milestones_data = '<p class="font-bold pt-5 text-md">Milestone-'+(key+1)+'</p>';
				
				milestones_data += '<input type="hidden" id="bid_id" name="bid_id" value='+value.bid_id+'>';
				milestones_data += '<input type="hidden" name="milestone['+key+'][id]" readonly value='+value.id+' >';
	
				milestones_data += '<p class="font-bold pt-2 text-sm">Amount</p>';
				milestones_data += '<div class="relative flex w-full flex-wrap items-stretch">';
					milestones_data += '<input class="resize-y border border-black rounded-md w-full" name="milestone['+key+'][amount]" readonly value='+value.amount+' >';
					milestones_data += '<p class="error_proposal text-red-500 hidden">Proposal is required</p>';
				milestones_data += '</div>';
				
				milestones_data += '<p class="font-bold pt-5 text-sm">Task</p>';
				milestones_data += '<div class="relative flex w-full flex-wrap items-stretch">';
					milestones_data += '<textarea class="resize-y border rounded-md w-full" rows="3" name="milestone['+key+'][task]" readonly>'+value.task+'</textarea>';
					milestones_data += '<p class="error_proposal text-red-500 hidden">Proposal is required</p>';
				milestones_data += '</div>';
				
				milestones_data += '<p class="font-bold pt-5 text-sm">Status</p>';
				milestones_data += '<div class="relative flex w-full flex-wrap items-stretch">';
					milestones_data += '<select class="resize-y border rounded-md w-full" name="milestone['+key+'][status]">';
						if (value.milestone_status == "Pending") {
							milestones_data += '<option value="Pending" selected>Pending</option>';
						}
						else {
							milestones_data += '<option value="Pending">Pending</option>';
						}
						
						if (value.milestone_status == "Inprogress") {
							milestones_data += '<option value="Inprogress" selected>Inprogress</option>';
							$('#inprogress_alert').append('Milestone-'+(key+1)+' is in progress. <br/>');
						}
						else {
							milestones_data += '<option value="Inprogress">Inprogress</option>';
						}

						if (value.milestone_status == "Completed") {
							milestones_data += '<option value="Completed" selected>Completed</option>';
						}
						else {
							milestones_data += '<option value="Completed">Completed</option>';
						}

						
					milestones_data += '</select>';
					milestones_data += '<p class="error_proposal text-red-500 hidden">Proposal is required</p>';
					milestones_data += '</div>';
			    	
			    	$('#milestones_data').append(milestones_data);
				});
			});
		}

		toggleModal();
	})

	var openmodal = document.querySelectorAll('.modal-open')
	for (var i = 0; i < openmodal.length; i++) {
	  openmodal[i].addEventListener('click', function(event){
		event.preventDefault()
		toggleModal()
	  })
	}

	const overlay = document.querySelector('.modal-overlay')
	overlay.addEventListener('click', toggleModal)

	var closemodal = document.querySelectorAll('.modal-close')
	for (var i = 0; i < closemodal.length; i++) {
	  closemodal[i].addEventListener('click', toggleModal)
	}

	document.onkeydown = function(evt) {
	  evt = evt || window.event
	  var isEscape = false
	  if ("key" in evt) {
		isEscape = (evt.key === "Escape" || evt.key === "Esc")
	  } else {
		isEscape = (evt.keyCode === 27)
	  }
	  if (isEscape && document.body.classList.contains('modal-active')) {
		toggleModal()
	  }
	};

	function toggleModal () {
	  const body = document.querySelector('body')
	  const modal = document.querySelector('.modal')
	  modal.classList.toggle('opacity-0')
	  modal.classList.toggle('pointer-events-none')
	  body.classList.toggle('modal-active')
	}
</script>

<script>
    $(document).ready(function() {
        
        var table = $('#work_in_progress').DataTable( {
        	rowReorder: {
	            selector: 'td:nth-child(2)'
	        },
                responsive: true
            } )
            .columns.adjust()
            .responsive.recalc();
    } );
</script>