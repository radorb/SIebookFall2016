<?php
   include('session.php');
?>
<html">
   
   <head>
      <title>Technology Boot Camp - Welcome</title>
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
      <!--<a class="nav navbar-nav" href="index.php">Technology Boot Camp</a>-->
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
       
    <div id="body1" class="container-fluid">
      <h1>Welcome, <?php echo $login_session; ?></h1>
      <p><a href="index.php">Edit Chapters</a></p>
      <p><a href="index.php">Edit Sections</a></p>
      <p><a href="index.php">Edit Links</a></p>
      <h3><a href = "logout.php">Logout</a></h3>
    </div>
   </body>
   
</html>