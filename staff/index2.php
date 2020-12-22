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
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>My Classes</p>
              </div>
              <div class="icon">
                <i class="fas fa-building"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>My Subjects</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div>
        </div>
        <div class="row">
        
           <div class="col-lg-4">
            <div class="card card-info">
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
            <div class="card card-success">
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


              <div class="overlay dark hidden" style="display:none" id="loading">  
  <i class="fas fa-2x fa-sync-alt fa-spin"></i>
</div>


            </div>
            <!-- /.card -->
      </div>
      
      <div class="col-lg-4">
            <div class="card card-danger">
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