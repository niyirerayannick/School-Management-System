<?php
include("../config.php")
    ?>
   
    <?php
    #selecting result from  class attandance and student
include("config.php");
$id=$_GET['id'];
$sql = mysqli_query($con,"SELECT students.id FROM  students WHERE students.FullName LIKE '$id'");
$row2 =mysqli_fetch_row($sql);
$student_id = $row2[0];
if($ret=mysqli_query($con,"SELECT 
FullName, Date, count(classattendance.Attended) as N_O_attendance 
FROM students,classattendance
 WHERE 
 students.id =1 and classattendance.student_id = 1 and classattendance.attended = 1 group by Date"))
 {

  $row=mysqli_fetch_array($ret);
  //converting php data to json 
  ?> 
  <select id="labels">
  <?php
  do {
    echo "<option class='date' value =" . $row['Date']  . ">" . $row['Date']  . "</option>";
    echo "<option class = 'number_of_attendance' value =" . $row['N_O_attendance']  . ">" . $row['N_O_attendance']  . "</option>";

  }
  while($row = mysqli_fetch_array($ret))
  ?>
  </select> 
  <?php
  $row=mysqli_fetch_array($ret);
  ?>
<!--<div id="view"><canvas id="myChart"></canvas></div> -->
       <div class="row" id ="myChart">
           <div class="card" >
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title text-bold text-lg">
                    <?php 
                    $ret=mysqli_query($con,"SELECT 
                    FullName, Date, count(classattendance.Attended) as N_O_attendance 
                    FROM students,classattendance
                     WHERE 
                     students.id =1 and classattendance.student_id = 1 and classattendance.attended = 1 group by Date");
                         $row = mysqli_fetch_array($ret);
                    echo $row['FullName'] 
                      ?>
                  </h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span>N<sup>o</sup> Of Subject Studied Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last Term</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="290"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
        </div>
  <?php
  }
?>

  
