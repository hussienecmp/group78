<?php include './../../functions.php';
include './../../conn.php';
include './../classes.php';
   $name=$_POST['proname'];
   $price=$_POST['proprice'];
   $desc=$_POST['prodesc'];
   /**
    * Upload product image
    */
   $file=$_FILES['proimg'];
   $dir='./../../upload/products/';

   $ext=strtolower(explode('.',$_FILES['proimg']['name'])[1]);
   $file_name=time().'.'.$ext;
    $ext_app=['png','jpg','jpeg','gif','jfif'];
    $msg=upload($file,$dir,$file_name,$ext,$ext_app);
   if($msg>0){
    header("LOCATION:../?page=products/new_product.php&suer=$msg");
    exit();
   }
   // End Upload 
   // GET FROM REQUEST Gallery
   $gallery=$_FILES['progallery'];
   //UPLOAD PRODUCT GALLERY ( RETURN NEW IMAGES NAMES )
   $new_names=multi_upload($gallery,$dir,$ext_app);
  // INSERT PRODUCT BASIC IFO
    $product=new product($name,$price,$desc,$file_name,$new_names); 
    // Redirect Products LIst
      header('LOCATION:../?page=products/index.php&msg=1');  

?>