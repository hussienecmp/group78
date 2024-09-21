<?php
 define('SERVERNAME','localhost');
 define('DATABASEUSER','root');
 define('USERPASSWORD','');
 define('DATABASENAME','shop');
 
$conn = new mysqli(SERVERNAME,DATABASEUSER,USERPASSWORD,DATABASENAME);
if($conn->connect_error){
  die("error connection:".$conn->connect_error);
}
  // $conn=mysqli_connect('localhost','root','','shop');
?>