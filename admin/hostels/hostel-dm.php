<?php
include("../config.php");
  if($_POST["formId"] == 'addNewHostel'){
    $hostel = $_POST["hostel_name"];
     addNewHostel($hostel,$_POST["capacity"],$_POST["status"]);
   }

  elseif($_POST["formId"] == 'deletehostelBtn'){
    deletehostel($_POST['value']);
   }
   
  elseif($_POST["formId"] == 'selectUpdatehostel'){
    selectUpdatehostel($_POST['value']);
  }

  elseif($_POST["formId"] == 'updateHostel'){
    updatehostel($_POST["hostel_name"],$_POST['capacity'],$_POST["status"],$_POST["id"]);
  }


  function addNewhostel($name,$capacity,$status){
    include("../config.php");

       $sql = "INSERT INTO `hostels` (`id`, `hostel_name`,`capacity`,`status`) VALUES (NULL, '$name','$capacity','$status')";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div hostel='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
   

  function updatehostel($name,$capacity,$status,$id){
    include("../config.php");

       $sql = "UPDATE `hostels` SET `hostel_name` = '$name', `capacity` = '$capacity', `status` = '$status' WHERE `hostels`.`id` = '$id';
       ";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div hostel='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
   
  function deletehostel($id){
    include("../config.php");
 
       $sql = "DELETE  FROM hostels where id = '$id'";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div hostel='alert alert-danger' role='alert'>
            There are was a problem performing the operation! 
          </div>";
        }
    }

  function selectUpdatehostel($var){
    include("../config.php");

             $sql = "SELECT * FROM hostels WHERE id = '$var'";
          
              if($res = mysqli_query($con,$sql)){
                $row = mysqli_fetch_array($res);
                ?><div id='view'>
                <section class='content-header'>
                      <div class='container-fluid'>
                        <div class='row mb-2'>
                          <div class='col-sm-6'>
                            <h1>Hostel</h1>
                          </div>
                          <div class='col-sm-6'>
                            <ol class='breadcrumb float-sm-right'>
                              <li class='breadcrumb-item'><a href='#'>Home</a></li>
                              <li class='breadcrumb-item active'>Update Hostel Details</li>
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
                                <h3 class='card-title'>Update Hostel Details</h3>
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
                               
                                </div>
                                <div class='form-group'>
                                    <label name='class-name'>Hostel Name</label>
                                    <input type='hidden' name='formId' value ='updateHostel'>
                                    <input type='hidden' id='addNewClassId' name='id' value = "<?php echo htmlentities($row['id']) ?>" >
                                    <input type='text' class='form-control' id='HostelName' value = "<?php echo htmlentities($row['hostel_name']) ?>"
                                      name='hostel_name' required>
                                </div>
                                <div class='form-group'>                            
                             </div>
                             <div class='form-group'>
                                 <label name='class-name'>Hostel Capacity</label>
                                 <input type='text' class='form-control' id='className' value = "<?php echo htmlentities($row['capacity']) ?>"
                                 name='capacity' required>
                             </div>
                             <div class='form-group clearfix'>
                               <div class='icheck-primary d-inline'>
                                  <input type='radio' id='male' name='status' value='available'>
                                  <label for='male'> Available
                                  </label>
                               </div>
                             <div class='icheck-danger d-inline'>
                                 <input type='radio' id='female' name='status' value='unavailable'>
                                 <label for='female'> Unavailable
                                 </label>
                             </div>
                             </div>
                                 <button type='submit' class='btn btn-success' id='updateHostelBtn'>Update Hostel</button>
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
