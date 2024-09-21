<?php
    require_once('./functions.php');
    require_once('./conn.php');
   $name= $_POST['your_name'];
   $phone = $_POST['your_phone'];
   $password=md5($_POST['your_pass']);
   $email= $_POST['your_email'];

/** Upload Profile photo */
    $ext=explode('.',$_FILES['your_photo']['name']);
    $profile_image=time().'.'.$ext[1];
    upload($_FILES['your_photo'],'./upload/',$profile_image);
/** Create new user */
// Default role 'customer'
$created_at=date('y-m-d');// 24-08-17
   $q="INSERT INTO `users` VALUES  (NULL,'$name','$phone','$email','$password','$profile_image','customer','$created_at',NULL)";
   mysqli_query($conn,$q) or die(mysqli_error($conn));
?>
<meta http-equiv="refresh" content="0; URL=index.php?page=login.php" />