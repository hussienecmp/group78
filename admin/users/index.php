<?php
  $user=new user;
  $users=$user->show();
?>
 <a href='./?page=users/create.php' class='btn btn-primary mb-3'>Create</a>
<table class='table table-stribed'>
    <tr><th>Image</th><th>Name</th><th>Role</th><th>Phone</th><th>Email</th></tr>
<?php while($user=mysqli_fetch_assoc($users)){?>
    <tr>
        <td><a href='?page=users/show.php&id=<?php echo $user['ID']?>'><img src='./../upload/<?php echo $user['image']?>' class='w-50 rounded'></a></td>
        <td><?php echo $user['name']?></td>
        <td><?php echo $user['role']?></td>
        <td><?php echo $user['phone']?></td>
        <td><?php echo $user['email']?></td>
</tr>
<?php }?>
</table>