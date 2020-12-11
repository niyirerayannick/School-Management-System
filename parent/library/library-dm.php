<?php
include("../config.php");
  if($_POST["formId"] == 'lendNewBook'){
     addNewBook($_POST["student_library"],$_POST['book_name'],$_POST['pickup_date'],$_POST['submission_date']);
   }

  elseif($_POST["formId"] == 'deleteBookBtn'){
    deleteBook($_POST['value']);
   }
  elseif($_POST["formId"] == 'selectUpdateBook'){
    selectUpdateBook($_POST['value']);
  }
  elseif($_POST["formId"] == 'updateBook'){
    updateBook($_POST["book-name"],$_POST["id"]);
  }

  
  function addNewBook($student,$book,$pickup_date,$submission_date){
    include("../config.php");
       $sql = "INSERT INTO `library` (`id`, `student_id`,`bookname`,`pdate`,`sdate`,`status`) 
       VALUES (NULL, '$student','$book','$pickup_date','$submission_date',`not submitted`);";
     
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

  function selectUpdateClass($var){
    include("../config.php");

             $sql = "SELECT * FROM classes WHERE id = '$var'";
          
              if($res = mysqli_query($con,$sql)){
                $row = mysqli_fetch_array($res);
                  echo "<div id='view'>
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
                                  <label name='class-name'>Current Class Name : " . $row['class_name'] ."</label>
                                 
                               </div>
                                   <div class='form-group'>
                                      <label name='class-name'>New Class Name</label>
                                      <input type='hidden' id='addNewClassForm' name='formId' value ='updateClass'>
                                      <input type='hidden' id='addNewClassId' name='id' value = " . $row['id'] .">
                                      <input type='text' class='form-control' id='className' placeholder='Enter The Class Name' name='class-name' required>
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
                  
                  ";
                }
               else{
                  echo "<div class='alert alert-danger' role='alert'>
                  There are was a problem performing the operation! 
                </div>";
      }
  }
?>
