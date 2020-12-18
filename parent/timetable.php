<!-- Content Header (Page header) -->
<?php
session_start();
?>
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
              <div class="col-md-8">
            <div class="card mt-2 ml-2">
              <!-- /.card-header -->
              <div class="card-body">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
               include 'config.php';
               $id = $_SESSION["user_id"];
// Attempt select query execution
  $sql = "SELECT FullName,class_name ,option_name,stream_name,timetable,abbreviation
  FROM students,timetable,classes,streams LEFT JOIN options on streams.option_id = options.id 
  WHERE students.stream_id = streams.id and classes.id = streams.class_id AND timetable.stream_id = students.stream_id and students.parent_id = '$id'";
    
     
     if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>Class </th>";
                echo "<th>Combination</th>";
                echo "<th>Stream </th>";
                echo "<th>Time Table </th>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
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
                    ?>
                    <td> <img src="<?php echo htmlentities($row['timetable']) ?>" class="img-circle elevation-2" alt="User Image" style="width:40px;height:30px"></td>
                    <?php
            echo "</tr><tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
      echo $_SESSION["user_id"];
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
    </div><!-- Content Header (Page header) -->
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
            <div class="card-header">
                <button class="btn btn-info card-title" id="newTimeTable"> <i class="fa fa-plus"></i> Add New Time Table</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
               include 'config.php';
// Attempt select query execution
  $sql = "SELECT timetable.id,class_name,stream_name,option_name,timetable,abbreviation FROM classes, timetable
   LEFT JOIN (streams LEFT JOIN options on streams.option_id = options.id) on streams.id = timetable.stream_id
    WHERE classes.id = timetable.class_id";
    
     
     if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Time Table </th>";
                echo "<th>Class </th>";
                echo "<th>Combination</th>";
                echo "<th>Stream </th>";
                echo"<th> Edit </th>";
                echo"<th> Delete </th>";
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['timetable'] . "</td>";
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
                echo "<td><button id='updateHostel' class='btn btn-success btn-xs' value=" . $row['id'] . "><i class='far fa-edit-alt'></i> Edit</button></td>";
                echo "<td><button id='deleteHostel' class='btn btn-outline-danger btn-sm' value=" . $row['id'] . "><i class='far fa-trash-alt'></i> Delete</button></td>";
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