<?php
   include("config.php");
    
    $stream_id = $_POST['stream_name'];
   if($ret=mysqli_query($con,"SELECT Date,streams.id, count(students.id) as number_of_attendance FROM classattendance,students,streams WHERE
    students.id = classattendance.student_id and students.stream_id = streams.id AND streams.id = $stream_id AND attended = 1 GROUP BY Date order by Date
     ")){
       if(mysqli_num_rows($ret) > 0){
          $row=mysqli_fetch_array($ret);
          $stream_id = $row['id'];

          //converting php data to json 
          $labelArrayPhp = array();
          $dataArrayPhp = array();
             do {
                 array_push($labelArrayPhp,$row['Date']);
                array_push($dataArrayPhp,$row['number_of_attendance']);
              }
              while($row = mysqli_fetch_array($ret));
              $labelArrayJs = json_encode($labelArrayPhp);
              $dataArrayJs = json_encode($dataArrayPhp); 
              $row=mysqli_fetch_array($ret);
                ?>
               <div id ="myChart">
                  <span id='spanLabel' style="display:none"><?php echo $labelArrayJs;  ?></span>
                  <span id='spanData' style="display:none"><?php echo $dataArrayJs;  ?></span>
                 <div class="card" >
                       <div class="card-header border-0">
                           <div class="d-flex justify-content-between">
                               <h3 class="card-title">Class Attendance Chart</h3>
                                 <button class="btn btn-secondary" onclick = "window.print()">
                                    <i class="fa fa-print"></i> View Report</a>
                                  </button>
                             </div>
                         </div>
                     <div class="card-body">
                     <?php
                     $ret2=mysqli_query($con,"SELECT 
                     class_name,option_name,stream_name,streams.id,abbreviation
                     FROM classes,streams streams LEFT JOIN options on options.id = streams.option_id,sessions 
                     WHERE
                     streams.class_id = classes.id and streams.id = $stream_id
                     ORDER BY class_name");
                     $row2 = mysqli_fetch_array($ret2);
                     ?>
                     <span id='legendText' class="text-bold text-info text-lg">
                     <?php 
                     echo "" . $row2['class_name'] . " " . $row2['abbreviation']  . " " . $row2['stream_name']  . "";
                     ?>
                     </span>
                     <div class="d-flex">
                         <p class="d-flex flex-column">
                            <span class="text-primary text-lg">Students : 820</span>
                            <span>Student Attendance Over Time</span>
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
                          <canvas id="visitors-chart" height="200"></canvas>
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
        echo "1";
}
?>

  
