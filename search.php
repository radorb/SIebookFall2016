<div id="body1" class="container-fluid" align = "center">
<form action = "" method = "post">
<input type = "text" name = "search" class = "sbox" autofocus="autofocus"/>
<input type = "submit" class="sbutton" value = " Search "/>
</form>
<br>
</div>

<?php
include('master.php');
include("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $keyword = mysqli_real_escape_string($db,$_POST['search']);
      
      if($keyword == ""){
          echo '<h3 align="center">Keyword Results</h3><br>';
          echo '<p align="center">0 results</p>';
          echo '<br><h3 align="center">Link Title Results</h3><br>';
          echo '<p align="center">0 results</p>';
          return;
      }
      
      $sql1 = "(SELECT links_rec_id FROM keywords WHERE keyword LIKE '%" . $keyword ."%')";
      $result1 = mysqli_query($db,$sql1);
      
      echo '<h3 align="center">Keyword Results</h3><br>';
      
      if ($result1->num_rows > 0) {
     // output data of each row
     while($row1 = $result1->fetch_assoc()) {
         $sections_rec_id = $row1['links_rec_id'];
         $sql3 = "SELECT title, url FROM links WHERE rec_id='$sections_rec_id'";
         $result3 = mysqli_query($db,$sql3);
         while($row3 = $result3->fetch_assoc()) {
          echo '<p align="center"><a href="'. $row3['url']. '" target="_blank"">'. $row3['title']. '</a></p>';
         }
     }
} else {
     echo '<p align="center">0 results</p>';
}
      
      $sql2 = "(SELECT title, url FROM links WHERE title LIKE '%" . $keyword ."%')";
      $result2 = mysqli_query($db,$sql2);
      
      echo '<br><h3 align="center">Link Title Results</h3><br>';
      
      if ($result2->num_rows > 0) {
     // output data of each row
     while($row2 = $result2->fetch_assoc()) {
         echo '<p align="center"><a href="'. $row2['url']. '" target="_blank"">'. $row2['title']. '</a></p>';
     }
} else {
     echo '<p align="center">0 results</p>';
}
}
?>