<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Library</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Library Status</li>
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
                <h3 class="card-title">View Library Status</h3>
              </div>
              <div class="card-header">
                <button class="btn btn-info card-title" id="newBook"> <i class="fa fa-plus"></i>  Lend a New Book</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
                <div class="col-md-1"></div>
              <div class="col-md-10 mt-2 ml-2" >
            <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
              <table id="viewLibraryStatusTable" class="table table-bordered table-hover">
                <thead>
                <?php
               include('../config.php');
// Attempt select query execution
  $sql = "SELECT library.id, students.FullName,class_name,bookname,pdate,sdate,library.status FROM library,students,classes,streams
   LEFT JOIN options on options.id = streams.option_id,sessions
   WHERE library.student_id = students.id AND students.stream_id = streams.id AND streams.class_id = classes.id ORDER BY class_name";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Student Name</th>";
                echo "<th>Class  </th>";
                echo "<th>Book Name</th>";
                echo "<th>Book was lent  on</th>";
                echo "<th>Submission Date</th>";
                echo "<th>Status</th>";
                echo "<th>Edit</th>";
                echo "<th>Delete</th>";

            echo "</tr> 
            </thead>
            <tbody>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['FullName'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
                echo "<td>" . $row['bookname'] . "</td>";
                echo "<td>" . $row['pdate'] . "</td>";
                echo "<td>" . $row['sdate'] . "</td>";
                if ( $row['status'] == 'submitted') {
                  echo "<td> <span class='btn btn-xs btn-outline-primary'>"  . $row['status']   ."</td>";
                }else{
                  echo "<td> <span class='btn btn-xs btn-outline-danger btn-block'>"  . $row['status']   ."</td>";
                }              
                  echo "<td><button id='updateLibrary' class='btn btn-success btn-xs' value=" . $row['id'] . "> Edit</button></td>";
                echo "<td><button id='deleteLibrary' class='btn btn-danger btn-sm' value=" . $row['id'] . ">Delete</button></td>";
            

            echo "</tr>";
        }
        echo "
        <tbody>";
        echo "<tfoot>
           <tr>";
        echo "<th>id</th>";
        echo "<th>Student Name</th>";
        echo "<th>Class  </th>";
        echo "<th>Book Name</th>";
        echo "<th>Book was lent  on</th>";
        echo "<th>Submission Date</th>";
        echo "<th>Status</th>";
        echo "<th>Edit</th>";
        echo "<th>Delete</th>";
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
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            </div>
            <!-- /.card -->
          </div>
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