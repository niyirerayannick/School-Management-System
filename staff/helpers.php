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