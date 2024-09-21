<?php
require_once('env.php');
$conn = new mysqli(SERVERNAME,DATABASEUSER,USERPASSWORD,DATABASENAME);
if($conn->connect_error){
  die("Error Connection:".$conn->connect_error);
}
  // $conn=mysqli_connect('localhost','root','','shop');
?>