<?php
                /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
<<<<<<< HEAD
$con = mysqli_connect("localhost", "root", "","student_management_system");
=======
$con = mysqli_connect("localhost", "root", "","fantastic_school_admin_db");
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 // Attempt select query execution
   $sql = "SELECT * FROM students";
   if($result = mysqli_query($con, $sql)){
   $row = mysqli_num_rows($result);
   echo "$row";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);

?>