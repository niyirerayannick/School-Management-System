<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>exam</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Exam Result</li>
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
            <div class="card" style="min-height:550px">
              <div class="card-header">
                <h3 class="card-title">View Exam Results</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
                <div class="col-md-1"></div>
              <div class="col-md-10 mt-2 ml-2" >
            <div class="card">
              
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
$parent_id = $_SESSION["user_id"];
  $sql = "SELECT examresults.id,students.FullName,students.RegNo,classes.Name as class_name,stream_name,examresults.category,
  subjects.Name as subject_name,examresults.Marks, sessions.Year,sessions.Term 
  FROM
   examresults,classes,streams,students,subjects,sessions 
  WHERE
   examresults.student = students.id and examresults.Subject = subjects.id and examresults.Term = sessions.id AND
    examresults.Class = classes.id and examresults.Stream = streams.id AND students.parent_id = '$parent_id' ";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Student Name</th>";
                echo "<th>Registration Number</th>";
                echo "<th>Class  </th>";
                echo "<th>Stream</th>";
                echo "<th>Exam Category</th>";
                echo "<th>Subject</th>";
                echo "<th>Marks</th>";
                echo "<th>Year</th>";
                echo "<th>Term</th>";
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['FullName'] . "</td>";
                echo "<td>" . $row['RegNo'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
                echo "<td>" . $row['stream_name'] . "</td>";
                echo "<td>" . $row['category_name'] . "</td>";
                echo "<td>" . $row['subject_name'] . "</td>";
                echo "<td>" . $row['Marks'] . "</td>";
                echo "<td>" . $row['Year'] . "</td>";
                echo "<td>" . $row['Term'] . "</td>";

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