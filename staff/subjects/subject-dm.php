<?php
include("../config.php");
  if($_POST["formId"] == 'addNewSubject'){
    $subject = $_POST["subject_name"];
     addNewsubject($subject);
   }

  elseif($_POST["formId"] == 'deleteSubjectBtn'){
    deletesubject($_POST['value']);
   }
   
  elseif($_POST["formId"] == 'selectUpdateSubject'){
    selectUpdatesubject($_POST['value']);
  }

  elseif($_POST["formId"] == 'updatesubject'){
    updateSubject($_POST["subject_name"],$_POST["id"]);
  }


  function addNewsubject($name){
    include("../config.php");

       $sql = "INSERT INTO `subjects` (`id`, `subject_name`) VALUES (NULL, '$name')";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div subject='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
    
  function updateSubject($name,$id){
    include("../config.php");

       $sql = "UPDATE `subjects` SET `subject_name` = '$name' WHERE `subjects`.`id` = '$id'";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div subject='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
   
  function deletesubject($id){
    include("../config.php");
 
       $sql = "DELETE  FROM subjects where id = '$id'";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div subject='alert alert-danger' role='alert'>
            There are was a problem performing the operation! 
          </div>";
        }
    }

  function selectUpdatesubject($var){
    include("../config.php");
             $sql = "SELECT * FROM subjects WHERE id = '$var'";
          
              if($res = mysqli_query($con,$sql)){
                $row = mysqli_fetch_array($res);?>
                <div id='view'>
                <section class='content-header'>
                      <div class='container-fluid'>
                        <div class='row mb-2'>
                          <div class='col-sm-6'>
                            <h1>subject</h1>
                          </div>
                          <div class='col-sm-6'>
                            <ol class='breadcrumb float-sm-right'>
                              <li class='breadcrumb-item'><a href='#'>Home</a></li>
                              <li class='breadcrumb-item active'>Update subject Details</li>
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
                                <h3 class='card-title'>Update subject Details</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class='card-body table-responsive p-0' style='min-height:550px'>
                              <div class='row'>
                          <!-- left column -->
                          <div class='col-md-6'>
                            <!-- general form elements -->
                             <form >
                              <div class='card-body'>
                                <div class='form-group'>
                                    <label name='class-name'>Subject Name</label>
                                    <input type='hidden' name='formId' value ='updatesubject'>
                                    <input type='hidden' id='addNewClassId' name='id' value = "<?php echo htmlentities($row['id']) ?>">
                                    <input type='text' class='form-control' id='subjectName' value= "<?php echo htmlentities($row['subject_name']) ?>"
                                      name='subject_name' >
                                </div>
                                <div class='form-group'>                            
                             </div>
                                 <button type='submit' class='btn btn-success' id='updateSubjectBtn'>Update subject</button>
                                 <button type='reset' class='btn btn-danger float-right' > Cancel</button>


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
                  echo "<div subject='alert alert-danger' role='alert'>
                  There are was a problem performing the operation! 
                </div>";
      }
  }
?>
