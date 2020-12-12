<?php
/****************************************************************************/
// Database Connection
/****************************************************************************/
$connectionPDO= new PDO('mysql:host=localhost;dbname=fantastic_school_admin_db', 'root', '');

/****************************************************************************/
// FullCalender.io Delete Function
/****************************************************************************/
if(isset($_POST["id"])) { 
$query = "DELETE from calendar WHERE id=:id";
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