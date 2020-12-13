<?php
if($_POST["formId"] == 'addTimeTable'){

    $img = $_FILES["timetable"]["name"];// stores the original filename from the client
    $tmp = $_FILES["timetable"]["tmp_name"];// stores the name of the designated temporary file
    //$errorimg = $_FILES["image"][“error”];// stores any error code resulting from the transfer
    
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
    $path = '../img/'; // upload directory
    
    $img = $_FILES['timetable']['name'];
    $tmp = $_FILES['timetable']['tmp_name'];
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    // check's valid format
    if(in_array($ext, $valid_extensions)) 
    { 
    $path = $path.strtolower($final_image); 
    if(move_uploaded_file($tmp,$path)) 
     {
        if(isset($_POST['option_name']))
        {
      addTimeTable($_POST['class_name'],$_POST['option_name'],$path);
        }
      
        else{
        addTimeTable($_POST['class_name'],NULL,$path);
        }
    }
    }
    else{
      echo"invalid Image Format";
    }

}
else{
    echo"hui";
}

function addTimeTable($class,$stream,$timetable){
    include('config.php');
    if(isset($stream)){
       $sql = "INSERT INTO `timetable` (`id`, `timetable`, `class_id`, `stream_id`)
         VALUES (NULL, '$timetable', '$class', '$stream');
        ";
 
         if (!mysqli_query($con,$sql)) {
         echo("Error description: " . mysqli_error($con));
          //handle erro
         }
         else{
           //handle success
    
       echo $stream;
       echo $timetable;
       }
    }
    else{
        $sql = "INSERT INTO `timetable` (`id`, `timetable`, `class_id`, `stream_id`)
         VALUES (NULL, '$timetable', '$class', NULL);
        "; 
     if (!mysqli_query($con,$sql)) {
        echo("Error description: " . mysqli_error($con));
         //handle erro
        }
        else{
          //handle success
   
      echo $stream;
      echo $timetable;
      }
    }
}

?>
