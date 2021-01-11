<?php
include("config.php");
session_start();
?>
<div  id="view">
<!-- Content Header (Page header) -->
<div class="content-header" >
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Exams</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Exams</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        
        <div class="row">
        <div class="col-md-1"></div>
           <div class="col-lg-9" >
            <div class="card card-primary card-outline ">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                <h3 class="card-title">Your Student's Exam Results
                </h3>
                </div>
              </div>
              <div class="card-body" style="min-height:550px;">
              <div class="mb-2">
              <button class="btn btn-success btn-sm">Excellent</button>
              <button class="btn btn-primary btn-sm">Success</button>
              <button class="btn btn-warning btn-sm">Fair</button>
              <button class="btn btn-danger btn-sm">Failed</button>
              </div>
              <table id="viewStudehtsTable" class="table table-responsive table-bordered table-hover">
                <thead>
                <?php
                $con = mysqli_connect("localhost", "root", "","student_management_system");
 
                // Check connection
                if($con === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                } 
// Attempt select query execution
$parent_id = $_SESSION["user_id"];
  $sql = "SELECT
 students.id,FullName,class_name  ,exam_categories.category_name, sessions.Year,sessions.Term,option_name,Marks,stream_name,subject_name
  FROM students,classes,sessions,student_category,hostels,parents,examresults,exam_categories,subjects,
 streams LEFT JOIN options on options.id = streams.option_id
  WHERE students.hostel_id = hostels.id AND students.parent_id = parents.id AND students.stream_id = streams.id 
  AND streams.class_id = classes.id AND students.student_category = student_category.id AND examresults.student_id = students.id 
  AND exam_categories.id = examresults.exam_category AND examresults.subject_id = subjects.id
   AND sessions.status = 'active' AND students.parent_id = '$parent_id'";
      if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
            echo "<tr>";
                echo "<th>Student Name</th>";
                echo "<th>Class  </th>";
                echo "<th>Combination  </th>";
                echo "<th>Stream</th>";
                echo "<th>Exam Category</th>";
                echo "<th>Subject</th>";
                echo "<th>Marks</th>";
                echo "<th>Year</th>";
                echo "<th>Term</th>";
            echo "</tr> </thead>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>                   <tbody>
            ";
                echo "<td><button id='viewStudentDetails' class='btn btn-outline-secondary btn-xs' value=" . $row['id'] . ">" . $row['FullName'] . "</td></button>";
                echo "<td>" . $row['class_name'] . "</td>";
                if($row['option_name'] == NULL){
                  echo "<td>  - </td>";
                  }else{
                echo "<td>" . $row['option_name'] . "</td>";
                  }
                echo "<td>" . $row['stream_name'] . "</td>";
                echo "<td>" . $row['category_name'] . "</td>";
                echo "<td>" . $row['subject_name'] . "</td>";
              ?>
                   <td>
                <?php if($row["Marks"] > 70){
                  ?>
                <span class='btn btn-success btn-xs'>
                <?php
                  echo $row['Marks'];
                 ?>%
                </span>
                <?php
                } elseif($row["Marks"] <70 && $row["Marks"] >= 50 ){
                  ?>
                <span class='btn btn-primary btn-xs'>
                <?php
                  echo $row['Marks'];
                 ?>%
                </span>
                <?php
                }
                  elseif($row["Marks"] <50 && $row["Marks"] > 40 ){
                  ?>
                <span class='btn btn-warning btn-xs'>
                <?php
                  echo $row['Marks'];
                 ?>%
                </span>
                <?php
                }
                else{?>
                  <span class='btn btn-danger btn-xs'>
                  <?php
                    echo $row['Marks'];
                   ?>%
                  </span>
                  <?php
                }
                ?>
                </td>
                <?php
                                echo "<td>" . $row['Year'] . "</td>";
                echo "<td>" . $row['Term'] . "</td>";

            echo "</tr><tbody>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "<div class='alert alert-danger' role='alert'>
        There are no Exam Results  currently in the database!
      </div>";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 ?>          
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
      </div>
         
            <!-- /.card -->
      </div>
      
     
          </div>
        </div>
</section>
