<?php 

//php logic for this page
session_start();
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
<?php 
//html code below will only be loaded if session is successful
if(isset($_SESSION['success'])) :
?>
  <nav class="zone green">
    <ul class="main-nav">
      <li><a href="tracking_access.php">Access Device</a></li>
      <li><a href="tracking_register.php">Register Device</a></li>
      <!--
       code below creates link to tracking_map.php once user has
        entered a location in form on tracking.php
        -->
      <?php if (isset($_SESSION['Longitude'])) : ?>
      <li><a href="/capstone_test/tracking_map.php">Tracking Map</a></li>  
      <?php endif ?>
      
      <li class="push"><a href="/capstone_test/logout.php">logout</a></li>
    </ul>
  </nav>

  <div class="home">
    
    <h1 class="greet">Welcome!!</h1>
    <div class="home-descript">
      <h2>
        Have you ever had a problem keeping track of your valuables?
        Has one of your belongings upped and disappeared, never to be seen again? 
        Ever wondered if there was a way to keep track of everything of value to you?
        Well say no more! There is now a way for anyone to create a GSM/GPRS(Global System for Mobile Communications/General Packet Radio Service) device using IOT (internet of things) 
        components that can be easily purchased online! This site will show you how it works,
        how to make it, and even allow you to create an account that will allow you to keep 
        track of it!!
      </h2>
    </div>
  </div>
  
  <div class="zone blue grid-wrapper">
   <!-- 
      links to images used:
      https://www.iconfinder.com/icons/3447425/home_house_icon_symbol_icon
      https://www.iconfinder.com/icons/3773917/cogwheel_gear_preferences_setting_icon_icon
      https://www.iconfinder.com/icons/2745002/geo_location_map_marker_point_tag_icon
     -->    
     <div class="box zone">
        <a href="">
          <img src="img/Home.png">
          <p>home</p>
        </a>
     </div>
     <div class="box zone">
        <a href="How_to.php">
          <img src="img/cogwheel.png">
          <p>How it works</p>
        </a>
     </div>
     <div class="box zone">
        <a href="tracking_access.php">
          <img src="img/map.png">
          <p>Account</p>
        </a>
     </div>
  </div>
  <footer class="zone yellow">DIY GPRS Tracker</footer>

<?php endif ?>

</body>
</html>