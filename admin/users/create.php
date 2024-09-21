
<form method=post action="./users/process.php" enctype="multipart/form-data">
     <div class='mb-3'>
        <input type='text' name='u_name' class='form-control' placeholder='User Name'>
    </div>  
    <div class='mb-3'>
        <input type='text' name='u_phone' class='form-control' placeholder='User Phone'>
    </div> 
    <div class='mb-3'>
        <input type='email' name='u_email' class='form-control' placeholder='User Email'>
    </div>
    <div class='mb-3'>
        <input type='password' name='u_password' class='form-control' placeholder='User Password'>
    </div>
    <div class='mb-3'>
        <label for='role'>User Role</label>
        <select id='role' name='u_role' class='form-control'>
            <option disabled selected>Select User Role</option>
            <option value='admin'>Admin</option>
            <option value='shop_man'>Shop Manager</option>
            <option value='customer'>Customer</option>
        </select>   
    </div>
    <div class='mb-3'>
        <input type='file' name='u_image' class='form-control'>
    </div>
    <div class='mb-3 text-center'>
        <button class='btn btn-primary w-75' >Create</button>
    </div>
</from>
