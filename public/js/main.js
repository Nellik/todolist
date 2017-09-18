$(document).ready(function() {
    $('#todos_table').DataTable();

  $('#test').bootstrapValidator({
      feedbackIcons: {
          valid: 'glyphicon glyphicon-ok',
          invalid: 'glyphicon glyphicon-remove',
          validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
          fileupload: {
              validators: {
                  file: {
                      extension: 'jpeg,JPEG,jpg,JPG,gif,GIF,png,PNG',
                      maxSize: 320 * 240,
                      type: 'image/png, image/jpeg',
                      message: 'The selected file is not valid, it should be (jpg,png,gif) and 320*240 at maximum size.'
                  }
              }
          }
      }
  });

  $('#preview').hide();

  $('#preview_btn').on('click', function(e){
      e.preventDefault();

      // get elements values
      creator = $('#creator').val();
      email = $('#email').val();
      description = $('#description').val();
      status = $('#statusSelect').val();
      image = $('#fileupload').val();

      // set elements values
      $("#pCreator").text(creator);
      $("#pEmail").text(email);
      $("#pDescription").text(description);
      $("#pStatusSelect").text(status);
      $("#pImage").text(image);

      $('#preview').show();
    });
});
