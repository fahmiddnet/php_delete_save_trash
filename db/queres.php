<?php  
//DB CONNECTION
include('connect.php');
$sql = "SELECT * FROM student";
$result = mysqli_query($conn,$sql);

?>