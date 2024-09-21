<?php session_start();
  session_destroy();
  header('LOCATION:./../?page=login.php');
?>