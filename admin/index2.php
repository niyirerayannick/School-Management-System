<?php
include("config.php")
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
          <div class="col-12 col-sm-6 col-md-2" >
            <div class="info-box" >
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-graduation-cap"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" id="listStudents">Students</span>
                <span class="info-box-number">
                <?php
 // Attempt select query execution
   $sql = "SELECT * FROM students";
   if($result = mysqli_query($con, $sql)){
   $row = mysqli_num_rows($result);
   echo "$row";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
?>
                </span>
              </div>
              <!- /.info-box-content -->
            </div>
          
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" id="listTeachers">Teachers</span>
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
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-building"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" id="listClasses">Classes</span>
                <span class="info-box-number"> <?php
 // Attempt select query execution
   $sql = "SELECT * FROM classes";
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
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" id="listbanks">Banks</span>
                <span class="info-box-number"> <?php
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
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-fax"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" id="listEmployees">Employees</span>
                <span class="info-box-number"> <?php
 // Attempt select query execution
   $sql = "SELECT * FROM hr";
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
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-2">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-bed"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" id="listHostels">Hostels</span>
                <span class="info-box-number"> <?php
 // Attempt select query execution
   $sql = "SELECT * FROM hostels";
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
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <div>
        </div>
        <div class="row">
        
           <div class="col-lg-4">
            <div class="card card-info card-outline">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h3 class="card-title">Recent Fee Collection</h3>
                  <a href="javascript:void(0);"  id="feesReport">View Full Report</a>
                </div>
              </div>
              <div class="card-body"  style ="min-height:410px;">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
              <?php
              
// Attempt select query execution
  $sql = "SELECT * FROM fees_collection limit 0,9";
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
                echo "<td>" . $row['student_id'] . "</td>";
               // echo "<td> " . $row[''] . "</td>";
                echo "<td> " . $row['amount_paid'] . "</td>";
                echo "<td> " . $row['payment_date'] . "</td>";
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
                  <h3 class="card-title">Some Of New Students</h3>
                  <a href="javascript:void(0);"  id="listStudents2">View Whole List</a>
                </div>
              </div>
              <div class="card-body"  style ="min-height:410px;">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
              <?php
// Attempt select query execution
  $sql = "SELECT * FROM students,classes where classes.id = students.class_id limit 1,9";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Student Name</th>";
                echo "<th>Class</th>";
                
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['FullName'] . "</td>";
                echo "<td> " . $row['class_name'] . "</td>";
            echo "</tr><tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-danger' role='alert'>
        There are no students currently in the database!
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
      
      <div class="col-lg-4">
            <div class="card card-info card-outline">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Upcoming Events</h3>
                  <a href="#" id="viewEvent">View Calendar</a>
                </div>
              </div>
              <div class="card-body"  style ="min-height:410px;">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
// Attempt select query execution
  $sql = "SELECT * FROM calendar";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>Event Title</th>";
                echo "<th>Start Date </th>";
                echo "<th>End Date</th>";
                
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td> <i> From   </i><br>" . $row['start_event'] . "</td>";
                echo "<td> <i> To   </i>" . $row['end_event'] . "</td>";
            echo "</tr><tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-danger' role='alert'>
        There are no Events currently
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
</section>
