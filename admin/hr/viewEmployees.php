<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Human Resources</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Employees</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> List Of Employees</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-header">
                <button class="btn btn-info card-title" id="newEmployee"> <i class="fa fa-plus"></i>  Add New Employee</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="min-height:550px">
              <div class="row">
              <!-- /.card-header -->
              <div class="card-body">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
               include '../config.php';
// Attempt select query execution
  $sql = "SELECT * FROM hr";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Employee Name </th>";
                echo "<th>Gender</th>";
                echo "<th>Salary</th>";
                echo "<th>Date Of Birth</th>";
                echo "<th>Title </th>";
                echo "<th>Qualifications</th>";
                echo "<th>Experience </th>";
                echo "<th>Email</th>";
                echo "<thAddress </th>";
                echo "<th>Previous Salary Increase</th>";
                echo "<th>Employee Status</th>";
                echo "<th>Edit</th>";
                echo "<th> Delete </th>";
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['employee_name'] . "</td>";
                echo "<td>" .  $row['gender'] . "</td>";
                echo "<td>" . $row['salary'] . "</td>";
                echo "<td>" .  $row['DOB'] . "</td>";
                echo "<td>" .  $row['title'] . "</td>";
                echo "<td>" . $row['qualification'] . "</td>";
                echo "<td>" .  $row['experience'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" .  $row['previous_salary_increase'] . "</td>";
                echo "<td style='width:280px'>";
                if($row['status'] == 'active'){        
                          echo"<button class='btn btn-primary btn-xs' > " .  $row['status'] . " </button></td>";
                }
                elseif($row['status'] == 'suspended'){
                  echo"<button class='btn btn-warning btn-xs'  disabled > " .  $row['status'] . " </button></td>";
                }
                elseif($row['status'] == 'on leave'){
                  echo"<button class='btn btn-info btn-xs'>" .  $row['status'] . " </button></td>";

                }
                elseif($row['status'] == 'inactive'){
                  echo"<button class='btn btn-danger btn-xs disabled'>" .  $row['status'] . " </button></td>";
                }
                else{
                  echo"<button class='btn btn-secondary btn-xs '>" .  $row['status'] . " </button></td>";
                }
                echo "<td><button id='updateEmployee' class='btn btn-success btn-xs' value=" . $row['id'] . "> Edit</button></td>";
                echo "<td><button id='deleteEmployee' class='btn btn-danger btn-xs' value=" . $row['id'] . ">Delete</button></td>";
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
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class='row'>
            <div class = 'col-md-9'>
                    
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