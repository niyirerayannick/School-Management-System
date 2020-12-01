<?php
                /* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$con = mysqli_connect("localhost", "root", "","fantastic_school_admin_db");
 
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