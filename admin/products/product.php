<?php
  $id=$_GET['id'];
  $product=new product();
  $product_ob=$product->show($id);
  
  $product=mysqli_fetch_assoc($product_ob);
?>
   <div >
    <div class='col-md-6'> 
         <img src='./../upload/products/<?php echo  $product['fetimg']?>'>
   </div>
  <div class='col-md-6'> 
    <h3><?php echo  $product['name']?></h3>
     <p>
         <?php echo  "Price: $product[price] "?>
        </p>
         <p>
         <?php echo  $product['description']?>
        </p>
        <div class='row'>
        <div class='col-md-4'>
                 <img src='./../upload/products/<?php echo $product['image']?>' class='w-100'> 
              </div>
           <?php while($product_gallery=mysqli_fetch_assoc($product_ob)){?>
              <div class='col-md-4'>
                 <img src='./../upload/products/<?php echo $product_gallery['image']?>' class='w-100'> 
              </div>
            <?php }?>
   </div>       
</div> 
