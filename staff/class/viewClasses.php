<?php
session_start();
?>
<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Classes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Classes</li>
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
            <div class="card" style="min-height:400px">
              <div class="card-header">
                <h3 class="card-title">View List Of Classes</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
          
              <div class="col-md-9">
            <div class="card mt-2 ml-2">
              <!-- /.card-header -->
              <div class="card-body" style="min-height:550px">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
  include("../config.php");
// Attempt select query execution
$teacher_id = $_SESSION["user_id"];
  $sql = "SELECT streams.id ,class_name ,option_name, stream_name,abbreviation  FROM classes , teacher_classes,streams 
  LEFT JOIN options ON options.id = streams.option_id WHERE streams.class_id = classes.id AND streams.id = teacher_classes.stream_id 
  AND teacher_classes.teacher_id = $teacher_id
   ORDER BY class_name";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){ 
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Class Name </th>";
                echo "<th>Combination </th>";
                echo "<th>Stream Name </th>";
          
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
                if($row['option_name'] == NULL){
                  echo "<td>  - </td>";
                  }else{
                    echo "<td>" . $row['option_name'] . "(" . $row['abbreviation'] . ")</td>";
                  } 
                 if($row['stream_name'] == NULL){
                  echo "<td>  - </td>";
                  }else{
                    echo "<td>" . $row['stream_name'] . "</td>";
                  } 
                 echo "</tr><tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-danger' role='alert'>
        There are no Classes currently in the database!
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