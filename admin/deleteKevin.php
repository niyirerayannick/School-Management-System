<?php
/****************************************************************************/
// Database Connection
/****************************************************************************/
$connectionPDO= new PDO('mysql:host=localhost;dbname=fantastic_school_admin_db', 'root', '');

/****************************************************************************/
// FullCalender.io Delete Function
/****************************************************************************/
if(isset($_POST["id"])) { 
<<<<<<< HEAD
$query = "DELETE from calendar WHERE id=:id";
=======
$query = "DELETE from calendarinnocent WHERE id=:id";
>>>>>>> a6ffe9e8baf19f0c6227b86d1776178860c7e09e
$statement = $connectionPDO->prepare($query);
$statement->execute(
array(
':id' => $_POST['id']
)
);
}

/****************************************************************************/
// Database Connection Close
/****************************************************************************/
$connectionPDO = null;
?>