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

    $sql = "SELECT option_name,streams.id ,stream_name FROM options,streams WHERE
     streams.option_id = options.id AND streams.class_id = $id";
 
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

    $sql = "SELECT streams.id,stream_name,class_name 
    FROM 
    classes, streams WHERE streams.class_id = classes.id and classes.id = '$id'

";
 
     if($res = mysqli_query($con,$sql)){
         ?> <option selected="selected" disabled>Select Stream</option>
         <?php
        while($row = mysqli_fetch_array($res)){
            if(isset($row['stream_name'])){
            echo "<option name='stream_name' value =" . $row['id']  . ">" . $row['stream_name']  ."</option>";
            }
            else{
                echo "0";
            }
    }
    // Free result set
} else{
    echo "1";

}
 }
  ?>