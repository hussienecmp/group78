<?php session_start();
/***
 * 
 * Login With Email & Password
 */
  function login($email,$pass,$conn){
   
   $password=md5($pass);  
   $q="SELECT `ID`,`role` FROM `users` where `email`='$email' AND `password`='$password'";
   $id_ob=mysqli_query($conn,$q) or die(mysqli_error($conn));
   $user=mysqli_fetch_assoc($id_ob);
   $id=$user['ID'];
   $role=$user['role'];
    if(!empty($id)){
      $_SESSION['id']=$id;
      $_SESSION['role']=$role;
       return true;
    }else{
      return false;
    }
 }
/*
   Product Sup Total 
*/
 function product_price($price,$qty){
      $product_price=$price*$qty;
     return $product_price;
 }
 /***
  * 
    Total Cart Price 
  */
  function total_cart($sub_total,$shipping=0){
      $total=$sub_total+$shipping;
      return  $total;
  }
  /**
   * Upload File
   */

function upload($file,$dir,$file_name,$ext,$ext_app){
    $tmp=$file['tmp_name'];
    $new_name=$file_name;
    $path=$dir.$new_name;
    $ok=1;
    $msg=0;
    if(!in_array($ext,$ext_app)){
      $ok=0;
      $msg=1;
    }
    if($file['size']>21001){
      $ok=0;
      $msg=2;
    }
  if( $ok==1){  
    move_uploaded_file($tmp,$path);
  }
  return  $msg;
}

/**
 * Multi Upload
 */
function multi_upload($gallery,$dir,$ext_app){
   $new_names=[];
   for($i=0;$i<count($gallery['name']);$i++){
      $orignal_name=$gallery['name'][$i];
      $tmp=$gallery['tmp_name'][$i];
      $ok=1;$msg=0;

      // GET FILE EXT 
      $ext=strtolower(pathinfo($orignal_name,PATHINFO_EXTENSION));
      if(!in_array($ext,$ext_app)){
            $ok=0;
            $msg=1;
      }
      if($gallery['size'][$i]>21001){
         $ok=0;
         $msg=2;
       }
     if($ok==1){  
      $new_name=uniqid("",true).'.'.$ext;
      $path=$dir.$new_name;
      move_uploaded_file($tmp,$path);
      $new_names[$i]=$new_name;
     }
   }
   return $new_names;
}
/**
 * Blog functions
 */
function blog(){
  global $conn;
  $q="SELECT * from `blog`";
  $blog_ob=mysqli_query($conn,$q);  
  return  $blog_ob;
}
function show($id){
  global $conn;
  $q="SELECT * from `blog` WHERE `ID`='$id'";
  $blog_ob=mysqli_query($conn,$q);  
  return  $blog_ob;
}