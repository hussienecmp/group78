
<form method=post action='' enctype='multipart/form-data'>
<div class='mb-3'>
      <label>Logo</label><input type=file name='logo'>
    </div >
    <div class='mb-3'>
      <label>Menu Background</label><input type=color name='bgmenu'>
    </div >
    <div class='mb-3'>
   <label>Menu Text</label><input type=color name='txtmenu'>
   </div>
   <div class='mb-3'>
    <input type=submit value=save>
   </div>
</form>
<?php
     if($_SERVER['REQUEST_METHOD']=='POST'){
     
      if(!empty($_FILES['logo']['tmp_name'])){  
          $file=$_FILES['logo'];
          $dir='./../upload/';
          upload($file,$dir,'logo.png');
      }
        // Syle
         $bgmenu=$_POST['bgmenu'];
         $txtmenu=$_POST['txtmenu'];
         $style="header nav{
                  background-color: $bgmenu !important;
                 }
                    .nav-link{
                        color: $txtmenu;
                   }             
                ";

         $handel=fopen('./../assets/css/custome.css','w');
         fwrite($handel,$style);
         
     }


?>