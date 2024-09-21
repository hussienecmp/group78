<?php 
$blog_ob=blog();
   while($blog=mysqli_fetch_assoc($blog_ob)){
?>
<h4><?php echo $blog['title']?></h4>
   <p ><?php echo strip_tags(substr($blog['content'],0,100)) ?> <a href='?page=blog/show.php&id=<?php echo $blog['ID'] ?>'>[ MORE ]</a></p>
<?php }?>   
