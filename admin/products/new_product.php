
<form method=post action='products/add.php' enctype="multipart/form-data">
     <div>
        <input type=text name='proname' placeholder='Product name'>
    </div>
    <div>
        <input type=number name='proprice' placeholder='Product price'>
    </div>
    <div>
        <textarea name=prodesc placeholder='Product Description'></textarea>
    </div>
    <div>
          <?php if(isset($_GET['suer'])){
            if($_GET['suer']==1){
               echo "<p style='color:red'>File Not Suported</p>";
            }
            if($_GET['suer']==2){
                echo "<p style='color:red'>File Size Lagest Than 21 KB</p>";
             }
            }
        ?>
        <input type=file name='proimg' placeholder='Product image'>
    </div>
    <div>
        <label>Gallery</label>
        <input type=file name='progallery[]' placeholder='Product image' multiple>
    </div>
    <div>
        <input type=submit name='save' value='Add Product'>
    </div>
</form>