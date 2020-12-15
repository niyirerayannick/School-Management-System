<?php

//insert.php

$connect = new PDO('mysql:host=localhost;dbname=student_management_system', 'root', '');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO calendar
 (title, start_event, end_event) 
 VALUES (:title, :start_event, :end_event)
 ";
 
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
}


?>