<?php
//including the database connection file
include("config.php");
 
//getting id of the data from url
$id = (int)$_GET['id'];
$id2 = (int)$_GET['id2'];
 
//deleting the row from table
$result = mysqli_query($db, "DELETE FROM sections WHERE rec_id=$id");
 
//redirecting to the display page (index.php in our case)
header("Location:listSections.php?id=$id2");
?>