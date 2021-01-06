<?php
session_start();
?>
<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hostels</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Timetable</li>
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
                <h3 class="card-title">List Of Time Tables</h3>
              </div>
              
              <!-- /.card-header -->
               <div class="card-body table-responsive p-0" style='min-height:650px'>
              <div class="row">
          <div class="col-md-1"> </div>
              <div class="col-md-12">
            <div class="card mt-2 ml-2">

              <!-- /.card-header -->
              <div class="card-body">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
               include 'config.php';
// Attempt select query execution
$teacher_id = $_SESSION["user_id"];
  $sql = " SELECT 
  class_name,option_name,stream_name,streams.id,abbreviation,timetable
  FROM classes,sessions,timetable,teacher_classes,streams LEFT JOIN options on options.id = streams.option_id
  WHERE
  streams.class_id = classes.id AND timetable.stream_id = streams.id AND sessions.status = 'active' AND teacher_classes.stream_id = streams.id
  AND teacher_classes.teacher_id = $teacher_id
  ORDER BY class_name";



     if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Time Table </th>";
                echo "<th>Class </th>";
                echo "<th>Combination</th>";
                echo "<th>Stream </th>";

            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>";?>
                <img src="<?php echo htmlentities($row['timetable']) ?>" id='myImg' alt = 'No Photo' class ='img img-thumbnail img-sm'>
                <?php
                echo"</td>";
                echo "<td>"  . $row['class_name']   ."</td>";
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
        There are no timetables currently in the database!
      </div>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 ?>
                 
                  </tbody>
                </table>
                    <!-- The Modal -->
                <div id="myModal" class="modal">
                   <span class="close">&times;</span>
                   <img class="modal-content" id="img01">
                   <div id="caption"></div>
                 </div>

              </div>
              <!-- /.card-body -->

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