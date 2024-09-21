<?php
 $pro_id=$_GET['id'];
 $product_ob=product_info($pro_id);
 $product=mysqli_fetch_assoc($product_ob);
 $product['name'];
?>
<div class=''>
   <img src='upload/products/<?php echo $product['fetimg'] ?>' class='w-50'>
   <h3><?php echo $product['name'] ?> </h3>
   <h4>Price:<?php echo $product['price'] ?> $</h4>
   <p ><?php echo $product['description'] ?></p>
</div>
<div class='row '>
  <div class='col-md-3'><img src='upload/products/<?php echo $product['image'] ?>'  class='w-50'>  </div>
  <?php while($product_gallery=mysqli_fetch_assoc($product_ob)){?> 
     <div class='col-md-3'><img src='upload/products/<?php echo $product_gallery['image'] ?>'  class='w-50'>  </div>
   <?php }?>  
  </div>  
