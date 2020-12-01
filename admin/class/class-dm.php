<?php
include("../config.php");
$class = $_POST["class-name"];

  if($_POST["formId"] == 'addNewClass'){
  addNewClass($class);
   }
elseif($_POST["formId"] == 'deleteStudent'){
  deleteClass($class);
   }
   function deleteClass($id){
    include("../config.php");
    $sql = "DELETE  FROM classes WHERE id = '$id'";
  
     if($res = mysqli_query($con,$sql)){
         echo "1";
       }
      else{
         echo "<div class='alert alert-danger' role='alert'>
         There are was a problem performing the operation!
       </div>" ;
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
  
       }
  }

function addNewClass($var){
    include("../config.php");
       $sql = "INSERT INTO `classes` (`id`, `Name`) VALUES (NULL, '$var');";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
        }
?>
