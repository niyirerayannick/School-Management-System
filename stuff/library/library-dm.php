<?php
include("../config.php");
  if($_POST["formId"] == 'lendNewBook'){
     addNewBook($_POST["student_library"],$_POST['book_name'],$_POST['pickup_date'],$_POST['submission_date']);
   }

  elseif($_POST["formId"] == 'deleteLibraryBtn'){
    deleteBook($_POST['value']);
   }
  elseif($_POST["formId"] == 'selectUpdateBook'){
    selectUpdateBook($_POST['value']);
  }
  elseif($_POST["formId"] == 'updateBook'){
    updateBook($_POST["bookname"],$_POST["id"],$_POST["status"],$_POST["sdate"]);
  }

  
  function addNewBook($student,$book,$pickup_date,$submission_date){
    include("../config.php");
       $sql = "INSERT INTO `library` (`id`, `student_id`,`bookname`,`pdate`,`sdate`,`status`) 
       VALUES (NULL, '$student','$book','$pickup_date','$submission_date','not submitted');";
     
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
    
  function updateBook($var,$id,$status,$sdate){
    include("../config.php");

       $sql = "UPDATE library SET `bookname` = '$var', `status` = '$status',`sdate` = '$sdate' where id = '$id'";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
   
  function deleteBook($id){
    include("../config.php");
 
       $sql = "DELETE  FROM library where id = '$id'";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation! 
          </div>";
         }
  }

  function selectUpdateBook($var){
      include("../config.php");
  
               $sql = "SELECT * FROM library WHERE id = '$var'";
            
                if($res = mysqli_query($con,$sql)){
                  $row = mysqli_fetch_array($res);
                  ?><div id='view'>
                  <section class='content-header'>
                        <div class='container-fluid'>
                          <div class='row mb-2'>
                            <div class='col-sm-6'>
                              <h1>Library</h1>
                            </div>
                            <div class='col-sm-6'>
                              <ol class='breadcrumb float-sm-right'>
                                <li class='breadcrumb-item'><a href='#'>Home</a></li>
                                <li class='breadcrumb-item active'>Update Book Details</li>
                              </ol>
                            </div>
                          </div>
                        </div><!-- /.container-fluid -->
                      </section>
                  
                      <!-- Main content -->
                      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Update Book Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="min-height:600px">
              <div class="row">
          <!-- left column -->
          <div class="col-md-9">
            <!-- general form elements -->
             <form >
                <div class="card-body">
                <div class="row">
           <div class="col-md-1"></div>
              <div class="col-md-9">
            <div class="card mt-2 ml-2">
              <!-- /.card-header -->
              <div class="card-body">
                                  <div class='form-group'>
                                      <label name='class-name'>BookName Name</label>
                                      <input type='hidden' name='formId' value ='updateBook'>
                                      <input type='hidden' id='addNewClassId' name='id' value = "<?php echo htmlentities($row['id']) ?>" >
                                      <input type='text' class='form-control' id='bookname' value = "<?php echo htmlentities($row['bookname']) ?>"
                                        name='bookname' required>
                                  </div>
                                  <div class='form-group'>                            
                               </div>
                               <div class='form-group'>
                                   <label name='class-name'>Submission date</label>
                                   <input type='date' class='form-control' id='className' value = "<?php echo htmlentities($row['sdate']) ?>"
                                   name='sdate' required>
                               </div>
                               <div class='form-group clearfix'>
                                 <div class='icheck-primary d-inline'>
                                    <input type='radio' id='male' name='status' value='submitted'>
                                    <label for='male'> Submitted
                                    </label>
                                 </div>
                               <div class='icheck-danger d-inline'>
                                   <input type='radio' id='female' name='status' value='not submitted'>
                                   <label for='female'> Not Submitted
                                   </label>
                               </div>
                               </div>
                                   <button type='submit' class='btn btn-success' id='updateLibraryBtn'>Update Hostel</button>
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
                    echo "<div hostel='alert alert-danger' role='alert'>
                    There are was a problem performing the operation! 
                  </div>";
        }
    
  }
?>
