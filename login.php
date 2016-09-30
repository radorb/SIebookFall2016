<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT rec_id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("Location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Technology Boot Camp - Login</title>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style type = "text/css">
         body {
            position: relative;
            padding-top:50px;
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
  input.sbox {
      transform: translate(0%, 50%);
  }
  input.sbutton {
      transform: translate(0%, 50%);
  }
      </style>
      
   </head>
   
   <body data-spy="scroll" data-target=".navbar" data-offset="50" bgcolor = "#FFFFFF">
       
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
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                   <label>Username: </label><input type = "text" name = "username" class = "box" autofocus="autofocus"/><br /><br />
                  <label>Password: </label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>