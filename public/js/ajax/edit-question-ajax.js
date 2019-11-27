  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); 

    $(document).on('click', '.edit-question', function(a){

      a.preventDefault();

      let id = $(this).data('id');   // it will get id of clicked row
      $("#modaltitle").html("<i class='mdi mdi-pencil'></i> Edit");
       $(".modal-dialog").addClass("modal-lg");
       $("script").remove(".tiny");

      $('#crud-content').html(''); // leave it blank before ajax call
      $('#modal-loader').show();      // load ajax loader

      $.ajax({
        url: '/admin/question/edit',
        type: 'GET',
        data: 'id='+id,
        dataType: 'html'
      })
      .done(function(data){
        $('#crud-content').html('');
        $('#crud-content').html(data); // load response
        $('#modal-loader').hide();      // hide ajax loader
      })
      .fail(function(){
        $('#crud-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#modal-loader').hide();
      });
    });    
  }); 