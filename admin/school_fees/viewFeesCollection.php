<!-- Content Header (Page header) -->
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fees Collection</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Fees </li>
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
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title"> List Fees Collection</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-header">
                <button class="btn btn-info card-title" id="newFeeCollection"> <i class="fa fa-plus"></i>  Add New Fees Collection </button>
              </div>
             <!-- /.card-header -->
             <div class="card-body table-responsive p-0" style='min-height:650px'>
              <div class="row">
          <div class="col-md-1"> </div>
              <div class="col-md-9">
            <div class="card mt-2 ml-2">
              <div class="card-body">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
               include '../config.php';
   // Attempt select query execution   
   $sql = "SELECT FullName,class_name,option_name,stream_name,amount_paid,Year,Term,fees_collection.id,students.id as student_id,amount
   FROM fees_collection,students,classes,streams LEFT JOIN options on options.id = streams.option_id,sessions,fees_structure
    WHERE
   fees_collection.student_id = students.id AND students.stream_id = streams.id AND streams.class_id = classes.id 
   AND fees_structure.class_id = streams.class_id AND sessions.status = 'active'
   ORDER BY class_name";      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Student Name </th>";
                echo "<th>Class</th>";
                echo "<th>Combination</th>";
                echo "<th>Stream</th>";
                echo "<th>Paid Amount</th>";
                echo "<th> Amount Left To  Pay</th>";
                echo "<th>Year</th>";
                echo "<th>Term</th>";
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
          $debt = $row['amount'] - $row['amount_paid'] ;
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['FullName'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
                echo "<td>" . $row['option_name'] . "</td>";
                echo "<td>" . $row['stream_name'] . "</td>";
                echo "<td>" . $row['amount_paid'] . "</td>";  
                echo "<td>" . $debt . "</td>";  
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