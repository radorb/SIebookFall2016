<?php
   include("config.php");
?>

<html>
<head>
  <title>Technology Boot Camp - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative;
  }
  #body1 {padding-top:50px;}
/*  #chapter2 {padding-top:50px;height:500px;border-bottom: thin solid #000000;}
  #chapter3 {padding-top:50px;height:500px;border-bottom: thin solid #000000;}*/
  input.sbox {
      transform: translate(0%, 50%);
  }
  input.sbutton {
      transform: translate(0%, 50%);
  }
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <!--<a class="nav navbar-nav" href="#">Technology Boot Camp</a>-->
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Technology Boot Camp</a></li>
          <li><a href="chapter1.php">Security</a></li>
          <li><a href="chapter2.php">Infrastructure</a></li>
          <li><a href="chapter3.php">Mobile Development</a></li>
<!--          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Chapter 4 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#chapter41">Chapter 4-1</a></li>
              <li><a href="#chapter42">Chapter 4-2</a></li>
            </ul>
          </li>-->
          <li><form action = "" method = "post">
                  <input type = "text" name = "search" class = "sbox"/>
                  <input type = "submit" class="sbutton" value = " Search "/>
               </form>
          </li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<?php
include("config.php");

$sql = "SELECT title FROM chapters WHERE number=3";
$result = $db->query($sql);

if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo '<div id="body1" class="container-fluid"><h1>'. $row['title']. '</h1>';
     }
} else {
     echo "0 results";
}

$sql2 = "SELECT title FROM sections WHERE chapters_rec_id=2";
$result2 = $db->query($sql2);

if ($result2->num_rows > 0) {
     $sections_rec_id = 0;
     // output data of each row
     while($row2 = $result2->fetch_assoc()) {
         echo '<h3>'. $row2['title']. '</h3>';
         
              $sql3 = "SELECT title, url FROM links WHERE sections_rec_id='$sections_rec_id'";
              $result3 = $db->query($sql3);

              if ($result3->num_rows > 0) {
                   // output data of each row
                   while($row3 = $result3->fetch_assoc()) {
                        echo '<p><a href="'. $row3['url']. '">'. $row3['title']. '</a></p>';
                   }
              } else {
                   echo "0 results";
              }
         $sections_rec_id++;
     }
} else {
     echo "0 results";
}

$conn->close();
?>

</body>
</html>