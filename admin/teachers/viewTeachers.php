<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Teachers</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Teachers</li>
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
                <h3 class="card-title">View List Of Teachers</h3>
              </div>
              <!-- /.card-header -->
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
              <!-- /.card-header -->
              <div class="card-body">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
                $con = mysqli_connect("localhost", "root", "","fantastic_school_admin_db");
 
                // Check connection
                if($con === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                } 
// Attempt select query execution
  $sql = "SELECT * FROM teachers";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Full Name </th>";
                echo "<th>Birth Date</th>";
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


            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Gender'] . "</td>";
                echo "<td>" . $row['Age'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['StaffNumber'] . "</td>";
                echo "<td>" . $row['nationality'] . "</td>";
                echo "<td>" . $row['subject'] . "</td>";
                echo "<td>" . $row['responsability'] . "</td>";
                echo "<td>" . $row['martial_status'] . "</td>";
                echo "<td>" . $row['degree'] . "</td>";
                echo "<td>" . $row['entry_date'] . "</td>";


            echo "</tbody></tr>";
        }
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
                </table>
              </div>
              <!-- /.card-body 
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>-->
            </div>
                  </div>
            </div>
            <!-- /.card -->
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