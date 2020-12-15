<?php
include("config.php")
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
 students.id =1 and classattendance.student_id = 1 and classattendance.attended = 1 group by Date")){

while($row=mysqli_fetch_array($ret))
{


 
       //converting php data to json 
 $name = $row['Date'];
 $numb = $row['N_O_attendance'];

  } 
  ?>
<div id="view"><canvas id="myChart"></canvas></div>
  <?php
}
  ?>
