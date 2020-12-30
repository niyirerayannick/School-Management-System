<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subject</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Subjects</li>
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
                <h3 class="card-title">View List Of Subjects</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-header">
                <button class="btn btn-info card-title" id="newSubject"> <i class="fa fa-plus"></i>  Add New Subject</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
              <!-- /.card-header -->
              <div class="card-body">
              <table id="viewSubjectsTable" class="table table-bordered table-hover">
                <thead>
                <?php
                include("../config.php");
                // Attempt select query execution
                $sql = "SELECT * FROM subjects";
               if($result = mysqli_query($con, $sql)){
                 if(mysqli_num_rows($result) > 0){
                  echo "<tr>";
                   echo "<th>id</th>";
                   echo "<th>Subject Name </th>";
                   echo "<th>Edit </th>";
                   echo "<th>Delete </th>";
                  echo "</tr> </thead>
                  <tbody>";
                 while($row = mysqli_fetch_array($result)){
                     echo "<tr>             
                     ";
                       echo "<td>" . $row['id'] . "</td>";
                       echo "<td>" . $row['subject_name'] . "</td>";
                       echo "<td><button id='updateSubject' class='btn btn-success btn-xs' value=" . $row['id'] . "> Edit</button></td>";
                       echo "<td><button id='deleteSubject' class='btn btn-danger btn-sm' value=" . $row['id'] . "><i class='far fa-trash-alt'></i> Delete</button></td>";

                      echo "</tr>";
                    }
                  echo "
                 </tbody>";
            echo "<tfoot>";
            echo "<tr>";
            echo "<th>id</th>";
            echo "<th>Subject Name </th>";
            echo "<th>Edit </th>";
            echo "<th>Delete </th>";
            echo "</tr> 
           </tfoot>
        </table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-danger' role='alert'>
       No recent Book Submission
      </div>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 ?>
                
              </div>
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