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
              <li class="breadcrumb-item active">View Combination</li>
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
            <div class="card" style="min-height:600px">
              <div class="card-header">
                <h3 class="card-title">View Combination</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
              <!-- /.card-header -->
              <div class="col-md-1"> </div>
              <div class="col-md-9">
              <div class="card-body" style='min-height:550px'>
              <div class="card mt-2 ml-2">
              <!-- /.card-header -->
              <div class="card-body">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
             include("../config.php");
// Attempt select query execution
  $sql = "SELECT classes.id,class_name FROM classes, streams where streams.class_id = classes.id AND streams.option_id != 'NULL' 
  GROUP BY classes.id ORDER BY class_name
  ";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Class </th>";
                echo "<th>Options</th>";
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
              echo "<td>";
              $id = $row["id"];
              $sql2 = "SELECT class_name,option_name,classes.id 
              FROM classes, options LEFT JOIN streams on options.id = streams.option_id WHERE classes.id = streams.class_id
              and classes.id ='$id' 
             ";
                if($res = mysqli_query($con, $sql2)){
            while($row2 = mysqli_fetch_array($res)){
              echo "" . $row2['option_name'] . ",";
            }
          }
          echo "</td>";
              
            echo "</tbody></tr>";
        }
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-danger' role='alert'>
        There are no Combination currently in the database!
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