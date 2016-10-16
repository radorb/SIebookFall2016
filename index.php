<?php
include('master.php');
include("config.php");

echo '<div id="body1" class="container-fluid">';
echo '<p><h1>Welcome to the Technology Boot Camp eBook Website!</h1></p>';

$sql1 = "SELECT rec_id, title FROM chapters ORDER BY number";
$result1 = $db->query($sql1);

if ($result1->num_rows > 0) {
     // output data of each row
     while($row1 = $result1->fetch_assoc()) {
         $chapters_rec_id = $row1['rec_id'];
         echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;<u>'. $row1['title']. '</u></h2></p>';
         
         $sql2 = "SELECT rec_id, title FROM sections WHERE chapters_rec_id='$chapters_rec_id' ORDER BY number";
$result2 = $db->query($sql2);
if ($result2->num_rows > 0) {
     // output data of each row
     while($row2 = $result2->fetch_assoc()) {
         $sections_rec_id = $row2['rec_id'];
         echo '<p><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $row2['title']. '</h3></p>';
         
              $sql3 = "SELECT title, url FROM links WHERE sections_rec_id='$sections_rec_id' ORDER BY seqNumber";
              $result3 = $db->query($sql3);

              if ($result3->num_rows > 0) {
                   // output data of each row
                   while($row3 = $result3->fetch_assoc()) {
                        echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'. $row3['url']. '" target="_blank"">'. $row3['title']. '</a></p>';
                   }
              } else {
                   echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0 results</p>";
              }
     }
} else {
     echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0 results</p>";
}
     }
} else {
     echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;0 results</p>";
}

$db->close();
?>

<!--<div id="body1" class="container-fluid">
  <h1>Welcome to the Technology Boot Camp eBook Website!</h1>
  <h3>Please select a link.</h3>
  <p><a href="chapter1.php">Security</a></p>
  <p><a href="chapter2.php">Infrastructure</a></p>
  <p><a href="chapter3.php">Mobile Development</a></p>
</div>-->