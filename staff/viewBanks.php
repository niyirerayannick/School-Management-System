<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Banks</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Banks</li>
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
                <h3 class="card-title">List Of Banks</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style='min-height:600px'>
              <div class="row">
          <div class="col-md-1 " ></div>
              <div class="col-md-9">
            <div class="card">
            <div class="card-header">
                <button class="btn btn-info card-title" id="newBank"> <i class="fa fa-plus"></i>  Add New Bank</button>
              </div>
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
  $sql = "SELECT * FROM banks";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Bank Name </th>";
                echo "<th>Account Number</th>";
                echo "<th>Edit</th>";
                echo "<th>Delete</th>";

            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row["AccountNumber"] . "</td>";
                echo "<td><button id='updateBank' class='btn btn-success btn-xs' value=" . $row['id'] . "> Edit</button></td>";
                echo "<td><button id='deleteBank' class='btn btn-danger btn-sm' value=" . $row['id'] . ">Delete</button></td>";
            echo "</tr><tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-danger' role='alert'>
        There are no Banks That You Currently Work With!
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