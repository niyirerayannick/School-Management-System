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
              <!-- /.card-header -->
              <div class="card-body">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
include('../config.php');
// Attempt select query execution
  $sql = "SELECT
  students.FullName,RegNo,examresults.id, subject_name,Marks,class_name,Year,stream_name,Term,category_name,option_name,
  students.id as student_id
   FROM 
  examresults,students,classes,subjects,streams streams LEFT JOIN options on options.id = streams.option_id,sessions,exam_categories
  WHERE
  examresults.student_id = students.id AND students.stream_id = streams.id AND streams.class_id = classes.id
  AND subjects.id = examresults.subject_id AND
  examresults.exam_category = exam_categories.id AND examresults.marks > 60 ORDER BY class_name ";
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

            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['FullName'] . "</td>";
                echo "<td>" . $row['DOB'] . "</td>";
                echo "<td><img src=" . $row['Photo'] . " class ='img img-thumbnail img-sm'></td>";
                echo "<td>" . $row['RegNo'] . "</td>";
                echo "<td>" . $row['Class'] . "</td>";
                echo "<td>" . $row['Hostel'] . "</td>";
                echo "<td>" . $row['DOJ'] . "</td>";
                echo "<td>" . $row['Category'] . "</td>";
                echo "<td>" . $row['AcademicYear'] . "</td>";
                echo "<td>" . $row['TotalFees'] . "</td>";
                echo "<td>" . $row['AdvanceFees'] . "</td>";
                echo "<td>" . $row['Balance'] . "</td>";
                echo "<td>" . $row['Parent'] . "</td>";


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