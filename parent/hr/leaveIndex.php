<?php
include("config.php")
?>
<div  id="view">
<!-- Content Header (Page header) -->
<div class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Leave Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Leave Management</li>
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
            <div class="card card-info card-outline">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h3 class="card-title">Approve Employee's Leave Request</h3>
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
                echo "<td> " . $row['salary_increase_date'] . "</td>";
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
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card card-info card-outline">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Some Of New Students</h3>
                  <a href="javascript:void(0);"  id="listStudents2">View Whole List</a>
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
                echo "<td> " . $row['salary_increase_date'] . "</td>";
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
