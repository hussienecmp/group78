<?php 
     // Header
       include_once('./header.php') ;

       // Main Content
      echo "<section class=container>";
          if(isset($_GET['page'])){ 
            $page=$_GET['page'];
            include_once($page); 
         }else{
           include_once('./home.php'); 
         } 
      echo '</section>' ; 
      
      //Footer
       require('footer.php');
     ?>
    
</html>