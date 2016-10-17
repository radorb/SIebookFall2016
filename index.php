<?php
include('master.php');
include("config.php");

echo '<div id="body1" class="container-fluid">';
echo '<p><h1>Welcome to the Technology Boot Camp eBook Website!</h1></p>';

$sql1 = "SELECT rec_id, title FROM chapters ORDER BY number";
$result1 = $db->query($sql1);
$num = 0;
$num2 = 0;

if ($result1->num_rows > 0) {
//    echo '<div class="row">';
//    echo '<div class="col-md-2">';
    echo '<div id="MainMenu">';
         echo '<div class="list-group panel">';
     // output data of each row
     while($row1 = $result1->fetch_assoc()) {
         $chapters_rec_id = $row1['rec_id'];
         echo '<a href="#demo'. $num. '" class="list-group-item list-group-item-default" data-toggle="collapse" data-parent="#MainMenu"><h2><u>'. $row1['title']. '</h2></a>';
         echo '<div class="collapse list-group-menu" id="demo'. $num. '">';
//         echo '<p><h2>&nbsp;&nbsp;&nbsp;&nbsp;<u>'. $row1['title']. '</u></h2></p>';
         
         $sql2 = "SELECT rec_id, title FROM sections WHERE chapters_rec_id='$chapters_rec_id' ORDER BY number";
$result2 = $db->query($sql2);
if ($result2->num_rows > 0) {
     // output data of each row
     while($row2 = $result2->fetch_assoc()) {
         $sections_rec_id = $row2['rec_id'];
         echo '<a href="#SubMenu'. $num2. '" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu'. $num2. '"><h4>'. $row2['title']. '</h4><i class="fa fa-caret-down"></i></a>';
         echo '<div class="collapse list-group-submenu" id="SubMenu'. $num2. '">';
//         echo '<p><h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $row2['title']. '</h3></p>';
         
              $sql3 = "SELECT title, url FROM links WHERE sections_rec_id='$sections_rec_id' ORDER BY seqNumber";
              $result3 = $db->query($sql3);

              if ($result3->num_rows > 0) {
                   // output data of each row
                   while($row3 = $result3->fetch_assoc()) {
                       echo '<a href="'. $row3['url']. '" target="_blank"" class="list-group-item" data-parent="#SubMenu'. $num2. '">'. $row3['title']. '</a>';
//                       echo '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'. $row3['url']. '" target="_blank"">'. $row3['title']. '</a></p>';
                   }
              } else {
                       echo '<a href="#" class="list-group-item" data-parent="#SubMenu'. $num2. '">0 results</a>';
//                   echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0 results</p>";
              }
              echo '</div>';
              $num2++;
     }
} else {
         echo '<a href="#SubMenu'. $num2. '" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu'. $num2. '"><h4>0 results</h4><i class="fa fa-caret-down"></i></a>';
         echo '<div class="collapse list-group-submenu" id="SubMenu'. $num2. '">';
//     echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0 results</p>";
}
echo '</div>';
$num++;
     }
} else {
//    echo '<div class="row">';
//    echo '<div class="col-md-2">';
    echo '<div id="MainMenu">';
    echo '<div class="list-group panel">';
         echo '<a href="#demo0" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu"><h2><u>0 results</h2></a>';
         echo '<div class="collapse" id="demo0">';
//     echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;0 results</p>";
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