<?php 
//includes the file to connect to the database and stores the data filled in the form.
 include('/capstone_test/config_signup.php');
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
	  		<li><a href="login.php">Login</a></li>
	  		<li class="push">Signup</li>	
	  	</ul>
    </nav>
    <div class="container zone red">
      <div class="signup-text">
        <h1>Sign up</h1><br>
        <h3>Create an account for your GSM/GPRS tracking device!</h3>
      </div>
    </div>
  <!-- form begins -->

    <div class="form-container">
      <!-- config_testing.php is now config.php and the old config.php is now config_secondDraft.php -->
    <form name="signup-form"  action="/capstone_test/config_signup.php" 
    method="post">
      <!-- firstname -->
    <div class="row">
      <div class="col-25">
        <label for="fname"><strong>First Name</strong></label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="firstname" placeholder="Your name.." required>
      </div>
    </div>
    <!-- last name -->
    <div class="row">
      <div class="col-25">
        <label for="lname"><strong>Last Name</strong></label>
      </div>
      <div class="col-75">
        <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>
      </div>
    </div>
    <!-- username -->
    <div class="row">
      <div class="col-25">
        <label for="uname"><strong>Username</strong></label>
      </div>
      <div class="col-75">
        <input type="text" id="uname" name="username" placeholder="Your username.." required>
      </div>
    </div>
    <!-- email -->
    <div class="row">
      <div class="col-25">
        <label for="email"><strong>Email</strong></label>
      </div>
      <div class="col-75">
        <input type="email" id="email" name="email" placeholder="Your email.." required>
      </div>
    </div>
    <!-- password -->
    <div class="row">
      <div class="col-25">
        <label for="password"><strong>Password</strong></label>
      </div>
      <div class="col-75">
        <input type="password" id="password1" name="password1" placeholder="Your password.." 
        required>
      </div>
    </div>
    <!-- confirm password -->
    <div class="row">
      <div class="col-25">
        <label for="password"><strong>Confirm Password</strong></label>
      </div>
      <div class="col-75">
        <input type="password" id="password2" name="password2" placeholder="Confirm password.." 
        required>
      </div>
    </div>
    <!-- phonenumber -->
    <div class="row">
      <div class="col-25">
        <label for="phone"><strong>Phone Number(optional)</strong></label>
      </div>
      <div class="col-75">
        <input type="text" id="phone" name="phone" placeholder="Your phone number..">
      </div>
    </div>
    <!-- facebook account -->
    <div class="row">
      <div class="col-25">
        <label for="facebook"><strong>Facebook(optional)</strong></label>
      </div>
      <div class="col-75">
        <input type="text" id="facebook" name="facebook" placeholder="Your facebook account..">
      </div>
    </div>
    <!-- submit button -->
    <div class="row">
      <div class="col-sub">
        <!-- testing code linked to Submit button -->
        <input type="submit" value="Submit" name="register_user">
      </div>
    </div>
    </form>
    </div>

  <!-- form ends -->

  <!-- signup text -->
    <div class="container zone red">
      <div class="signup-text">
        <h2>Already have an account?</h2>
        <h3>Then <a href="login.php"><u>LOGIN!</u></a></h3>
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