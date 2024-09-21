<?php
   $id=$_REQUEST['id'];
   $artical_ob=show($id);
   $artical=mysqli_fetch_assoc($artical_ob);
?>
<div class='row'>
    <div class='col-md-12'>
        <h4> <?php echo $artical['title'] ?></h4>
        <p>   <?php echo $artical['content'] ?></p>
    </div>   