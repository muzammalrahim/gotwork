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