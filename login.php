<?php

include('/capstone_test/config_login.php');


?>
<!DOCTYPE html>
<html>
<!-- meta tag below adjusts page scale for responsiveness -->
<meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
<head>
	<title>DIY GSM/GPRS Tracker</title>
  <link rel="icon" href="img/favicon.jpg" type="image/jpg" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
	 <nav class="zone green">
	  	<ul class="main-nav">
	  		<li><a href="index.html">Home</a></li>
	  		<li><a href="How_to.html">How it works</a></li>
	  		<li>Login</li>
	  		<li class="push"><a href="signup.php">Signup</a></li>	
	  	</ul>
    </nav>
    <div class="container zone red">
      <div class="signup-text">
        <h1>login</h1><br>
        <h3>Log in to view your account for your GPRS tracking device!</h3>
      </div>
    </div>
 
 <!-- login form begins -->
  <div class="form-container">

    <form name="login-form" action="/capstone_test/config_login.php" method="post">    
    <!-- username -->
    <div class="row">
      <div class="col-25">
        <label for="uname"><strong>Username</strong></label>
      </div>
      <div class="col-75">
        <input type="text" id="uname" name="username" placeholder="Your username..."
         required>
      </div>
    </div>
    <!-- password -->
    <div class="row">
      <div class="col-25">
        <label for="password"><strong>Password</strong></label>
      </div>
      <div class="col-75">
        <input type="password" id="password" name="password" placeholder="Your password.."
         required>
      </div>
    </div>
    <!-- submit button -->
    <div class="row">
      <div class="col-sub">
        <input type="submit" value="Submit" name="login_user">
      </div>
    </div>
    </form>
    </div>
    <!-- login form ends -->
     <div class="container zone red">
      <div class="signup-text">
        <h2>Don't have an account?</h2>
        <p>Then <a href="signup.php"><u>SIGN UP!</u></a></p>
      </div>
    </div>
    <div class="zone blue grid-wrapper">
    <!-- 
      links to images used:
      https://www.iconfinder.com/icons/3447425/home_house_icon_symbol_icon
      https://www.iconfinder.com/icons/3773917/cogwheel_gear_preferences_setting_icon_icon
      https://www.iconfinder.com/icons/315153/clipboard_edit_icon
     -->      
     <div class="box zone">
        <a href="index.html">
          <img src="img/Home.png">
          <p>home</p>
        </a>
     </div>
     <div class="box zone">
        <a href="How_to.html">
          <img src="img/cogwheel.png">
          <p>How it works</p>
        </a>
     </div>
     <div class="box zone">
        <a href="">
          <img src="img/clipboard.png">
          <p>signup</p>
        </a>
     </div>
    </div>
    <footer class="zone yellow">DIY GPRS Tracker</footer>

</body>
</html>