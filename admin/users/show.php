<?php
  $user=$_GET['id'];
  $user_ob=user::show($user);
  $user=mysqli_fetch_assoc( $user_ob);
?>
<div >
    <img src='./../upload/<?php echo  $user['image']?>' class='w-50 rounded'>
    <h3>
      <?php echo  $user['name']?>
   </h3>
   <h5>
     Email:<a href='mailto:<?php echo  $user['email'] ?>'><?php echo  $user['email'] ?></a>
   </h5>
   <h5>
      Phone: <a href='tel:<?php echo  $user['phone'] ?>'><?php echo  $user['phone']?></a>
   </h5>
   <h5>
      Role: <?php echo  $user['role']?>
   </h5>

</div>