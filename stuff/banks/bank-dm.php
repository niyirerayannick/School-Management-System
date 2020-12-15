<?php
include("../config.php");
  if($_POST["formId"] == 'addNewBank'){
    $Bank = $_POST["bank_name"];
     addNewBank($Bank,$_POST['bank_account']);
   }

  elseif($_POST["formId"] == 'deleteBankBtn'){
    deleteBank($_POST['value']);
   }
   
  elseif($_POST["formId"] == 'selectUpdateBank'){
    selectUpdateBank($_POST['value']);
  }

  elseif($_POST["formId"] == 'updateBank'){
    updateBank($_POST["Bank_name"],$_POST["Bank_account"],$_POST["id"]);
  }


  function addNewBank($name,$account){
    include("../config.php");

       $sql = "INSERT INTO `banks` (`id`, `bank_name`,`account_number`) VALUES (NULL, '$name','$account')";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div Bank='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
    
  function updateBank($name,$account,$id){
    include("../config.php");

       $sql = "UPDATE `banks` SET `bank_name` = '$name', `account_name` = '$account' WHERE `banks`.`id` = '$id';";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation!
          </div>";
         }
  }
   
  function deleteBank($id){
    include("../config.php");
 
       $sql = "DELETE  FROM Banks where id = '$id'";
    
        if($res = mysqli_query($con,$sql)){
            echo "1";
          }
         else{
            echo "<div class='alert alert-danger' role='alert'>
            There are was a problem performing the operation! 
          </div>";
        }
    }

  function selectUpdateBank($var){
    include("../config.php");
             $sql = "SELECT * FROM Banks WHERE id = '$var'";
          
              if($res = mysqli_query($con,$sql)){
                $row = mysqli_fetch_array($res);
                ?>
                <div id='view'>
                <section class='content-header'>
                      <div class='container-fluid'>
                        <div class='row mb-2'>
                          <div class='col-sm-6'>
                            <h1>Bank</h1>
                          </div>
                          <div class='col-sm-6'>
                            <ol class='breadcrumb float-sm-right'>
                              <li class='breadcrumb-item'><a href='#'>Home</a></li>
                              <li class='breadcrumb-item active'>Update Bank Details</li>
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
                                <h3 class='card-title'>Update Bank Details</h3>
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
                                    <label name='class-name'>Bank Name</label>
                                    <input type='hidden' name='formId' value ='updateBank'>
                                    <input type='hidden' id='addNewClassId' name='id'  value = "<?php echo htmlentities($row['id']) ?>">
                                    <input type='text' class='form-control' id='BankName'  value = "<?php echo htmlentities($row['bank_name']) ?>"
                                      name='Bank_name' required>
                                </div>
                                 <div class='form-group'>
                                    <label name='class-name'>Bank Account</label>
                                    <input type='text' class='form-control' id='BankAccount'  value = "<?php echo htmlentities($row['account_number']) ?>"
                                     name='Bank_account' required>
                                </div>
                                <div class='form-group'>                            
                             </div>
                                 <button type='submit' class='btn btn-success' id='updateBankBtn'>Update Bank</button>
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
                  echo "<div Bank='alert alert-danger' role='alert'>
                  There are was a problem performing the operation! 
                </div>";
      }
  }
?>
