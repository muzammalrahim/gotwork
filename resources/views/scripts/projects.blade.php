<script>

  $( function() {


    $(document).ajaxSend(function() {
      $("#overlay").fadeIn(300);　
    });

    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 1500,
      values: [ 0, 1500 ],
      slide: function( event, ui ) {
        // $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        
        $( "#fixed_min_amount" ).val( ui.values[ 0 ] );
        $( "#fixed_max_amount" ).val( ui.values[ 1 ] );

        var fixed_min_amount = $('#fixed_min_amount').val();
        var fixed_max_amount = $('#fixed_max_amount').val();

        
        // location.href += "?fixed_min_amount=9&%20fixed_max_amount=122";

        $.ajax({
          type: 'get',
          dataType: 'html',
          url: '',
          data: "fixed_min_amount=" + fixed_min_amount + "& fixed_max_amount=" +fixed_max_amount,

          success: function ( response ) {
            console.log( response );
            
            setTimeout(function(){
              $("#overlay").fadeOut(300);
            },500);
            
            $('#updateDiv').html(response);
          }

        });
      }
    });
    $( "#fixed_min_amount" ).val( $( "#slider-range" ).slider( "values", 0 ) );
    $( "#fixed_max_amount" ).val( $( "#slider-range" ).slider( "values", 1 ) );


    $( "#slider-range-hourly" ).slider({
      range: true,
      min: 0,
      max: 80,
      values: [ 0, 80 ],
      slide: function( event, ui ) {
        // $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        
        $( "#hourly_min_amount" ).val( ui.values[ 0 ] );
        $( "#hourly_max_amount" ).val( ui.values[ 1 ] );

        var hourly_min_amount = $('#hourly_min_amount').val();
        var hourly_max_amount = $('#hourly_max_amount').val();

        
        // location.href += "?fixed_min_amount=9&%20fixed_max_amount=122";

        $.ajax({
          type: 'get',
          dataType: 'html',
          url: '',
          data: "hourly_min_amount=" + hourly_min_amount + "& hourly_max_amount=" +hourly_max_amount,

          success: function ( response ) {
            console.log( response );
            setTimeout(function(){
              $("#overlay").fadeOut(300);
            },500);
            
            $('#updateDiv').html(response);
          }

        });
      }
    });

    $( "#hourly_min_amount" ).val( $( "#slider-range-hourly" ).slider( "values", 0 ) );
    $( "#hourly_max_amount" ).val( $( "#slider-range-hourly" ).slider( "values", 1 ) );
  });


  /* Start: Ajax for search projects with type */
    $('.search_project_types').change(function check(){

      var selected_project_type = new Array(); 

      $('.search_project_types').each(function(idx, el){

        if($(el).is(':checked'))
        { 
          selected_project_type.push($(el).val());
        }

      });

      $.ajax({
        type: 'get',
        dataType: 'html',
        url: '',
        data: "selected_project_type=" + selected_project_type,

        success: function ( response ) {
          console.log( response );
          $(".projects-modal").css("display",'none');

          setTimeout(function(){
            $("#overlay").fadeOut(300);
          },500);
          
          $('#updateDiv').html(response);

          

        }
      });
    });
  /* End: Ajax for search projects with type */

  
  /* Start: Ajax for search projects with listing type */
    $('.search_project_by_listing_types').change(function check(){

      var search_project_by_listing_types = new Array(); 

      $('.search_project_by_listing_types').each(function(idx, el){

        if($(el).is(':checked'))
        { 
          search_project_by_listing_types.push($(el).val());
        }

      });

      $.ajax({
        type: 'get',
        dataType: 'html',
        url: '',
        data: "search_project_by_listing_types=" + search_project_by_listing_types,

        success: function ( response ) {
          console.log( response );
          
          $(".projects-modal").css("display",'none');

          setTimeout(function(){
            $("#overlay").fadeOut(300);
          },500);
          
          $('#updateDiv').html(response);
        }
      });
    });
  /* End: Ajax for search projects with listing type */

  /* Start: Ajax for search projects with listing type */
    $('.search_project_by_skills').change(function check(){

      var search_project_by_skills = new Array(); 

      $('.search_project_by_skills').each(function(idx, el){

        if($(el).is(':checked'))
        { 
          search_project_by_skills.push($(el).val());
        }

      });

      $.ajax({
        type: 'get',
        dataType: 'html',
        url: '',
        data: "search_project_by_skills=" + search_project_by_skills,

        success: function ( response ) {
          console.log( response );

          $(".projects-modal").css("display",'none');

          setTimeout(function(){
            $("#overlay").fadeOut(300);
          },500);
          
          $('#updateDiv').html(response);
        }
      });
    });
  /* End: Ajax for search projects with listing type */

  
</script>