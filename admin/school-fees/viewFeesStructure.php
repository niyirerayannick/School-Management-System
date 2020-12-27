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
 <div class="card-body table-responsive p-0" style='min-height:650px'>
              <div class="row">
          <div class="col-md-1"> </div>
              <div class="col-md-9">
            <div class="card mt-2 ml-2">
            <div class="card-header">
                <button class="btn btn-info card-title" id="newFeeStructure"> <i class="fa fa-plus"></i>  Add New Fee Structure </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <thead>
                <?php
              include("../config.php");
// Attempt select query execution
  $sql = "SELECT class_name,option_name,amount,fees_structure.id
   FROM classes,fees_structure
  LEFT JOIN options on fees_structure.option_id = options.id WHERE fees_structure.class_id = classes.id ORDER BY class_name";
      if($result = mysqli_query($con, $sql)){
      if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th> Class Name </th>";
                echo "<th>Option Name</th>";
                echo "<th>Amount</th>";
                echo "<th>Edit</th>";
                echo "<th>Delete</th>";
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
                if($row['option_name'] == NULL){
                  echo "<td>  - </td>";
                  }else{
                echo "<td>" . $row['option_name'] . "</td>";
                  }      
              
                echo "<td>" . $row['amount'] . "</td>";
                echo "<td><button id='updateFeeStructure' class='btn btn-success btn-xs' value=" . $row['id'] . "> Edit</button></td>";
                echo "<td><button id='deleteFeesStructure' class='btn btn-danger btn-sm' value=" . $row['id'] . "><i class='far fa-trash-alt'></i> Delete</button></td>";


            echo "</tr><tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-danger' role='alert'>
        There are no Fees Structures currently in the database!
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