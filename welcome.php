<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Technology Boot Camp - Welcome</title>
   </head>
   
   <body>
      <h1>Welcome, <?php echo $login_session; ?>.</h1>
      <p><a href="index.php">Edit Chapters</a></p>
      <p><a href="index.php">Edit Sections</a></p>
      <p><a href="index.php">Edit Links</a></p>
      <h2><a href = "logout.php">Logout</a></h2>
   </body>
   
</html>