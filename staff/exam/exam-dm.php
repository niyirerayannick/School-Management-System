<?php
include("../config.php");
  if($_POST["formId"] == 'addExamResult'){
    addExamResult($_POST["student_id"],$_POST['subject_id'],$_POST['category_id'],$_POST['academic_year'],$_POST['marks']);
   }
   
  elseif($_POST["formId"] == 'deleteClassBtn'){
    deleteClass($_POST['value']);
   }
  elseif($_POST["formId"] == 'selectUpdateClass'){
    selectUpdateClass($_POST['value']);
  }
  elseif($_POST["formId"] == 'updateClass'){
    updateClass($_POST["class-name"],$_POST["id"]);
  }

  
  function addExamResult($student,$subject,$exam,$year,$marks){
    include("../config.php");
       $sql = "INSERT INTO `examresults` (`id`, `student_id`, `subject_id`, `session_id`, `Marks`, `exam_category`) 
       VALUES (NULL, '$student', '$subject', '$year', '$marks', '$exam')";

        if (!mysqli_query($con,$sql)){
        echo("Error description: " . mysqli_error($con));
         //handle erro
        }
        else{
          //handle success
        }
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
    
  function updateClass($var,$id){
    include("../config.php");

       $sql = "UPDATE classes SET Name = '$var' where id = '$id'";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
   
  function deleteClass($id){
    include("../config.php");
 
       $sql = "DELETE  FROM classes where id = '$id'";
    
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
