<?php
include_once('./../functions.php');
include_once('./../../conn.php');
include_once('./../classes.php');
/**
 * Get Request From Form
 */
$u_name=frindly_string($_POST['u_name']);
$u_phone=frindly_string($_POST['u_phone']);
$u_email=frindly_string($_POST['u_email']);
$u_password=md5(frindly_string($_POST['u_password']));
$u_role=frindly_string($_POST['u_role']);
$u_image=$_FILES['u_image'];
/**
 * Uplaod Profile image
 */
$dir='./../../upload/';
$ext=strtolower(pathinfo($_FILES['u_image']['name'],PATHINFO_EXTENSION));
$file_name=uniqid('',true).'.'.$ext;
$ext_app=['jpg','png','jpeg','jfif'];
$msg=upload($u_image,$dir,$file_name,$ext,$ext_app);
if($msg==0){
   $user= new user($u_name,$u_phone,$u_email,$u_password,$file_name,$u_role);
   
}




?>