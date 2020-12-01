<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Students</li>
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
                <h3 class="card-title">View List Of Students</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
              <div class="card-header">
                <button class="btn btn-info card-title" id="newStudent"><i class="fa fa-plus"></i> Add New Student</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style='min-height:450px'>
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
                $con = mysqli_connect("localhost", "root", "","fantastic_school_admin_db");
 
                // Check connection
                if($con === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                } 
// Attempt select query execution
  $sql = "SELECT students.id,FullName,DOB,DOJ,RegNo,Photo,classes.Name as class_name,hostels.Name as hostel_name ,streams.Name as stream_name,parents.Name as parent_name,Balance,TotalFees,AdvanceFees,studentcategories.Name 
  as category_name,sessions.Year
   FROM students,classes,sessions,streams,studentcategories,hostels,parents
    where students.Class =classes.id and students.Hostel = hostels.id and students.Stream = streams.id 
  and students.Parent = parents.id and students.AcademicYear = sessions.id and students.Category = studentcategories.id";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Full Name </th>";
                echo "<th>Birth Date</th>";
                echo "<th>Photo</th>";
                echo "<th>Registration Number</th>";
                echo "<th>Class</th>";
                echo "<th>Hostel</th>";
                echo "<th>Entry Date</th>";
                echo "<th>Category</th>";
                echo "<th>Academic year</th>";
                echo "<th>Total Fees</th>";
                echo "<th>Paid Fees</th>";
                echo "<th>Unpaid Fees</th>";
                echo "<th>Parent</th>";
                echo "<th>Edit</th>";
                echo "<th>Delete</th>";

            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['FullName'] . "</td>";
                echo "<td>" . $row['DOB'] . "</td>";
                echo "<td><img src=" . $row['Photo'] . " class ='img img-thumbnail img-sm'></td>";
                echo "<td>" . $row['RegNo'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
                echo "<td>" . $row['hostel_name'] . "</td>";
                echo "<td>" . $row['DOJ'] . "</td>";
                echo "<td>" . $row['category_name'] . "</td>";
                echo "<td>" . $row['Year'] . "</td>";
                echo "<td>" . $row['TotalFees'] . "</td>";
                echo "<td>" . $row['AdvanceFees'] . "</td>";
                echo "<td>" . $row['Balance'] . "</td>";
                echo "<td>" . $row['parent_name'] . "</td>";
                echo "<td><button id='updateStudent' class='btn btn-success btn-xs' value=" . $row['id'] . "> Edit</button></td>";
                echo "<td><button id='deleteStudent' class='btn btn-danger btn-sm' value=" . $row['id'] . ">Delete</button></td>";


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