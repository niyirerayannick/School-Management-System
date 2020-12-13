<?php
include("../config.php");
  if($_POST["formId"] == 'changeFeeStructure'){
    if(isset($_POST["option_name"])){
      addNewFees($_POST["class_name"],$_POST['option_name'],$_POST['amount']);
    }
    else{
      addNewFees($_POST["class_name"],'NULL',$_POST['amount']);
    }
   }
  elseif($_POST["formId"] == 'deleteFeesBtn'){
    deleteFees($_POST['value']);
   }
  elseif($_POST["formId"] == 'selectUpdateFees'){
    selectUpdateFeeStructure($_POST['value']);
  }
  elseif($_POST["formId"] == 'updateFees'){
    updateFees($_POST["fees-name"],$_POST["id"]);
  }

  
  function addNewFees($class,$option,$amount){
    include("../config.php");
      if($option !== 'NULL'){
       $sql = "INSERT INTO `fees_structure` (`id`, `class_id`,`option_id`,`amount`) 
       VALUES (NULL, '$class','$option','$amount');";
      }else{
        $sql = "INSERT INTO `fees_structure` (`id`, `class_id`,`option_id`,`amount`) 
        VALUES (NULL, '$class','$option','$amount');";
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

  function sel($var){
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

  
?>
