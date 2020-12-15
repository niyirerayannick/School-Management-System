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
              <li class="breadcrumb-item active">View Submitted Books</li>
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
                <h3 class="card-title">View Submitted Books</h3>
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
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
               include('../config.php');
// Attempt select query execution
  $sql = "SELECT library.id,students.FullName,class_name,bookname,pdate,sdate,status
   FROM library,students,classes WHERE 
  library.student_id = students.id AND students.class_id = classes.id and library.status= 'submitted'";
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

            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['FullName'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
                echo "<td>" . $row['bookname'] . "</td>";
                echo "<td>" . $row['pdate'] . "</td>";
                echo "<td>" . $row['sdate'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td><button id='updateLibrary' class='btn btn-success btn-xs' value=" . $row['id'] . "> Edit</button></td>";
                echo "<td><button id='deleteLibrary' class='btn btn-danger btn-sm' value=" . $row['id'] . ">Delete</button></td>";
            

            echo "</tr><tbody>";
        }
        echo "</table>";
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