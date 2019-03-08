<?php


if(isset($_FILES['uploadFile']))
{
  $output = "";
  $so_images   =  $_FILES['uploadFile'];
  foreach ($so_images['name'] as $key => $name){
              if ($so_images['error'][$key] === 0) {
                // code...
                  $temp = $so_images['tmp_name'][$key];
                  $size = $so_images['size'][$key];
                  $ext = explode('.', $name);
                  //$initname = $ext[0];
                  $initname = "swapmarket"; //use your own prefix here.
                  $ext = strtolower(end($ext));
                  $allowed =['jpg', 'jpeg', 'png'];
                  if(in_array($ext, $allowed) && $ext<100000 ){
                    // code to send to swap class
                  $filename = $initname.md5_file($temp).time().".". $ext;
                  if (move_uploaded_file($temp, "imageupload/{$filename}")) {
                    // code...
                      $succeded[]= array(
                       $filename,
                    ); //these array contains images that have no error

                    //save into database


                  }else{
                   echo "file upload failed";
                  }
                  }
              }//testing for each file has no error
            }//working with each file
            if ($succeded != "") {

              $output .= count($succeded) . ' ' . "images uploaded";
              //use sql to pass your imagenames in json format to database here.
              //i use pdo/oop if you use that too i can help, i just made this in hurry
              echo $output;
            }else {
              $output.= "zero files uploaded IDIOT";
              echo $output;
            }


	exit();
}
?>
