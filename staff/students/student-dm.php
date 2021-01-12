<?php
include("../config.php");
//$filename = $_FILES["studentPhoto"]["name"];
if($_POST["formId"] == 'addNewStudent'){

  $img = $_FILES["image"]["name"];// stores the original filename from the client
  $tmp = $_FILES["image"]["tmp_name"];// stores the name of the designated temporary file
  //$errorimg = $_FILES["image"][“error”];// stores any error code resulting from the transfer
  
  $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
  $path = '../../dist/img/'; // upload directory
  if(!empty($_POST['fullName']) || !empty($_POST['gender']) || $_FILES['image'])
  {
  $img = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];
  // get uploaded file's extension
  $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
  // can upload same image using rand function
  $final_image =$img;
  // check's valid format
  if(in_array($ext, $valid_extensions)) 
  { 
  $path = $path.strtolower($final_image); 
  $pathInDatabase = '../dist/img/'.strtolower($final_image); 
  if(move_uploaded_file($tmp,$path)) 
   {
  addNewStudent($_POST['fullName'],$_POST['studentClass'],$_POST['gender'],'1999-11-01',$_POST['academicYear'],$_POST['RegNo'],
  $_POST['studentStream'],$_POST['studentHostel'],$_POST['studentCategory'],$pathInDatabase,$_POST['sibling'],$_POST['parent']);
   }
  }
  else{
    echo"invalid Image Format";
  }
}
}


 elseif ($_POST["formId"] == 'selectUpdateStudent') {
     selectUpdateStudent($_POST['value']);
}
elseif ($_POST["formId"] == 'deleteStudentBtn') {
  deleteStudent($_POST['value']);
}

elseif ($_POST["formId"] == 'viewStudentDetailsBtn') {
  viewStudentDetails($_POST['value']);
}

function addNewStudent($name,$class,$gender,$dob,$academicYear,$regno,$stream,$hostel,$category,$path,$sibling,$parent){
    include("../config.php");
       $sql = "INSERT INTO
        `students` (`id`, `FullName`, `Gender`, `DOB`, `Photo`, `RegNo`, `class_id`, `stream_id`, `hostel_id`, `DOJ`,
         `student_category`, `AcademicYear`, `parent_id`,`sibling`) VALUES
        (NULL,'$name','$gender','$dob', '$path', '$regno', '$class', '$stream','$hostel', 'current_timestamp()','$category','$academicYear', 
          1,'$sibling');";
    
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

function viewStudentDetails($id){
  include("../config.php");
  $sql = "SELECT
  students.id,FullName,DOB,DOJ,RegNo,Photo,class_name, hostel_name ,parent_name , category_name , Gender,
  sessions.Year,option_name,stream_name,streams.id as stream_id
  FROM 
  students,classes,sessions,student_category,hostels,parents,streams 
  LEFT JOIN options on options.id = streams.option_id 
  WHERE
   students.hostel_id = hostels.id and students.parent_id = parents.id AND students.stream_id = streams.id AND streams.class_id = classes.id 
   and students.student_category = student_category.id and students.id ='$id'";
  
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
                <img src="<?php echo htmlentities($row['Photo']) ?>" id='myImg'  alt="User profile picture" class ='profile-user-img img-fluid img-circle'>   
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
                           echo $row["class_name"];
                    ?></a></a>
                  </li>
                  <li class="list-group-item">
                    <b>Option</b> <a class="float-right"><?php 
                           echo $row["option_name"];
                    ?></a></a>
                  </li>
                  <li class="list-group-item">
                    <b>Hostel</b> <a class="float-right"><?php 
                           echo $row["hostel_name"];
                    ?></a></a>
                  </li>
                  <li class="list-group-item">
                    <b>DOB</b> <a class="float-right"><?php 
                           echo $row["DOB"];
                    ?></a></a>
                  </li>
                  <li class="list-group-item">
                    <b>Parent</b> <a class="float-right"><?php 
                           echo $row["parent_name"];
                    ?></a></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                <!-- The Modal -->
                <div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>




          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary card-outline">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                 
                 <!--  This allows the tab to fetch chart from student attendance
                   <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab" id= "attendance"> Class Attendance</a></li> -->
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"> Class Attendance</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Exam Results</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Fees Collection</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity" style="min-height:550px">
                    <div class="card-body">                     
                      <div class="chart" id='studentAttendance' >


                             <?php
                              //$sql = mysqli_query($con,"SELECT students.id FROM  students WHERE students.FullName LIKE '$id'");
                              //$row2 =mysqli_fetch_row($sql);
                              //$student_id = $row2[0];
                               if($ret=mysqli_query($con,"SELECT subject_id,subject_name,Date,COUNT(attended) as number_of_attendance FROM
                                classattendance ,subjects,students WHERE 
                                subjects.id = classattendance.subject_id and students.id = $id and classattendance.student_id = $id AND classattendance.attended = 1
                                 GROUP BY subject_id,Date order by Date
                               "))
                                 {
                                      if(mysqli_num_rows($ret) > 0){
                                          $row=mysqli_fetch_array($ret);
                                           //converting php data to json 
                                           ?> 
                                          <?php
                                      
                                          $labelArrayPhp = array();
                                          $dataArrayPhp = array();
                                          $cars = array (

                                          );

                                          do {
                                            array_push($labelArrayPhp,$row['Date']);
                                            
                                            array_push($cars,array($row['subject_id'],$row['number_of_attendance'],$row['Date']));

                                            array_push($dataArrayPhp,$row['number_of_attendance']);
                                        }
                                       while($row = mysqli_fetch_array($ret));
                                         $labelArrayJs = json_encode($labelArrayPhp);
                                         $dataArrayJs = json_encode($dataArrayPhp);
                                         $cars = json_encode($cars);
                                          ?>
                                <?php
                                    $row=mysqli_fetch_array($ret);
               
                                   ?>

                              <?php
                              //$sql = mysqli_query($con,"SELECT students.id FROM  students WHERE students.FullName LIKE '$id'");
                              //$row2 =mysqli_fetch_row($sql);
                              //$student_id = $row2[0];
                               if($ret2=mysqli_query($con,"SELECT DISTINCT subject_name FROM classattendance ,subjects,students WHERE
                                subjects.id = classattendance.subject_id and students.id = $id and classattendance.student_id =$id
                                GROUP BY subject_id, Date order by subject_id,Date

                               "))
                                 {
                                      if(mysqli_num_rows($ret2) > 0){
                                          $row2=mysqli_fetch_array($ret2);
                                           //converting php data to json 
                                           ?> 
                                          <?php
                                      
                                          $subject_names = array();
                                          do {
                                            array_push($subject_names, htmlentities($row2['subject_name']));

                                        }
                                       while($row2 = mysqli_fetch_array($ret2));
                                         $subject_names = json_encode($subject_names);

                                          ?>
                                <?php
                                    $row2=mysqli_fetch_array($ret2);?>
                                
                                    <span id='subjects' style="display:none"><?php echo $subject_names;  ?></span>
                                    <?php
                                      }
                                    }
                                   ?>                       

                                  <!-- offloading the json encoded arrays to be accessible by the chart -->

                                                                            <span id='checking' style="display:none"><?php echo $cars;  ?></span>
                                                                            <span id='spanLabel' style="display:none"><?php echo $labelArrayJs;  ?></span>
                                                                            <span id='spanData' style="display:none"><?php echo $dataArrayJs;  ?></span>

                                    <!--<div id="view"><canvas id="myChart"></canvas></div> -->
                                 <div class="row" id ="myChart">
                                    <div class="col-12">
                                      <div class="card" style="min-height:550px">
                                          <div class="card-header border-0">
                                               <div class="d-flex justify-content-between">
                  <h3 class="card-title text-bold text-lg">
                    <?php 
                    $ret=mysqli_query($con,"SELECT 
                    FullName, Date, count(classattendance.Attended) as number_of_attendance 
                    FROM students,classattendance
                     WHERE 
                     students.id =$id and classattendance.student_id = 1 and classattendance.attended = 1 group by Date");
                         $row = mysqli_fetch_array($ret);
                    echo $row['FullName'] 
                      ?>
                  </h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span>N<sup>o</sup> Of Subject Studied Over Time</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="290"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
  <?php
   }
   else{
?>
    <div class='row'>
      <div class='col-md-6'>
        <div class='alert alert-outline alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
            <h5><i class='icon fas fa-bullhorn'></i> No Chart Analytics!</h5>
            There are Chart Analystics in  the database for the selected student currently
         </div>
      </div>
   </div>
<?php
 }
  }
?>
              </div>
              </div>
                  </div>


                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline" style="min-height:550px">
                  <?php
include("../config.php");
$sql = "SELECT 
examresults.id, teacher_name,Marks,subject_name 
FROM examresults,students,teachers,subjects,teacher_subjects 
WHERE
 examresults.student_id = students.id and subjects.id = teacher_subjects.subject_id and teachers.id = teacher_subjects.teacher_id 
 and examresults.subject_id = subjects.id and examresults.student_id = '$id'  GROUP BY teacher_subjects.subject_id";

     if($res = mysqli_query($con,$sql)){
       if(mysqli_num_rows($res) > 0){
           ?>
            <table id = "examResultStudent" class='table table-stripped'>
            <thead>
              <tr>
                <th style='width: 10px'>#</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th >Marks</th>
              </tr>
            </thead>
            <?php
           while($row = mysqli_fetch_array($res)){
            ?>
            <tbody>
              <tr>
                <td><?php echo $row["id"];  ?></td>
                <td><?php echo $row["subject_name"];  ?></td>
                <td>
                  <?php echo $row["teacher_name"];  ?>
                </td>
                <td>
                <?php if($row["Marks"] > 70){
                  ?>
                <span class='btn btn-success btn-xs'>
                <?php
                  echo $row['Marks'];
                 ?>%
                </span>
                <?php
                } elseif($row["Marks"] <70 && $row["Marks"] >= 50 ){
                  ?>
                <span class='btn btn-primary btn-xs'>
                <?php
                  echo $row['Marks'];
                 ?>%
                </span>
                <?php
                }
                  elseif($row["Marks"] <50 && $row["Marks"] > 40 ){
                  ?>
                <span class='btn btn-warning btn-xs'>
                <?php
                  echo $row['Marks'];
                 ?>%
                </span>
                <?php
                }
                else{?>
                  <span class='btn btn-danger btn-xs'>
                  <?php
                    echo $row['Marks'];
                   ?>%
                  </span>
                  <?php
                }
                ?>
                </td>
              </tr>
             
            <?php
          }
          ?>
                 </tbody>
              <tfoot>
              <tr>
                <th style='width: 10px'>#</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th >Marks</th>
              </tr>
            </tfoot>
                 </table>
          <?php
        }
      else{
        echo"
        <div class='row'>
        <div class='col-md-6'>
        <div class='callout callout-danger '>
        <h5><i class='icon fas fa-bullhorn'></i> No Results!</h5>
       There are no exam results in  the database for the selected student currently
        </div>
      </div>
      </div>";
      }
      }
                ?>

                  </div>
                  <!-- /.tab-pane -->



                  <div class="tab-pane" id="settings" style="min-height:550px">

                  <?php
include("../config.php");
$sql = "SELECT FullName,amount_paid,Year,Term,bank_name,fees_collection.id,payment_date
 FROM fees_collection,students,sessions,banks
WHERE fees_collection.student_id = students.id AND sessions.status = 'active' AND banks.id = fees_collection.bank_id
AND students.id = '$id'
";

     if($res = mysqli_query($con,$sql)){
       if(mysqli_num_rows($res) > 0){
        ?>
            <table class='table table-hover table-bordered'>
            <thead>
              <tr>
                <th style='width: 10px'>#</th>
                <th>Bank</th>
                <th>Amount Paid</th>
                <th >Term</th>
                <th >Payment Date</th>
              </tr>
            </thead>
            <?php
       while($row = mysqli_fetch_array($res)){
            ?>
            <tbody>
              <tr>
                <td>1.</td>
                <td><?php echo $row["bank_name"];  ?></td>
                <td>
                <?php echo $row["amount_paid"]; ?></td>
                </td>

                <td>
                <?php echo $row["Year"]; ?> : Term

                <?php echo $row["Term"]; ?></td>
                <td>
                <?php echo $row["payment_date"]; ?></td>
              </tr>
              
            </tbody>
          <?php
       }
      }
      else{
        echo"
        <div class='row'>
        <div class='col-md-6'>
        <div class='callout callout-warning '>
        <h5><i class='icon fas fa-exclamation-triangle'></i> No Fees Collection Records!</h5>
       There are no Fees Collection Records in  the database for the selected student currently
        </div>
      </div>
      </div>";
      }
     }
                ?></table>
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
       $sql = "SELECT * 
       FROM 
       students,classes,sessions,student_category,hostels,parents,streams,options 
       WHERE 
       students.class_id = classes.id and students.hostel_id = hostels.id and students.parent_id = parents.id 
       and students.student_category = student_category.id and streams.class_id = students.class_id and streams.option_id = options.id 
       and students.id ='$id'
       ";
    
        if($res = mysqli_query($con,$sql)){
          $row = mysqli_fetch_array($res);
                 ?>
          <div id='view'>
    
          <section class='content-header'>
                <div class='container-fluid'>
                  <div class='row mb-2'>
                    <div class='col-sm-6'>
                      <h1>Students</h1>
                    </div>
                    <div class='col-sm-6'>
                      <ol class='breadcrumb float-sm-right'>
                        <li class='breadcrumb-item'><a href='#'>Home</a></li>
                        <li class='breadcrumb-item active'>Update Student Info</li>
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
                      <div class='card card-outline card-primary '>
                        <div class='card-header'>
                          <h3 class='card-title'>Edit Student Info</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class='card-body table-responsive p-0'>
                        <div class='row'>
                     <div class='col-md-1'></div>
                        <div class='col-md-9'>
                      <div class='cardmt-2 ml-2'>
                        <!-- /.card-header -->
                        <div class='card-body'>
                      <!-- general form elements -->
                        <form>
                          <div class='card-body'>
                          <div class='form-group'>
                              <label for='exampleInputEmail1'>Student's Full Name</label>
                              <input type='text' class='form-control form-control-sm' id='fullName' name='fullName' value = "<?php echo htmlentities($row['FullName']) ?>">
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputEmail1'>Email address</label>
                              <input type='email' class='form-control form-control-sm' name ='email' id='email' placeholder='Enter email'>
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Registration Number</label>
                              <input type='number' class='form-control form-control-sm' id='RegNo' value = "<?php echo htmlentities($row['RegNo']) ?>">
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Class</label>
                                 
                              <input type='text' class='form-control form-control-sm' id='RegNo' value = "<?php echo htmlentities($row['class_name']) ?>">
                            </div>
                          
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Student Option (Combination)</label>
                              <input type='text' class='form-control form-control-sm' id='RegNo' value = "<?php echo htmlentities($row['option_name']) ?>">
                            </div>
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Stream</label>
                              <input type='text' class='form-control form-control-sm' id='RegNo' value = "<?php echo htmlentities($row['stream_name']) ?>">
                            </div>
                         
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Academic year</label>
                              <input type='text' class='form-control form-control-sm' id='RegNo' value = "<?php echo htmlentities($row['Year']) ?>">
                            </div>
          
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Student Hostel</label>
                              <input type='text' class='form-control form-control-sm' id='RegNo' value = "<?php echo htmlentities($row['hostel_name']) ?>">
                            </div>
          
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Student Category</label>
                              <input type='text' class='form-control form-control-sm' id='RegNo' value = "<?php echo htmlentities($row['category_name']) ?>">
                            </div>
                         
                            <div class='form-group'>
                              <label for='exampleInputPassword1'>Date Of Birth</label>
                              <input type='text' class='form-control form-control-sm' id='RegNo' value = "<?php echo htmlentities($row['DOB']) ?>">
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
                        </form>

 <?php
         }
        }
?>
