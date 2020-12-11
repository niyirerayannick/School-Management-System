<?php
include("../config.php");
//$filename = $_FILES["EmployeePhoto"]["name"];
if($_POST["formId"] == 'addNewEmployee'){
 addNewEmployee($_POST['fullName'],$_POST['email'],$_POST['gender'],$_POST['experience'],$_POST['salary_increase_date'],
 $_POST['next_of_keen'], $_POST['qualification'],$_POST['address'],$_POST['dob'],$_POST['title'],$_POST['salary']);
   }
 elseif ($_POST["formId"] == 'selectUpdateEmployee') {
     selectUpdateEmployee($_POST['value']);
}
elseif ($_POST["formId"] == 'deleteEmployeeBtn') {
  deleteEmployee($_POST['value']);
}
 
elseif($_POST["formId"] == 'updateEmployee'){
  updateEmployee($_POST["employee_name"],$_POST['email'],$_POST["status"],$_POST['salary'], $_POST['next_of_keen'],$_POST['qualification'],
  $_POST['dob'], $_POST["address"],$_POST["id"]);
}


function updateEmployee($name,$email,$status,$salary,$next_of_keen,$qualification,$dob,$address,$id){
  include("../config.php");

     $sql = "UPDATE `hr` SET
      `employee_name` = '$name', `address` = '$address', `next_of_keen` = '$next_of_keen', `salary` = '$salary',
       `email` = '$email',`qualification` = '$qualification', `status` = '$status', `DOB` = '$dob'
   WHERE `hr`.`id` = '$id'";
  
      if($res = mysqli_query($con,$sql)){
          echo "1";
        }
       else{
          echo "<div hostel='alert alert-danger' role='alert'>
          There are was a problem performing the operation!
        </div>";
    }
}
 

function addNewEmployee($name,$email,$gender,$experience,$salary_increase_date,$next_of_keen,$qualification,$address,
$dob,$title,$salary){
    include("../config.php");
       $sql = "INSERT INTO `hr` 
    (`id`, `employee_name`, `Gender`, `DOB`, `address`, `next_of_keen`, `salary_increase_date`,
     `title`, `salary`, `email`, `qualification`, `entry_date`, `status`,`experience`) 
     VALUES
      (NULL, '$name', '$gender', '$dob', '$address', '$next_of_keen', '$salary_increase_date', '$title', 
      '$salary', '$email', '$qualification', 'current_timestamp()', 'active','$experience');";
    
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

function deleteEmployee($id){
  include("../config.php");
  $sql = "DELETE  FROM hr WHERE id = '$id'";

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

  function selectUpdateEmployee($id){
    include("../config.php");
       $sql = "SELECT * FROM hr where id ='$id'";
    
        if($res = mysqli_query($con,$sql)){
          $row = mysqli_fetch_array($res);

          echo" <div id='view'>
    
          <section class='content-header'>
                <div class='container-fluid'>
                  <div class='row mb-2'>
                    <div class='col-sm-6'>
                      <h1>Employees</h1>
                    </div>
                    <div class='col-sm-6'>
                      <ol class='breadcrumb float-sm-right'>
                        <li class='breadcrumb-item'><a href='#'>Home</a></li>
                        <li class='breadcrumb-item active'>Add new Employee</li>
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
                          <h3 class='card-title'>Add New Employee</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class='card-body table-responsive p-0'>
                        <div class='row'>
                     <div class='col-md-1'></div>
                        <div class='col-md-9'>
                      <div class='card mt-2 ml-2'>
                        <!-- /.card-header -->
                        <div class='card-body'>
                      <!-- general form elements -->
                        <form>
                          <div class='card-body'>
                          <div class='form-group'>
                              <label for='exampleInputEmail1'>Employee's Full Name</label>
                              <input type='text' class='form-control form-control-sm' id='fullName' name='employee_name' value= " . $row['employee_name'] .">
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Email</label>
                              <input type='email' class='form-control form-control-sm' id='email' value= " . $row['email'] ." name='email'>
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Salary</label>
                              <input type='number' class='form-control form-control-sm' id='salary' value= " . $row['salary'] ." name='salary'>
                            </div>
                              <div class='form-group clearfix'>
                              <label for='exampleInputPassword1'>Status</label></br>
                               <div class='icheck-success d-inline'>
                                 <input type='radio' id='male' name='status' value='active'>
                                 <label for='male'> Active
                                 </label>
                                </div>
                                <div class='icheck-danger d-inline'>
                                  <input type='radio' id='female' name='status' value='inactive'>
                                  <label for='female'> Not Active
                                  </label>
                                </div>
                              </div>
                              <div class='form-group'>
                              <label for='exampleInputPassword1'>Address</label>
                              <input type='text' class='form-control form-control-sm' id='address' value= " . $row['address'] ." name='address'>
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Next Of Keen</label>
                              <input type='text' class='form-control form-control-sm' id='next-of-keen' value= " . $row['next_of_keen'] ." name='next_of_keen'>
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Qualifications</label>
                              <input type='text' class='form-control form-control-sm' id='qualification' value= " . $row['qualification'] ." name='qualification'>
                            </div>
                          <div class='form-group'>
                              <label for='exampleInputEmail1'>Date Of Birth</label>
                              <input type='date' class='form-control form-control-sm' name ='dob' id='dob' value= " . $row['DOB'] .">
                              
                              
                            </div>
                    
                          </div>
                          <!-- /.card-body -->
                          <input type='hidden' id='addNewEmployeeForm' name='formId' value ='updateEmployee'>
                          <input type='hidden' id='addNewEmployee' name='id' value =" . $row['id'] .">

                          <div>
                            <button type='submit' class='btn btn-success' id='updateEmployeeBtn'>Update Employee Info</button>
                            <button type='reset' class='btn btn-danger float-right'>Cancel</button>
                          </div>
                        </form>"
                              ;
 
         }
        }
?>
