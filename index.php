<!DOCTYPE html>
<html>
<head>
  <title>PHP Ajax Multiple Image Upload with Preview Example</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" charset="utf-8"></script>
  <script src="ajax.js" charset="utf-8"></script>


  <style type="text/css">
  body{
    background:skyblue;
  }
    input[type=file]{
      display: inline;
    }
    #image_preview{
      border: 1px solid white;
    }
    #image_preview img{
      width: 200px;
      padding: 5px;
    }
    .container{
      background: white;
      margin-top:10vh;
      max-height: 300px;
      overflow:hidden;
      transition:2s linear;
    }
    .jumbotron{
      background: white;
    }
  </style>


</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>PHP Ajax Multiple Image Upload with Preview Example</h1>
      <br>
      <br>
      <br>
      <form class="swapuploadform" action="process.php" method="post" enctype="multipart/form-data">
          <input type="file" id="uploadFile" name="uploadFile[]" accept=".jpg, .jpeg, .png" filelist multiple/>
          <br>
          <br>
          <br>
          <input type="submit" class="btn btn-success" id="imguploadbtn" name='submitImage' value="Upload Image"/><span id="uploadingmsg"></span>
      </form>


      <br/>
      <div class="jumbotron" id="image_preview"></div>
      <br>
      <br>
      <h1 class="uploadformreply text-center">

      </h1>


    </div>
  </div>
</div>
</body>


<script type="text/javascript">


  $("#uploadFile").change(function(){
     $('#image_preview').html("");
     var total_file=document.getElementById("uploadFile").files.length;
     for(var i=0;i<total_file;i++)
     {
      $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
      $('.container').css('max-height', '100%');
     }

  });



</script>
</html>
