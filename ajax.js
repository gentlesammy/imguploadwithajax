$(document).ready(function() {


  //ajax
let fet = document.getElementById('uploadFile');
  $('.swapuploadform').submit(function(event) {
    /* Act on the event */
    event.preventDefault();
    $('#uploadingmsg').html('uploading...');
    $('.btn').css('display', 'none');
    if (fet.files.length===0) {
        alert('at least one image required');
    }else {
      $('.borderdark').css('border-color', 'blue');
      $.ajax({
      type: "POST",                       // Type of request to be send, called as method
      url: "process.php",                  // Url to which the request is send
      data: new FormData(this),           // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,                 // The content type used when sending data to the server.
      cache: false,                       // To unable request pages to be cached
      processData: false,                 // To send DOMDocument or non processed data file it is set to false
      success: function(data) {           // A function to be called if request succeeds
      $('.uploadformreply').html(data);
      $('.btn').css('display', 'none');
      $('#uploadingmsg').html('uploaded');
      swal(
            'Good job!',
            'Image(s) uploaded successfully',
            'success'
          );
      }
      });
    }
});







});
