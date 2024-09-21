<?php
  function frindly_string($string){
    global $conn;
    $string=trim($string);
    $string=htmlspecialchars($string);
    $string=mysqli_real_escape_string($conn,$string);  

    return $string;
  }
  function user_info($id){
    global $conn;
    $q="SELECT * FROM `users` WHERE `ID`='$id'";
    $user_ob=mysqli_query($conn,$q);  
    $user=mysqli_fetch_assoc($user_ob);
    return  $user;
  }
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
/***
 * Blog 
 */
function create_artical($title,$content,$user_id){
   global $conn;
   echo "INSERT INTO `blog` set `title`='$title',`content`='$content',  `user_id`='$user_id'";
   mysqli_query($conn,"INSERT INTO `blog` set `title`='$title',`content`='$content',  `user_id`='$user_id'");
   $artical_id=mysqli_insert_id($conn);
   return $artical_id;
}
?>