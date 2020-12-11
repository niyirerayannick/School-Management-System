<?php
include("../config.php");
//$filename = $_FILES["studentPhoto"]["name"];
if($_POST["formId"] == 'addNewStudent'){
 addNewStudent($_POST['fullName'],$_POST['studentClass'],$_POST['gender'],'1999-11-01',$_POST['academicYear'],$_POST['RegNo'],
 $_POST['studentStream'],$_POST['studentHostel'],'2020-11-04',$_POST['studentCategory']);
   }
 elseif ($_POST["formId"] == 'selectUpdateStudent') {
     selectUpdateStudent($_POST['value']);
}
elseif ($_POST["formId"] == 'deleteStudentBtn') {
  deleteStudent($_POST['value']);
}
   
function addNewStudent($name,$class,$gender,$dob,$academicYear,$regno,$stream,$hostel,$doj,$category){
    include("../config.php");
       $sql = "INSERT INTO
        `students` (`id`, `FullName`, `Gender`, `DOB`, `Photo`, `RegNo`, `Class`, `Stream`, `Hostel`, `DOJ`,
         `Category`, `AcademicYear`, `TotalFees`, `AdvanceFees`, `Balance`, `Parent`) VALUES
        (NULL,'$name','$gender','$dob', NULL, $regno, $class, $stream, $hostel, '$doj',$category, $academicYear, '110000', '40000', NULL, NULL);";
    
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

function deleteStudent($id){
  include("../config.php");
  $sql = "DELETE  FROM students WHERE id = '$id'";

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

  function selectUpdateStudent($id){
    include("../config.php");
       $sql = "SELECT students.id,FullName,DOB,DOJ,RegNo,Photo,classes.Name as class_name,hostels.Name as hostel_name ,stream_name,parents.Name as parent_name,Balance,TotalFees,AdvanceFees,studentcategories.Name 
       as category_name,sessions.Year
        FROM students,classes,sessions,streams,studentcategories,hostels,parents
         where students.Class =classes.id and students.Hostel = hostels.id and students.Stream = streams.id 
       and students.Parent = parents.id and students.AcademicYear = sessions.id and students.Category = studentcategories.id and students.id = '$id'";
    
        if($res = mysqli_query($con,$sql)){
          $row = mysqli_fetch_array($res);

          echo" <div id='view'>
    
          <section class='content-header'>
                <div class='container-fluid'>
                  <div class='row mb-2'>
                    <div class='col-sm-6'>
                      <h1>Students</h1>
                    </div>
                    <div class='col-sm-6'>
                      <ol class='breadcrumb float-sm-right'>
                        <li class='breadcrumb-item'><a href='#'>Home</a></li>
                        <li class='breadcrumb-item active'>Add new student</li>
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
                          <h3 class='card-title'>Add New Student</h3>
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
                              <label for='exampleInputEmail1'>Student's Full Name</label>
                              <input type='text' class='form-control form-control-sm' id='fullName' name='fullName' value= ";  echo $row["FullName"]; echo">
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputEmail1'>Email address</label>
                              <input type='email' class='form-control form-control-sm' name ='email' id='email' placeholder='Enter email'>
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Registration Number</label>
                              <input type='number' class='form-control form-control-sm' id='RegNo' value= " . $row['RegNo'] ." name='RegNo'>
                            </div>
                            <div class='form-group'>
                            <label>Current Class :</label>  <span> " . $row['class_name'] ."</span>
                            </div>
                            <div class='form-group'>
                            <label>Change Class</label>
          <select id='studentClass' name ='studentClass' class='form-control form-control-sm select2 select2-info' data-dropdown-css-class='select2-info' style='width: 100%;' >
                              <option selected='selected' disabled>Select Student's Class</option>
                             
                        
                            </select>
                          </div>
                          <div class='form-group'>
                            <label>Option</label>
          <select name= 'studentOption' class='form-control form-control-sm select2 select2-info' data-dropdown-css-class='select2-info' style='width: 100%;'>
                              <option selected='selected' disabled>Select Student's Option</option>
                            </select>
                          </div>
                          <div class='form-group'>
                          <div class='form-group'>
                            <label>Current Stream :</label>  <span> " . $row['stream_name'] ."</span>
                            </div>
                            <label>Change Stream</label>
                <select name='studentStream' id='studentStream' class='form-control form-control-sm select2 select2-info' data-dropdown-css-class='select2-info' style='width: 100%;'>
                              <option selected='selected' disabled>Select Student's Stream</option>
                         
                            </select>
                          </div>
                          <div class='form-group'>
                            <label>Current Academic year :</label>  <span> " . $row['Year'] ."</span>
                            </div>
                          <div class='form-group'>
                            <label>Academic Year</label>
          <select name='academicYear' class='form-control form-control-sm select2 select2-info' data-dropdown-css-class='select2-info' style='width: 100%;'>
                              <option selected='selected' disabled>Select Current Academic Year</option>
                             
                            </select>
                          </div>
          
                          <div class='form-group'>
                          <div class='form-group'>
                            <label>Current Hostel :</label>  <span> " . $row['hostel_name'] ."</span>
                            </div>
                            <label>Change Student Hostel</label>
          <select name='studentHostel' class='form-control form-control-sm select2 select2-info' data-dropdown-css-class='select2-info' style='width: 100%;'>
                              <option selected='selected' disabled>Select Student's Hostel</option>
                              
                            </select>
                          </div>
          
                          <div class='form-group'>
                          <div class='form-group'>
                            <label>Current Student Perfomance :</label>  <span> " . $row['category_name'] ."</span>
                            </div>
                            <label>New Student Performance Category</label>
            <select name='studentCategory' class='form-control form-control-sm select2 select2-info' data-dropdown-css-class='select2-info' style='width: 100%;'>
                              <option selected='selected' disabled='selected'>Select Performance</option>
                              
                            </select>
                          </div>
                          <div class='form-group'>
                            <label>Date Of Birth :</label>  <span> " . $row['DOB'] ."</span>
                            </div>
                          <div class='form-group'>
                              <label for='exampleInputEmail1'>Change Date Of Birth</label>
                              <input type='date' class='form-control form-control-sm' name ='dob' id='dob'>
                              <div class='form-group'>
                              <label for='exampleInputFile'>Student Photo</label>
                              <div class='input-group'>
                                <div class='custom-file'>
                                  <input type='file' class='custom-file-input ' id='exampleInputFile' name ='studentPhoto'>
                                  <label class='custom-file-label' for='studentPhoto' >Choose file</label>
                                </div>
                                <div class='input-group-append'>
                                  <span class='input-group-text'>Upload</span>
                                </div>
                              </div>
                            </div>
                              <div class='form-group clearfix'>
                                <div class='icheck-info d-inline'>
                                  <input type='radio' id='male' name='gender' value='male'>
                                  <label for='male'> Male
                                  </label>
                                </div>
                                <div class='icheck-info d-inline'>
                                  <input type='radio' id='female' name='gender' value='female'>
                                  <label for='female'> Female
                                  </label>
                                </div>
                              </div>
                          </div>
                          <!-- /.card-body -->
                          <input type='hidden' id='addNewStudentForm' name='formId' value ='addNewStudent'>
                          <div>
                            <button type='submit' class='btn btn-success' id='addStudentBtn'>Update Student Info</button>
                            <button type='reset' class='btn btn-danger float-right'>Cancel</button>
                          </div>
                        </form>"
                              ;
 
         }
        }
?>
