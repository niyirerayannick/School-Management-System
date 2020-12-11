<?php
include("config.php");
  if($_POST["formId"] == 'getOption'){
   getOption($_POST['class_id']);
  }
  elseif($_POST["formId"] == 'getStream'){
    getStream($_POST['option_id']);
  }
  




function getOption($id){
    include("config.php");

    $sql = "SELECT * FROM options where options.class_id = $id";
 
     if($res = mysqli_query($con,$sql)){
         ?> <option selected="selected" disabled>Select Option</option>
         <?php
        while($row = mysqli_fetch_array($res)){
            echo "<option name='option_id' value =" . $row['id']  . ">" . $row['option_name']  . "(" . $row['stream_name']  . ")</option>";
    }
    // Free result set
} else{
    echo "<option disabled selected >No Options(Combinations) Currently</option>
    ";
}
 }
function getStream($id){
    include("config.php");

    $sql = "SELECT class_stream FROM class,options where options.id = $id and opti";
 
     if($res = mysqli_query($con,$sql)){
         ?> <option selected="selected" disabled>Select Option</option>
         <?php
        while($row = mysqli_fetch_array($res)){
            echo "<option name='option_id' value =" . $row['id']  . ">" . $row['option_name']  . "</option>";
    }
    // Free result set
} else{
    echo "<option disabled selected >No Options(Combinations) Currently</option>
    ";
}
 }
  ?>