<?php
   ob_start();
   session_start();

   $msg = '';
            
   if (isset($_POST['username']) && !empty($_POST['password']) ) {
    $con = mysqli_connect("localhost", "root", "","student_management_system");

    // Check connection
    if($con === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    } 
// Attempt select query execution
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE member_name = '$username' and password = '$password'";
 if($result = mysqli_query($con, $sql)){
  if(mysqli_num_rows($result) > 0){
   $res = mysqli_fetch_array($result);
    $_SESSION['valid'] = true;
    $_SESSION['password'] = $res['password'];
    $_SESSION['username'] = $res['member_name'];
    if ($res['type'] == 'admin') {
      $_SESSION['user_id'] = $res['id'];
      $_SESSION['user_type'] = 'admin';
      header('location:admin/index.php');   
     }
     elseif ($res['type'] == 'staff') {
      $sql2 = "SELECT teachers.id FROM users,teachers WHERE teachers.teacher_name = '$username' and users.member_name ='$username'";
      $result2 = mysqli_query($con, $sql2);
      $res2 = mysqli_fetch_array($result2);
      $_SESSION['user_id'] = $res2['id'];
      $_SESSION['user_type'] = 'staff';
        header('location:staff/index.php');   
     }
     else if ($res['type'] == 'parent') {
      $sql2 = "SELECT parents.id FROM users,parents WHERE parents.parent_name = '$username' and users.member_name ='$username'";
      $result2 = mysqli_query($con, $sql2);
      $res2 = mysqli_fetch_array($result2);
      $_SESSION['user_id'] = $res2['id'];
      $_SESSION['user_type'] = 'parent';
      header('location:parent/index.php');   
     }
  }
    
  } 
  else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
  }
      echo "1";
   }
?>
