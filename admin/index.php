<?php  include_once('./header.php') ;

       // Main Content
       echo "<section class=container>";
          if(isset($_GET['page'])){ 
            $page=$_GET['page'];
            include_once($page); 
         }else{
           include_once('./index.php'); 
         } 
      echo '</section>' ; 
      include_once 'footer.php'
    ?>
