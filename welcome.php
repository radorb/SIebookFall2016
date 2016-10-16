<?php
   include('master.php');
   include('session.php');
?>
       
    <div id="body1" class="container-fluid">
      <h1>Welcome, <?php echo $login_session; ?></h1>
      <p><a href="listChapters.php">Edit Chapters, Sections, Links and Tags</a></p>
      <h3><a href = "logout.php">Logout</a></h3>
    </div>