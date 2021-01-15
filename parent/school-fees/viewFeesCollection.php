<!--
  life itself is a chain of endless improvement and continous intergration. So if your life is really continuing to improve, do it else where not in my codes.

   Content Header (Page header) -->
<?php
session_start();
$id = $_SESSION['user_id'];
?>
<div id='view'>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>School Fees Payment</h1>
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
                <h3 class="card-title"> List of Fees Payment</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
              <div class="row">
              <div class="col-md-1"> </div>
              <div class="col-md-9">
            <div class="card mt-2 ml-2">
            
              <!-- /.card-header -->
              <div class="card-body" style="min-height:550px">
              <table id="viewStudehtsTable" class="table table-bordered table-hover">
                <?php
              include("../config.php");
// Attempt select query execution
  $sql = "SELECT students.id,FullName,class_name, hostel_name  , sessions.Year,option_name,stream_name, classes.id AS c,amount_paid,payment_date AS p,Term,
   (amount - (SELECT sum(amount_paid) FROM fees_collection WHERE student_id =students.id AND payment_date <= p)) AS debt
    FROM students,classes,sessions,student_category,hostels,fees_collection,banks,fees_structure,
    streams LEFT JOIN options ON options.id = streams.option_id 
    WHERE students.hostel_id = hostels.id AND students.parent_id = $id AND students.stream_id = streams.id AND streams.class_id = classes.id 
    AND students.student_category = student_category.id AND fees_collection.student_id = students.id AND banks.id = fees_collection.bank_id 
    AND fees_structure.class_id = classes.id AND fees_structure.option_id = options.id AND sessions.status = 'active' ORDER BY p DESC

  ";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>Student Name </th>";
                echo "<th>Class</th>";
                echo "<th>Session</th>";
                echo "<th>Paid Amount</th>";
                echo "<th>Remaining Amount To Pay</th>";
                echo "<th>Payment Date</th>";
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['FullName'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
                echo "<td>"; ?>
                <?php echo $row["Year"];echo"  Term:"; echo $row["Term"]; ?></td>
                <?php
                echo"</td>";
                echo "<td>" . $row['amount_paid'] . "</td>";  ?>
                <td>
                <?php if($row["debt"] > 0){
                  ?>
                <span class=' badge badge-danger'>
                <?php
                  echo "$row[debt] Rwf";
                 ?>
                </span>
                <?php
                } 
                
                else{
                  ?>
                <span class=' badge badge-success' style = "font-size:12px">
                       School Fees Paid
                                    </span>
                <?php
                }?>
                </td>     
                <?php
                 echo "<td>" . $row['p'] . "</td>";
            echo "</tr><tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
      echo $_SESSION['username'];
        echo "<div class='alert alert-danger' role='alert'>
        No Fees Collection Historic Record Found in The database!
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