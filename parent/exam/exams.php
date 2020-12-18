<?php
include("config.php")
?>
<div  id="view">
<!-- Content Header (Page header) -->
<div class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exams</li>
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
        
           <div class="col-lg-6">
            <div class="card card-primary ">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h3 class="card-title">Your Student's Exam Results
                </h3>
                </div>
              </div>
              <div class="card-body"  style ="min-height:410px;">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
              <?php
               include '../config.php';
// Attempt select query execution
  $sql = "SELECT * FROM hr WHERE status = 'requested' limit 0,9";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>Employees Name</th>";
                echo "<th>Salary</th>";
                echo "<th>Leave Date</th>";
                echo "<th>Leave Will End On</th>";
                echo "<th>Approve</th>";
                echo "<th>Reject</th>";

            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['employee_name'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td> " . $row['DOB'] . "</td>";
                echo "<td> " . $row['previous_salary_increase'] . "</td>";
                echo "<td><button id='approveLeave' class='btn btn-outline-primary btn-xs' value=" . $row['id'] . "><i class='fas fa-emoji'></i>  Approve</button></td>";
                echo "<td><button id='rejectLeave' class='btn btn-outline-danger btn-xs' value=" . $row['id'] . "><i class='fas fa-times'></i>  Reject</button></td>";
            echo "</tr><tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-danger' role='alert'>
No Employees that has requested a leave recently
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
          <div class="col-lg-6">
            <div class="card card-primary">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Upcoming Exams</h3>
                </div>
              </div>
              <div class="card-body"  style ="min-height:410px;">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
               include '../config.php';
// Attempt select query execution
  $sql = "SELECT * FROM hr WHERE status = 'on leave' limit 0,9";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>Employees Name</th>";
                echo "<th>Salary</th>";
                echo "<th>Leave Date</th>";
                echo "<th>Leave Will End On</th>";

                
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['employee_name'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td> " . $row['DOB'] . "</td>";
                echo "<td> " . $row['previous_salary_increase'] . "</td>";
            echo "</tr><tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-danger' role='alert'>
        No Employees on leave currently
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
      
     
          </div>
        </div>
</section>
