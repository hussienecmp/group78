<form method='post' action=''>
  <div class='mb-3'> 
     <input type='text' name='title' class='form-control' placeholder='Artical Tiltle'> 
  </div> 
  <div class='mb-3'> 
     <textarea id='editor' name='content' class='form-control' placeholder='Artical Content' ></textarea>

  </div> 
  <div class='mb-3'> 
     <button type=submit class='btn btn-info'> Create Artical</button>
  </div>
</form>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
   $title=frindly_string($_POST['title']);
   $content=frindly_string($_POST['content']);
   $user_id=$_SESSION['id'];
   create_artical($title,$content,$user_id);
}
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
