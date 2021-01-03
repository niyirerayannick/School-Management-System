<?php
include("config.php");
  if($_POST["formId"] == 'getOption'){
   getOption($_POST['class_id']);
  }
  elseif($_POST["formId"] == 'getStream'){
    getStream($_POST['class_id']);
  }
  elseif($_POST["formId"] == 'getFeesTable'){
      getFeesTable($_POST['class_id']);
  }
  elseif($_POST["formId"] == 'getAttandanceTable'){
    getAttandanceStudentsTable($_POST['class_name'],$_POST["subject_name"]);
  }
  elseif($_POST["formId"] == 'makeClassAttendance'){
    makeClassAttendance($_POST['attended'],$_POST['student_id'],$_POST['subject_id']);
  }

       function makeClassAttendance($attended,$student,$subject){
        include("config.php");
        $date = date('Y-m-d');
            for( $i = 0; $i < count($attended);$i++){
                $sql = "INSERT INTO `classattendance` (`id`, `student_id`, `subject_id`, `date`, `attended`) VALUES (NULL, '$student[$i]', '$subject[$i]', '$date', '$attended[$i]')";
                $res2=mysqli_query($con,$sql)?0:1;
                echo $res2;           
             }
       }

function getOption($id){
    include("config.php");

    $sql = "SELECT option_name,streams.id ,stream_name FROM options,streams WHERE
     streams.option_id = options.id AND streams.class_id = $id";
 
     if($res = mysqli_query($con,$sql)){
         ?>
         <?php
        while($row = mysqli_fetch_array($res)){
            echo "";
    }
    // Free result set
} 
else{
    echo "
    ";
}
 }

 function getAttandanceStudentsTable($class,$subject){
    include("config.php");

    $sql = "SELECT students.FullName,class_name,option_name,stream_name,students.id
    FROM students,classes,streams streams LEFT JOIN options on options.id = streams.option_id
     WHERE students.stream_id = streams.id AND streams.class_id = classes.id and streams.class_id = $class";
 
     if($res = mysqli_query($con,$sql)){
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>Student Name </th>";
        echo "<th>Class Name</th>";
        echo "<th>Combination</th>";
        echo "<th>Stream</th>";
        echo "<th>Subject</th>";
        echo "<th colspan='2'>Attended</th>";

    echo "</tr> </thead>";
        while($row = mysqli_fetch_array($res)){
            echo "<tr>                   <tbody>";

            echo "<td>" . $row['id'] . "</td>";?>
            <input type="hidden" id= "<?php  echo $row['id'];  ?>" name="student_id[]" value= "<?php  echo $row['id'];  ?>">
            <?php
            echo "<td>" . $row['FullName'] . "</td>";
            echo "<td>" . $row['class_name'] . "</td>";  
            echo "<td>" . $row['option_name'] . "</td>";
            echo "<td>" . $row['stream_name'] . "</td>";
                 $sql2 = "SELECT subject_name,id
                         FROM subjects
                         WHERE  subjects.id = $subject";
                          if($res2 = mysqli_query($con,$sql2)){
                              $row2 = mysqli_fetch_array($res2);
                             echo "<td>" . $row2['subject_name'] . "</td>";?>
                             <input type="hidden" id= "<?php  echo $row2['id'];  ?>" name="subject_id[]" value= "<?php  echo $row2['id'];  ?>">
                             <?php
                          }

            ?>
                     <td>
                        <div class="icheck-success d-inline">
                        <?php  $rondomId = $row['id'] == 0 ? -($row['id']+ 1000000): (-$row['id'])  ?>
                           <input type="checkbox" id= "<?php  echo $rondomId  ?>" name="attended[]" value="1">
                           <label for= "<?php  echo $rondomId;  ?>">
                           </label>
                        </div>
                    </td>
                    <td>
                        <div class="icheck-danger d-inline">

                        <?php  $rondomId =$row['id'] * 1000 + 1000?>
                           <input type="checkbox" id= "<?php  echo $rondomId;  ?>" name ='attended[]' value="0">
                           <label for= "<?php  echo $rondomId;  ?>">
                           </label>
                        </div>
                    </td>
          <?php
          echo "</tr><tbody>";
    }
    echo "</table>";    
    // Free result set
} 
else{
    echo "<div class='alert alert-danger' role='alert'>
    There are no Fees Collection Records For The Selected Class currently in the database!
  </div>"  
  ;
  echo $subject;
      echo "Error: " . $sql . "<br>" . mysqli_error($con);

}
 }

 function getFeesTable($id){
    include("config.php");

    $sql = "SELECT students.FullName,class_name,option_name,stream_name,amount_paid,Year,Term,fees_collection.id,students.id as student_id 
    FROM fees_collection,students,classes,streams streams LEFT JOIN options on options.id = streams.option_id,sessions
     WHERE fees_collection.student_id = students.id AND students.stream_id = streams.id AND streams.class_id = classes.id and streams.class_id = $id";
 
     if($res = mysqli_query($con,$sql)){
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>Student Name </th>";
        echo "<th>Paid Amount</th>";
        echo "<th>Year</th>";
        echo "<th>Term</th>";
    echo "</tr> </thead>";
        while($row = mysqli_fetch_array($res)){
            echo "<tr>                   <tbody>";

            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['FullName'] . "</td>";
            echo "<td>" . $row['amount_paid'] . "</td>";  
            echo "<td>" . $row['Year'] . "</td>";
            echo "<td>" . $row['Term'] . "</td>";
        echo "</tr><tbody>";
    }
    echo "</table>";    
    // Free result set
} 
else{
    echo "<div class='alert alert-danger' role='alert'>
    There are no Fees Collection Records For The Selected Class currently in the database!
  </div>";
}
 }

function getStream($id){
    include("config.php");

    $sql = "SELECT streams.id,stream_name,class_name 
    FROM 
    classes, streams WHERE streams.class_id = classes.id and classes.id = '$id'

";
 
     if($res = mysqli_query($con,$sql)){
         ?> <!--<option selected="selected" disabled>Select Stream</option>
         <?php
        while($row = mysqli_fetch_array($res)){
            if(isset($row['stream_name'])){
            echo "<option name='stream_name' value =" . $row['id']  . ">" . $row['stream_name']  ."</option>";
            }
            else{
                echo "0";
            }
    }
    // Free result set
} else{
    echo "1";

}
 }
  ?>