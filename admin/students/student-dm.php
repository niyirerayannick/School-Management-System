<?php
include("../config.php");
//$filename = $_FILES["studentPhoto"]["name"];
if($_POST["formId"] == 'addNewStudent'){
<<<<<<< HEAD

  $img = $_FILES["image"]["name"];// stores the original filename from the client
  $tmp = $_FILES["image"]["tmp_name"];// stores the name of the designated temporary file
  //$errorimg = $_FILES["image"][“error”];// stores any error code resulting from the transfer
  
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
  $path = '../../img/'; // upload directory
  if(!empty($_POST['fullName']) || !empty($_POST['gender']) || $_FILES['image'])
  {
  $img = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];
  // get uploaded file's extension
  $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
  // can upload same image using rand function
  $final_image = rand(1000,1000000).$img;
  // check's valid format
  if(in_array($ext, $valid_extensions)) 
  { 
  $path = $path.strtolower($final_image); 
  if(move_uploaded_file($tmp,$path)) 
   {
  addNewStudent($_POST['fullName'],$_POST['studentClass'],$_POST['gender'],'1999-11-01',$_POST['academicYear'],$_POST['RegNo'],
  $_POST['studentStream'],$_POST['studentHostel'],$_POST['studentCategory'],$path,$_POST['sibling']);
   }
  }
  else{
    echo"invalid Image Format";
  }
}
}


=======
 addNewStudent($_POST['fullName'],$_POST['studentClass'],$_POST['gender'],'1999-11-01',$_POST['academicYear'],$_POST['RegNo'],
 $_POST['studentStream'],$_POST['studentHostel'],'2020-11-04',$_POST['studentCategory']);
   }
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
 elseif ($_POST["formId"] == 'selectUpdateStudent') {
     selectUpdateStudent($_POST['value']);
}
elseif ($_POST["formId"] == 'deleteStudentBtn') {
  deleteStudent($_POST['value']);
}
<<<<<<< HEAD

elseif ($_POST["formId"] == 'viewStudentDetailsBtn') {
  viewStudentDetails($_POST['value']);
}

function addNewStudent($name,$class,$gender,$dob,$academicYear,$regno,$stream,$hostel,$category,$path,$sibling){
    include("../config.php");
       $sql = "INSERT INTO
        `students` (`id`, `FullName`, `Gender`, `DOB`, `Photo`, `RegNo`, `class_id`, `option_id`, `hostel_id`, `DOJ`,
         `student_category`, `AcademicYear`, `parent_id`,`sibling`) VALUES
        (NULL,'$name','$gender','$dob', '$path', '$regno', '$class', '$stream','$hostel', 'current_timestamp()','$category','$academicYear', 
          NULL,'$sibling');";
=======
   
function addNewStudent($name,$class,$gender,$dob,$academicYear,$regno,$stream,$hostel,$doj,$category){
    include("../config.php");
       $sql = "INSERT INTO
        `students` (`id`, `FullName`, `Gender`, `DOB`, `Photo`, `RegNo`, `Class`, `Stream`, `Hostel`, `DOJ`,
         `Category`, `AcademicYear`, `TotalFees`, `AdvanceFees`, `Balance`, `Parent`) VALUES
        (NULL,'$name','$gender','$dob', NULL, $regno, $class, $stream, $hostel, '$doj',$category, $academicYear, '110000', '40000', NULL, NULL);";
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
    
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

<<<<<<< HEAD
function viewStudentDetails($id){
  include("../config.php");
  $sql = "SELECT * FROM students WHERE id = '$id'";

  if($res = mysqli_query($con,$sql)){
    $row = mysqli_fetch_array($res);
       ?>
 <div id='view'>
    
    <section class='content-header'>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Student Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="../dist/img/avatar.png"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $row["FullName"] ?></h3>

                <p class="text-muted text-center">Student</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Student Name</b> <a class="float-right"><?php 
                           echo $row["FullName"];
                    ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Gender </b> <a class="float-right"><?php 
                           echo $row["Gender"];
                    ?></a></a>
                  </li>
                  <li class="list-group-item">
                    <b>Reg No Number</b> <a class="float-right"><?php 
                           echo $row["RegNo"];
                    ?></a></a>
                  </li>
                  <li class="list-group-item">
                    <b>Class</b> <a class="float-right"><?php 
                           echo $row["class_id"];
                    ?></a></a>
                  </li>
                  <li class="list-group-item">
                    <b>Option</b> <a class="float-right"><?php 
                           echo $row["option_id"];
                    ?></a></a>
                  </li>
                  <li class="list-group-item">
                    <b>Hostel</b> <a class="float-right"><?php 
                           echo $row["hostel_id"];
                    ?></a></a>
                  </li>
                  <li class="list-group-item">
                    <b>DOB</b> <a class="float-right"><?php 
                           echo $row["DOB"];
                    ?></a></a>
                  </li>
                  <li class="list-group-item">
                    <b>Parent</b> <a class="float-right"><?php 
                           echo $row["parent_id"];
                    ?></a></a>
                  </li>
                </ul>

                <button class="btn btn-primary btn-block" id="updateStudent"  value="<?php echo $row['id']  ?>">
                  Edit Student Details</button>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Class Attendance</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Exam Results</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Fees Collection</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity" style="min-height:550px">
                    <div class="card-body">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline" style="min-height:550px">
                  <?php
include("../config.php");
$sql = "SELECT * FROM examresults,students where examresults.student_id = students.id";

     if($res = mysqli_query($con,$sql)){
     $row = mysqli_fetch_array($res);
           ?>
            <table class='table table-striped'>
            <thead>
              <tr>
                <th style='width: 10px'>#</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th >Marks</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td><?php echo $row["subject_id"];  ?></td>
                <td>
                  <div class='progress progress-xs'>
                    <div class='progress-bar progress-bar-danger' style='width: 55%'></div>
                  </div>
                </td>
                <td>
                <?php if($row["Marks"] > 60){
                  ?>
                <span class='btn btn-success btn-xs'>
                <?php
                  echo $row['Marks'];
                 ?>%
                </span>
                <?php
                } elseif($row["Marks"] <60){
                  ?>
                <span class='btn btn-danger'>
                <?php
                  echo $row['Marks'];
                 ?>%
                </span>
                <?php
                }
                ?></td>
              </tr>
              
            </tbody>
          </table><?php
               
     }
                ?>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings" style="min-height:550px">
                  <?php
include("../config.php");
$sql = "SELECT * FROM fees_collection,students where fees_collection.student_id = students.id
";

     if($res = mysqli_query($con,$sql)){
     $row = mysqli_fetch_array($res);
           ?>
            <table class='table table-hover table-bordered'>
            <thead>
              <tr>
                <th style='width: 10px'>#</th>
                <th>Bank</th>
                <th>Amount Paid</th>
                <th >Amount Left To Pay</th>
                <th >Term</th>
                <th >Payment Date</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1.</td>
                <td><?php echo $row["id"];  ?></td>
                <td>
                <?php echo $row["amount_paid"]; ?></td>
                </td>
                <td>
                <?php echo '3242'; ?></td>
                <td>
                <?php echo $row["session_id"]; ?></td>
                <td>
                <?php echo $row["payment_date"]; ?></td>
              </tr>
              
            </tbody>
          </table><?php
               
     }
                ?>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
            
       <?php
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
=======
  function selectUpdateStudent($id){
    include("../config.php");
       $sql = "SELECT students.id,FullName,DOB,DOJ,RegNo,Photo,classes.Name as class_name,hostels.Name as hostel_name ,streams.Name as stream_name,parents.Name as parent_name,Balance,TotalFees,AdvanceFees,studentcategories.Name 
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
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
<<<<<<< HEAD
                              <input type='text' class='form-control form-control-sm' id='fullName' name='fullName' value= ";  echo $row["FullName"]; echo">
=======
                              <input type='text' class='form-control form-control-sm' id='fullName' name='fullName' value= " . $row['FullName'] .">
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
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
