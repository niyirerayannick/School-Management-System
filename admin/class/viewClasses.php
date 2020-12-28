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
              <div class="col-md-12">
              <div class="card">
              <div class="card-header">
                <button class="btn btn-info card-title" id="newClass"> <i class="fa fa-plus"></i>  Add New Class</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="viewClassesTable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                                              <?php
                                                 include("../config.php");
                                                 // Attempt select query execution
                                                 $sql = "SELECT 
                                                 class_name,option_name,stream_name,streams.id,abbreviation
                                                 FROM classes,streams streams LEFT JOIN options on options.id = streams.option_id,sessions 
                                                 WHERE
                                                 streams.class_id = classes.id
                                                 ORDER BY class_name";
                                              if($result = mysqli_query($con, $sql)){
                                                   if(mysqli_num_rows($result) > 0){?>
                                                         <th>id</th>
                                                         <th>Class Name </th>
                                                         <th>Combination </th>
                                                         <th>Stream </th>
                                                         <th>Edit</th>
                                                         <th>Delete</th>
                                                     <?php
                                                      }}
            ?>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                  while($row = mysqli_fetch_array($result)){
            echo "<tr>               
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
                echo "<td><button id='updateClass' class='btn btn-outline-info btn-xs' value=" . $row['id'] . "><i class='fas fa-pencil-alt'></i> Edit</button></td>";
                echo "<td><button id='deleteClass' class='btn btn-outline-danger btn-xs' value=" . $row['id'] . "><i class='far fa-trash-alt'></i> Delete</button></td>";
            echo "</tr>";
        }
        ?>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                                                         <th>id</th>
                                                         <th>Class Name </th>
                                                         <th>Combination </th>
                                                         <th>Stream </th>
                                                         <th>Edit</th>
                                                         <th>Delete</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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