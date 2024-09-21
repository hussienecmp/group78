  <?php 
    $q="SELECT * FROM `products` ORDER BY `ID` desc LIMIT 6";
    $product_ob=mysqli_query($conn,$q);
    ?>
    <div class="row">
      <?php
  while($product=mysqli_fetch_assoc($product_ob)){  
  ?>             
     <div class="col-md-4 mb-3">
     <div class="card" style="width: 18rem;">
     <a href=?page=product.php&id=<?php echo $product['ID']?>><img src="./upload/products/<?php echo $product['image']?>" class="card-img-top" alt="..."></a>
  <div class="card-body">
    <h5 class="card-title" title='<?php echo $product['name']?>'><?php  echo substr($product['name'],0,20)?></h5>
    <p class="card-text"><?php echo substr($product['description'],0,96)?> ...</p>
     <div class='text-center'><a href="#" class="btn btn-primary">Add To Cart</a></div>
     </div>
    </div>
    </div>
  <?php }?>
  </div>