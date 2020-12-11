<?php
include("config.php");
  if($_POST["formId"] == 'getOption'){
   getOption($_POST['class_id']);
  }
  elseif($_POST["formId"] == 'getStream'){
    getStream($_POST['class_id']);
  }
  




function getOption($id){
    include("config.php");

    $sql = "SELECT * FROM options where options.class_id = $id";
 
     if($res = mysqli_query($con,$sql)){
         ?> <option selected="selected" disabled>Select Option</option>
         <?php
        while($row = mysqli_fetch_array($res)){
            echo "<option name='option_name' value =" . $row['id']  . ">" . $row['option_name']  . "(" . $row['stream_name']  . ")</option>";
    }
    // Free result set
} 
else{
    echo "<option disabled selected >No Options(Combinations) Currently</option>
    ";
}
 }


function getStream($id){
    include("config.php");

    $sql = "SELECT options.id,stream_name FROM classes,options where options.class_id = classes.id and classes.class_name = 's1'
";
 
     if($res = mysqli_query($con,$sql)){
         ?> <option selected="selected" disabled>Select Stream</option>
         <?php
        while($row = mysqli_fetch_array($res)){
            echo "<option name='stream_name' value =" . $row['id']  . ">" . $row['stream_name']  . "</option>";
    }
    // Free result set
} else{
    echo "<option disabled selected >No Streams Currently</option>
    ";
}
 }
  ?>