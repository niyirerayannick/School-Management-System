<?php
include("config.php");
session_start();
?>
<div  id="view">
<!-- Content Header (Page header) -->
<div class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">School Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
          <div class="info-box bg-gradient-danger">
              <span class="info-box-icon"><i class="fa fa-user-graduate fa-lg"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">My Students</span>
                <span class="info-box-number">  <?php
 // Attempt select query execution
   $sql = "SELECT * FROM teachers";
   if($result = mysqli_query($con, $sql)){
   $row = mysqli_num_rows($result);
   echo "$row";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
          <div class="info-box bg-gradient-primary">
              <span class="info-box-icon"><i class="far fa-calendar fa-lg"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Events This Term</span>
                <span class="info-box-number"></span>
                  <?php
 // Attempt select query execution
   $sql = "SELECT * FROM calendar";
   if($result = mysqli_query($con, $sql)){
   $row = mysqli_num_rows($result);
   echo "$row";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

           <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
          <div class="info-box bg-gradient-success">
              <span class="info-box-icon"><i class="fa fa-comments-dollar fa-lg"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">School Bank Accounts</span>
                <span class="info-box-number">  <?php
 // Attempt select query execution
   $sql = "SELECT * FROM banks";
   if($result = mysqli_query($con, $sql)){
   $row = mysqli_num_rows($result);
   echo "$row";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
        
           <div class="col-lg-4">
            <div class="card card-info card-outline">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h3 class="card-title">Class Attendance</h3>
                  <a href="javascript:void(0);"  id="feesReport">View Full Report</a>
                </div>
              </div>
              <div class="card-body"  style ="min-height:410px;">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
              <?php
                $con = mysqli_connect("localhost", "root", "","fantastic_school_admin_db");
 
                // Check connection
                if($con === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                } 
// Attempt select query execution
  $sql = "SELECT * FROM feescollection limit 0,9";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>Student Name</th>";
               // echo "<th>Class</th>";
                echo "<th>Paid Amount</th>";
                echo "<th>Date</th>";

                
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['Student'] . "</td>";
               // echo "<td> " . $row[''] . "</td>";
                echo "<td> " . $row['PaidAmount'] . "</td>";
                echo "<td> " . $row['Date'] . "</td>";
            echo "</tr><tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-danger' role='alert'>
        No fees Collected Recently
      </div>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 ?>
                 
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
      </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-4">
            <div class="card card-info card-outline">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Recent Exam Results</h3>
                  <a href="javascript:void(0);"  id="listStudents2">View Whole List</a>
                </div>
              </div>
              <div class="card-body"  style ="min-height:410px;">
              <?php
include("config.php");
$sql = "SELECT
students.FullName,RegNo,examresults.id, subject_name,Marks,class_name,Year,stream_name,Term,category_name,option_name,
students.id as student_id
 FROM 
examresults,students,classes,subjects,streams streams LEFT JOIN options on options.id = streams.option_id,sessions,exam_categories
WHERE
examresults.student_id = students.id AND students.stream_id = streams.id AND streams.class_id = classes.id
AND subjects.id = examresults.subject_id AND
examresults.exam_category = exam_categories.id ORDER BY class_name ";

     if($res = mysqli_query($con,$sql)){
      if(mysqli_num_rows($res) > 0){
           ?>
            <table class="table table-striped">
            <thead>
              <tr>
                <th style='width: 10px'>#</th>
                <th>Student</th>
                <th>Subject</th>
                <th >Marks</th>
              </tr>
            </thead>
            <?php
      while($row = mysqli_fetch_array($res)){
            ?>
            <tbody>
              <tr>
                <td>1.</td>
                <td><?php echo $row["FullName"];  ?></td>
                <td>
                  <?php echo $row["subject_name"];  ?>
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
              
            </tbody>
         <?php
      }
    }
     }
                ?>
                 </table>
                  
                </table>
              </div>


              <div class="overlay dark hidden" style="display:none" id="loading">  
  <i class="fas fa-2x fa-sync-alt fa-spin"></i>
</div>
            </div>
            <!-- /.card -->
      </div>
      
      <div class="col-lg-4">
            <div class="card card-info card-outline">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">School Fees Payment</h3>
                  <a href="#" id="viewFees">View Full Record</a>
                </div>
              </div>
              <div class="card-body"  style ="min-height:410px;">
              <?php
include("config.php");
$sql = "SELECT * FROM fees_collection,students,banks,sessions
 WHERE fees_collection.student_id = students.id and  banks.id = fees_collection.bank_id AND fees_collection.session_id = sessions.id
";

     if($res = mysqli_query($con,$sql)){
        ?>
            <table class='table table-hover table-condensed'>
            <thead>
              <tr>
                <th >Student</th>
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
                <td><?php echo $row["FullName"];  ?></td>
                <td><?php echo $row["bank_name"];  ?></td>
                <td>
                <?php echo $row["amount_paid"]; ?></td>
                </td>
                <td>
                <?php echo $row["Year"];echo"  Term:"; echo $row["Term"]; ?></td>
                <td>
                <?php echo $row["payment_date"]; ?></td>
              </tr>
              
            </tbody>
          <?php
      }
     }
                ?></table>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
</section>
