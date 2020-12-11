<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fees Collection</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Fees </li>
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
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title"> List Fees Collection</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
          
              <div class="col-md-9">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
<<<<<<< HEAD
               include '../config.php';
// Attempt select query execution
  $sql = "SELECT * FROM fees_collection";
=======
                $con = mysqli_connect("localhost", "root", "","fantastic_school_admin_db");
 
                // Check connection
                if($con === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                } 
// Attempt select query execution
  $sql = "SELECT * FROM feescollection";
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Student Name </th>";
<<<<<<< HEAD
               // echo "<th>Class</th>";
                echo "<th>Session</th>";
                echo "<th>Paid Amount</th>";
=======
                echo "<th>Class</th>";
                echo "<th>Session</th>";
                echo "<th>Paid Amount</th>";
                echo "<th>Unpaid Amount</th>";
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
<<<<<<< HEAD
                echo "<td>" . $row['student_id'] . "</td>";
               // echo "<td>" . $row['class_id'] . "</td>";
                echo "<td>" . $row['session_id'] . "</td>";
                echo "<td>" . $row['amount_paid'] . "</td>";  
=======
                echo "<td>" . $row['Student'] . "</td>";
                echo "<td>" . $row['Class'] . "</td>";
                echo "<td>" . $row['Session'] . "</td>";
                echo "<td>" . $row['PaidAmount'] . "</td>";  
                echo "<td>" . $row['Balance'] . "</td>";
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e

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