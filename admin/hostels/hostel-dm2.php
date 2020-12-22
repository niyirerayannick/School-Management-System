<?
include("../config.php");
class hostel {
    private $name;
    private  $capacity;
    private $status;

   function addHostel(){
       $stmt = $this -> $con -> prepare("INSERT INTO `hostels` (`id`, `hostel_name`,`capacity`,`status`) VALUES (NULL, ?,?,?)");
       $this ->name = htmlspecialchars(strip_tags($this ->name));
       $this ->capacity = htmlspecialchars(strip_tags($this ->capacity));
       $this ->status = htmlspecialchars(strip_tags($this ->status));
       $stmt ->bind_param("sis",$this->name,$this->capacity,$this->status);
       if($stmt->execute()){
           return true;
       }
       else{
           return false;
       }
   }
}

$class = new hostel('gig',21,"available");
$class->addhoste();
?>