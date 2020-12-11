<?php
include("../config.php");
<<<<<<< HEAD
  if($_POST["formId"] == 'addNewClass'){
    if(!isset($_POST["class-name"])){
      addNewClass($_POST["class-name"],$_POST['option_name'],$_POST['stream_name']);
    }
    else{
      addNewClass($_POST["class-name"],'NULL',$_POST['stream_name']);
    }
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

  
  function addNewClass($var,$option,$stream){
    include("../config.php");
      if($option !== 'NULL'){
       $sql = "INSERT INTO `classes` (`id`, `class_name`,`option_id`,`stream_name`) 
       VALUES (NULL, '$var','$option','$stream');";
      }else{
        $sql = "INSERT INTO `classes` (`id`, `class_name`,`option_id`,`stream_name`) 
        VALUES (NULL, '$var',NULL,'$stream');";
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
=======
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
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
<<<<<<< HEAD
            There are was a problem performing the operation! 
          </div>";
         }
  }

  function selectUpdateClass($var){
    include("../config.php");

             $sql = "SELECT classes.id as classid,options.id as optionid,class_name FROM classes,options
              WHERE classes.id = '$var'
             ";
          
              if($res = mysqli_query($con,$sql)){
                $row = mysqli_fetch_array($res);?>
                 <div id='view'>
                  <section class='content-header'>
                        <div class='container-fluid'>
                          <div class='row mb-2'>
                            <div class='col-sm-6'>
                              <h1>Class</h1>
                            </div>
                            <div class='col-sm-6'>
                              <ol class='breadcrumb float-sm-right'>
                                <li class='breadcrumb-item'><a href='#'>Home</a></li>
                                <li class='breadcrumb-item active'>Update Class Details</li>
                              </ol>
                            </div>
                          </div>
                        </div><!-- /.container-fluid -->
                      </section>
                  
                      <!-- Main content -->
                      <section class='content'>
                        <div class='container-fluid'>
                          <div class='row'>
                            <div class='col-12'>
                              <div class='card'>
                                <div class='card-header'>
                                  <h3 class='card-title'>Update Class Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class='card-body table-responsive p-0'>
                                <div class='row'>
                            <!-- left column -->
                            <div class='col-md-6'>
                              <!-- general form elements -->
                               <form >
                                  <div class='card-body' style='min-height:550px'>
                                  
                                   <div class='form-group'>
                                      <label name='class-name'>New Class Name</label>
                                      <input type='hidden' id='addNewClassForm' name='formId' value ='updateClass'>
                                      <input type='hidden' id='addNewClassId' name='id' 
                                      value= "<?php echo htmlentities($row['id']) ?>">
                                      
                                      <input type='text' class='form-control' id='className'
                                       value= "<?php echo $row['class_name']; ?>"
                                      name='class-name' >
                                   </div>
                                   <button type='submit' class='btn btn-success' id='updateClassBtn'>Update Class</button>

                                  </div>
                                  <!-- /.card-body -->
                    
                                </form>
                              </div>
                              <!-- /.card -->
                  
                                </div>
                                <!-- /.card-body -->
                              </div>
                              <!-- /.card -->
                            </div>
                          </div>
                          <!-- /.row -->
                  
                              <!-- /.card -->
                            </div>
                          </div>
                          <!-- /.row -->
                        </div><!-- /.container-fluid -->
                      </section>
                      <!-- /.content -->
                      </div>
                  
                 <?php
                }
               else{
                  echo "<div class='alert alert-danger' role='alert'>
                  There are was a problem performing the operation! 
                </div>";
      }
  }

  
=======
            There are was a problem performing the operation!
          </div>";
         }
        }
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
?>
