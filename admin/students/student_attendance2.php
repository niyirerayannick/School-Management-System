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
 echo json_encode($name = $row['Date']);
 $numb = $row['N_O_attendance'];

  ?>
<!--<div id="view"><canvas id="myChart"></canvas></div> -->
       <div class="row" id ="myChart">
           <div class="card" >
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Online Store Visitors</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
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

  
