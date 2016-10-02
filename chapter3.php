<?php
include('master.php');
include("config.php");

$sql1 = "SELECT rec_id, title FROM chapters WHERE number=3";
$result1 = $db->query($sql1);

if ($result1->num_rows > 0) {
     // output data of each row
     while($row1 = $result1->fetch_assoc()) {
         $chapters_rec_id = $row1['rec_id'];
         echo '<div id="body1" class="container-fluid"><h1>'. $row1['title']. '</h1>';
     }
} else {
     echo "0 results";
}

$sql2 = "SELECT rec_id, title FROM sections WHERE chapters_rec_id='$chapters_rec_id' ORDER BY number";
$result2 = $db->query($sql2);

if ($result2->num_rows > 0) {
     // output data of each row
     while($row2 = $result2->fetch_assoc()) {
         $sections_rec_id = $row2['rec_id'];
         echo '<h3>'. $row2['title']. '</h3>';
         
              $sql3 = "SELECT title, url FROM links WHERE sections_rec_id='$sections_rec_id' ORDER BY seqNumber";
              $result3 = $db->query($sql3);

              if ($result3->num_rows > 0) {
                   // output data of each row
                   while($row3 = $result3->fetch_assoc()) {
                        echo '<p><a href="'. $row3['url']. '" target="_blank"">'. $row3['title']. '</a></p>';
                   }
              } else {
                   echo "0 results";
              }
     }
} else {
     echo "0 results";
}

$db->close();
?>