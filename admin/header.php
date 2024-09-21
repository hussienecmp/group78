<?php session_start() ;
if(!isset($_SESSION['id'])){
  header('LOCATION:./../?page=login.php');
}
include_once('./functions.php');
include_once('./../conn.php');
include_once('./classes.php');
$user=user_info($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset=UTF-8>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea#editor',
    skin: 'bootstrap',
    plugins: 'lists, link, image, media',
    toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
    menubar: false,
  });
</script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body>
    <header class='container-fluid d-flex justify-content-between'>
    <nav class="navbar navbar-expand-lg ">
         <div class="container-fluid">
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                    <a class="nav-link" href='?page=products/index.php'>Products</a>
               </li>
               <li class="nav-item">
                    <a class="nav-link" href='?page=blog/create.php'>Blog</a>
               </li> <li class="nav-item">
                    <a class="nav-link" href='?page=users/index.php'>Users</a>
               </li>
               <li class="nav-item"> 
                    <a class="nav-link" href='?page=settings.php'>Settings.php</a>
               </li>
               
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $user['name'] ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li> <a class="nav-link" href='logout.php'>Logout</a></li>
          </ul>
        </li>

           </ul>

</div>
</div>
</nav>
<div class="nav-item">
                  <img src='./../upload/<?php echo $user['image']?>' class='w-50'>
</div>
</header>
