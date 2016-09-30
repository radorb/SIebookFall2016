<?php
   
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
  #chapter1 {padding-top:50px;height:500px;border-bottom: thin solid #000000;}
  #chapter2 {padding-top:50px;height:500px;border-bottom: thin solid #000000;}
  #chapter3 {padding-top:50px;height:500px;border-bottom: thin solid #000000;}
  input.box {
      transform: translate(0%, 50%);
  }
  input.button {
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
      <a class="navbar-brand" href="#">Technology Boot Camp</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#chapter1">Security</a></li>
          <li><a href="#chapter2">Infrastructure</a></li>
          <li><a href="#chapter3">Mobile Development</a></li>
<!--          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Chapter 4 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#chapter41">Chapter 4-1</a></li>
              <li><a href="#chapter42">Chapter 4-2</a></li>
            </ul>
          </li>-->
          <li><form action = "" method = "post">
                  <input type = "text" name = "search" class = "box" autofocus="autofocus"/>
                  <input type = "submit" class="button" value = " Search "/>
               </form>
          </li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div id="chapter1" class="container-fluid">
  <h1>Security</h1>
  <p><a href="index.php">Security Link 1</a></p>
  <p><a href="index.php">Security Link 2</a></p>
  <p><a href="index.php">Security Link 3</a></p>
  <p><a href="index.php">Security Link 4</a></p>
  <p><a href="index.php">Security Link 5</a></p>
  <p><a href="index.php">Security Link 6</a></p>
  <p><a href="index.php">Security Link 7</a></p>
  <p><a href="index.php">Security Link 8</a></p>
  <p><a href="index.php">Security Link 9</a></p>
  <p><a href="index.php">Security Link 10</a></p>
  
</div>
<div id="chapter2" class="container-fluid">
  <h1>Infrastructure</h1>
  <p><a href="index.php">Infrastructure Link 1</a></p>
  <p><a href="index.php">Infrastructure Link 2</a></p>
  <p><a href="index.php">Infrastructure Link 3</a></p>
  <p><a href="index.php">Infrastructure Link 4</a></p>
  <p><a href="index.php">Infrastructure Link 5</a></p>
  <p><a href="index.php">Infrastructure Link 6</a></p>
  <p><a href="index.php">Infrastructure Link 7</a></p>
  <p><a href="index.php">Infrastructure Link 8</a></p>
  <p><a href="index.php">Infrastructure Link 9</a></p>
  <p><a href="index.php">Infrastructure Link 10</a></p>
  
</div>
<div id="chapter3" class="container-fluid">
  <h1>Mobile Development</h1>
  <p><a href="index.php">Mobile Development Link 1</a></p>
  <p><a href="index.php">Mobile Development Link 2</a></p>
  <p><a href="index.php">Mobile Development Link 3</a></p>
  <p><a href="index.php">Mobile Development Link 4</a></p>
  <p><a href="index.php">Mobile Development Link 5</a></p>
  <p><a href="index.php">Mobile Development Link 6</a></p>
  <p><a href="index.php">Mobile Development Link 7</a></p>
  <p><a href="index.php">Mobile Development Link 8</a></p>
  <p><a href="index.php">Mobile Development Link 9</a></p>
  <p><a href="index.php">Mobile Development Link 10</a></p>
</div>

</body>
</html>