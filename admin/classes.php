<?php
  class product{
    // Class properties
       protected $name;
       protected $price;
       protected $desc;
       protected $image;
    //Class Method.
     public function __construct($p_name=null,$p_price=null,$p_desc=null,$p_image=null,$new_names=null) {
      if(!empty($p_name)){
        global $conn;
        $this->name=$p_name;
        $this->price=$p_price; 
        $this->desc=$p_desc;
        $this->image=$p_image;
        mysqli_query($conn,"INSERT INTO `products` (`name`,`price`,`description`,`image`) VALUES ('$this->name',' $this->price','$this->desc','$this->image')");
           // GET NEW PRODUCT ID
              $product_id=mysqli_insert_id($conn); 
           // INSERT PRODUCT GALLERY
           foreach($new_names AS $img){
            mysqli_query($conn,"INSERT INTO `products_gallery` VALUES(NULL,'$img','$product_id')");
        }
      }
    }
      function show($id){
         global $conn;
         $q="SELECT `products`.`name`,`products`.`price` ,`products`.`description`,`products`.`image` AS 'fetimg',`products_gallery`.`image` from `products` LEFT JOIN `products_gallery` on `products`.`ID`=`products_gallery`.`product_id` WHERE `products`.`ID`='$id'";
         $product_ob=mysqli_query($conn,$q);  
         return  $product_ob;
      }
      function show_all(){
         global $conn;
         $q="SELECT `products`.`name`,`products`.`price` ,`products`.`description`,`products`.`image` AS 'fetimg',`products_gallery`.`image` from `products` LEFT JOIN `products_gallery` on `products`.`ID`=`products_gallery`.`product_id`";
         $product_ob=mysqli_query($conn,$q);  
         return  $products_ob;
      } 
       function edit(){
         
      } 
      
       function delete(){

      } 
  }
/**
 * User Class
 */
  class user{
    // User properites
       public $name;
       public $phone;
       public $email;
       public $password;
       public $image;
       public $role;
   //User Method
     public function __construct($u_name=null,$u_phone=null,$u_email=null,$u_pass=null,$u_image=null,$u_role=null){
      if(!empty($u_name)){
      global $conn;
     
       $this->name=$u_name;
       $this->phone=$u_phone;
       $this->email=$u_email;
       $this->password=$u_pass;
       $this->image=$u_image;
       $this->role=$u_role;
       $q="INSERT INTO `users` set `name`='$this->name',`phone`='$this->phone',`email`='$this->email',`password`='$this->password',`image`='$this->image',
      `role`='$this->role'"; 
      mysqli_query($conn, $q);
      }
     } 
     
     /**
      * Show All users
      */
      static function show($user=null){
         global $conn;

         if(!empty($user)){// When send user id 
            $q="SELECT * FROM `users` WHERE `ID`='$user'";
          }else{
              $q="SELECT * FROM `users`";
          }
         $user_ob=mysqli_query($conn,$q);
         return $user_ob;
      }
  }

