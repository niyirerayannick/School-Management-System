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
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">View List Of Students</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">

              <!-- /.card-header -->
              <div class="card-body" style='min-height:450px'>
              <table id="myTable" class="table table-bordered table-hover">
                <thead>
                <?php
 include("../config.php");
// Attempt select query execution
  $sql = "SELECT
   students.id,FullName,DOB,DOJ,RegNo,Photo,class_name, hostel_name ,parent_name , category_name ,
   sessions.Year,option_name,stream_name,marks
   FROM 
   students,classes,sessions,student_category,hostels,parents,examresults,streams 
   LEFT JOIN options on options.id = streams.option_id 
   WHERE
    students.hostel_id = hostels.id and students.parent_id = parents.id AND students.stream_id = streams.id AND streams.class_id = classes.id 
    and students.student_category = student_category.id AND sessions.status = 'active' AND examresults.student_id = students.id 
    AND examresults.marks > 60 ";
    $total = 32423;
    $balance  =2345;
    $unpaid = 324;
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Full Name </th>";
                echo "<th>Birth Date</th>";
                echo "<th>Photo</th>";
                echo "<th>Registration Number</th>";
                echo "<th>Class</th>";
                echo "<th>Combination</th>";
                echo "<th>Stream</th>";
                echo "<th>Hostel</th>";
                echo "<th>Entry Date</th>";
                echo "<th>Category</th>";
                echo "<th>Academic year</th>";
                echo "<th>Total Fees</th>";
                echo "<th>Parent</th>";
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td><button id='viewStudentDetails' class='btn btn-outline-secondary btn-xs' value=" . $row['id'] . ">" . $row['FullName'] . "</td></button>";
                echo "<td>" . $row['DOB'] . "</td>";
                echo "<td><img src=" . $row['Photo'] . " class ='img img-thumbnail img-sm'></td>";
                echo "<td>" . $row['RegNo'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
                if($row['option_name'] == NULL){
                  echo "<td>  - </td>";
                  }else{
                echo "<td>" . $row['option_name'] . "</td>";
                  }               
                  echo "<td>" . $row['stream_name'] . "</td>";
                  echo "<td>" . $row['hostel_name'] . "</td>";
                echo "<td>" . $row['DOJ'] . "</td>";
                echo "<td>" . $row['category_name'] . "</td>";
                echo "<td>" . $row['Year'] . "</td>";
                echo "<td>" . $total . "</td>";
                echo "<td>" . $row['parent_name'] . "</td>";

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
=
            </div>
            </div>
            <!-- /.card -->
          </div>
        </div>

            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>