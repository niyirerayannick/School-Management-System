<?php

    ?>
    <canvas id="myChart"></canvas>
    <script src="chart.js/Chart.min.js"></script>
    <script type="text/javascript">
        //decraring x,y axis valiables
        var dates = new Array();
        var num =new Array();
    </script>
 
    <?php
    #selecting result from  class attandance and student
include("config.php");
$id=$_GET['id'];
$sql = mysqli_query($con,"SELECT students.id FROM  students WHERE students.FullName LIKE '$id'");
$row2 =mysqli_fetch_row($sql);
$student_id = $row2[0];
$ret=mysqli_query($con,"SELECT 
FullName, Date, count(classattendance.Attended) as N_O_attendance 
FROM students,classattendance
 WHERE 
 students.id =1 and classattendance.student_id = 1 and classattendance.attended = 1 group by Date");
while($row=mysqli_fetch_array($ret))
{
?>

 
     <script>
       //converting php data to json 
var name = <?php echo json_encode($row['Date']); ?>;
var numb = <?php echo json_encode($row['N_O_attendance']); ?>;
console.log(name);
//pushing data to the created arrays
dates.push(name);
num.push(numb);

</script>
      <?php 

  } ?>

<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our  dataset
    data: {
        labels: dates, //the variable we created ealier,
        datasets: [{
            label: '',
            borderColor: 'rgb(255, 99, 132)',
            data: num //the variable we created ealier
        }]
    },

    // Configuration options go here
    options: {
        title: {
            display: true,
            text: 'STUDENT ATTANDANCE'
        },
        tooltips: {
            // Disable the on-canvas tooltip
            enabled: true,
      
        },
        scales: {
        yAxes: [{
            display: true,
            ticks: {
                beginAtZero: true,
                min: 0
            }
        }]
    }
    }

});

</script>
<script type="text/javascript">
    console.log(dates)
</script>