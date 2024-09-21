   <?php
   if(isset($_SESSION['role'])&& isset($_SESSION['id'])){
         if(isset($_SESSION['id']) & $_SESSION['role']=='admin'){
            header('LOCATION:admin/');
           }elseif(isset($_SESSION['id']) & $_SESSION['role']=='customer'){
              header('LOCATION:customer/');
           }
   }
   ?>
          <form action='' method=post> 
            <div class='mb-3'>
                <input name='your_email' type=text class='form-control' placeholder='Your Email '>
            </div>
            <div class='mb-3'>
                <input name='your_pass' type=password class='form-control' placeholder='Your Password '>
            </div>
            <div class='mb-3'>
                <input type=submit class='btn btn-info' value='Signin'>
            </div>
     </form>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
       $User_email=$_POST['your_email']; 
       $User_pass=$_POST['your_pass'];

      $id=login($User_email,$User_pass,$conn);
      if($id & $_SESSION['role']=='admin'){
        header('LOCATION:admin/');
      }elseif($id & $_SESSION['role']=='customer'){
        header('LOCATION:customer/');
      }else{
        header('LOCATION:?page=login.php'); 
      } 
  }
 ?>
