<?php 
if(isset($_POST['key'])){
  $key=$_POST['key'];
  $q="SELECT * FROM `products` WHERE `name` like '%$key%' OR `description` like '%$key%' ORDER BY `ID` DESC";
}elseif(isset($_POST['from'])){
  $from=$_POST['from'];
  $to=$_POST['to'];
  $q="SELECT * FROM `products` WHERE `price` BETWEEN '$from' AND '$to' ORDER BY `ID` DESC";
}else{
  $q="SELECT * FROM `products` ORDER BY `ID` DESC";
}
/**
 * Delete gallery image
 */
  if(isset($_GET['gallery_id'])){
     mysqli_query($conn,"DELETE FROM `products_gallery` WHERE `ID`='$_GET[gallery_id]'");
  }
$products_ob=mysqli_query($conn,$q);
if(isset($_GET['msg'])){
    if($_GET['msg']==1){
       echo '<div class="alert alert-info"> Product Inserted success </div>';
    }elseif($_GET['msg']==2){
      echo '<div class="alert alert-danger"> Product Deleted success </div>';
   }else{
    echo '<div class="alert alert-warning"> Product Updated success </div>';
 }
 }
 
 if(isset($_GET['action'])){
   if($_GET['action']=='delete'){
      $id=$_GET['id'];
      $q="DELETE FROM `products` WHERE `ID`='$id'";
      mysqli_query($conn,$q);
      header("LOCATION:index.php?msg=2");
   }
 }
 //Edit product
 if(isset($_POST['edit'])){
   $id=$_POST['proid'];
   $name=frindly_string($_POST['proname']);
   $price=$_POST['proprice'];
   $desc=frindly_string($_POST['prodesc']);
     
         
   /*** If edit image */
     if(!empty($_FILES['prophoto']['name'])){
       /*** Remove Old Image */
       $product_ob=product_info($id);
       $product=mysqli_fetch_assoc($product_ob);
       unlink("./../upload/products/$product[image]");
       /**Upload New image */
      $file=$_FILES['prophoto'];
      $dir='./../upload/products/';
      $ext=explode('.',$_FILES['prophoto']['name'])[1];
      $file_name=time().'.'.$ext;
      upload($file,$dir,$file_name);   
      $q="UPDATE `products` SET `image`='$file_name' WHERE `ID`='$id' ";
      mysqli_query($conn,$q);
     
     }
     //add to gallery
     if(!empty($_FILES['gallery']['name'][0]) ){
      $dir='./../upload/products/';
        $ext_app=['png','jpg','jpeg','gif','jfif'];
       // GET FROM REQUEST Gallery
    
        $gallery=$_FILES['gallery'];
        //UPLOAD PRODUCT GALLERY ( RETURN NEW IMAGES NAMES )
        $new_names=multi_upload($gallery,$dir,$ext_app);
         // INSERT PRODUCT GALLERY
            foreach($new_names AS $img){
              mysqli_query($conn,"INSERT INTO `products_gallery` VALUES(NULL,'$img','$id')");
        }
     }
   /** */
  $q="UPDATE `products` SET `name`='$name',`price`='$price',`description`='$desc' WHERE `ID`='$id' ";
   mysqli_query($conn,$q);
  header("LOCATION:?page=products/index.php&msg=3");
 }
 $c=1; //counter
?>

  <a name="" id="" class="btn btn-primary" href="?page=products/new_product.php" role="button">New Product</a>
 <form method="post" action="">
  <input type="text" name="key" placeholder="Search products" ><button class="btn btn-info">Search</button>
</form>
<form method="post" action="">
  <input type="range" name="from" placeholder="Min Price" max="10000">
  <input type="range" name="to" placeholder="Max Price" max="10000">
  <button class="btn btn-info">Search</button>
</form>
<table class='table table-stribed'>
    <tr >
        <th>NO.</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
    <?php if($_SESSION['role']=='admin'){?>    
        <th>Delete</th>
        <th>Edit</th>
     <?php } ?>   
    </tr>
    <?php while($product=mysqli_fetch_assoc($products_ob)){
     
      ?>
      <tr>
        <td><?php echo $c ?></td>
        <td><a href="?page=products/product.php&id=<?php echo $product['ID'] ?>"><img class='img-thumbnail' src="./../upload/products/<?php echo $product['image'] ?>"></a> </td>
        <td><?php echo $product['name'] ?></td>
        <td><?php echo $product['price'] ?></td>
    <?php if($_SESSION['role']=='admin'){?>    
        
        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $c;?>">Delete</button></td>
        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $c;?>">Edit</button></td>
     <?php } ?>   

      </tr>

      <!-- Modal Delete -->
<div class="modal fade" id="exampleModal<?php echo $c;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="?id=<?php echo $product['ID']?>&action=delete"><button type="button" class="btn btn-primary">Confirm Delete</button></a>
      </div>
    </div>
  </div>
</div>
    <!-- Update -->
     <?php $q="SELECT * FROM `products_gallery` WHERE `product_id`='$product[ID]'";
        $gallery_ob=mysqli_query($conn,$q);
     ?>
    <div class="modal fade" id="editModal<?php echo $c;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product(<?php echo $product['name'] ?>)</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" enctype='multipart/form-data'> 
      <div class="modal-body">
       
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product Name :</label>
            <input type="text" name="proname" value="<?php echo $product['name'] ?>" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product Price :</label>
            <input type="text" name="proprice" value="<?php echo $product['price'] ?>" class=form-control id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Product Description :</label>
            <textarea type="text" name="prodesc" class="form-control" id="recipient-name"><?php echo $product['description'] ?></textarea>
          </div>
          <div class="mb-3 text-center">
           
            <img class='img-thumbnail' src='./../upload/products/<?php echo $product['image'] ?>'>
            
            <input type=file name='prophoto' >
          </div>
          
          <div class='row'>
             <?php while($gallery=mysqli_fetch_assoc($gallery_ob)){?>
               <div class='col-md-4'>
                 <img src='./../upload/products/<?php echo $gallery['image']?>' class='w-100'> 
                 <a href=?page=products/index.php&gallery_id=<?php echo $gallery['ID']?> class='btn btn-danger'> X </a>
               </div>
            <?php }?>
   </div>
   <label>Add to gallery</label> 
      <input type=file name=gallery[] multiple>      
          <input type="hidden" name="proid" value="<?php echo $product['ID'] ?>" class=form-control>
      </div>



      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="edit">Save</button>
      </div>
      </form>

    </div>
  </div>
</div>
    <?php $c++;
      } ?>
    </table>

  
