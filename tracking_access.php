<?php 
//php logic for this page
session_start();

include('/capstone_test/config_signup.php');
include('/capstone_test/config_login.php');
include('/capstone_test/map_config.php');


//NOTE: THIS FILE CONTAINS A DEFAULT MAP FOR DISPLAY PURPOSES, 
//THE FILE tracking_map.php CONTAINS THE LOGGED IN DEVICES COORDINATES.


 ?>

<!DOCTYPE html>
<html>
<!-- meta tag below adjusts page scale for responsiveness -->
<meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
<head>
  <title>DIY GSM/GPRS Tracker</title>
  <link rel="icon" href="img/favicon.jpg" type="image/jpg" sizes="16x16">
  <link rel="stylesheet" type="text/css" href="./style.css">
  <!-- ATTENTION!!!:
   extra css code for openlayers map goes here!-->
   <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
   <style>
      .map {
        height: 400px;
        /*height: 25em;*/
        /*switch from 400px to 25em for responsiveness*/
        width: 80%;
      }
    </style>
</head>
<body>
  <?php 
  //html code below will only be loaded if session is successful
  if(isset($_SESSION['success'])) :
   ?>
<!-- the home and how_to page have been converted to php files for the 
     purpose of continue the session when the user has logged in. -->
  <nav class="zone green">
  	<ul class="main-nav">
      <li>Access Device</li>
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
  <div class="container zone red">
    <?php
    //gives the msg "You are now logged in" when successfully logged in.
    echo $_SESSION['success'];
     ?>
     <!-- if the user is logged in print info about them -->
     <?php if(isset($_SESSION['username'])) : ?>
    <h1>Welcome <strong><?php echo $_SESSION['username'] ?></strong> to your Tracking Account!!</h1>
    <?php endif ?>

     <h2>Access your Registered Device and see where it is!</h2>
    <p>Please enter the information for your device below to see where it is.</p>
  </div>
  <div class="form-container">
   
    <form name="login-form" action="/capstone_test/map_config.php" method="post">    
    <!-- Device ID -->
    <div class="row">
      <div class="col-25">
        <label for="dev-id"><strong>Device ID:</strong></label>
      </div>
      <div class="col-75">
        <input type="text" id="dev-id" name="devID" placeholder="Your device ID#..."
         required>
      </div>
    </div>
    <!-- Device Desciption -->
    <div class="row">
      <div class="col-25">
        <label for="descript"><strong>Desciption:</strong></label>
      </div>
      <div class="col-75">
        <input type="text" id="descript" name="descript" placeholder="What is it tracking?.."
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

      <h2>Don't have your device registered?</h2>
        <p>Then <a href="tracking_register.php"><u>CLICK HERE</u></a> to register one!</p>

      <h3>Your devices location will then be displayed on a map such as the one below.</h3>

      <div id="map" class="map"></div><!--div displays the map-->

      <p>Powered by <a class="link" href="https://openlayers.org/" target="_blank">
      OpenLayers.org</a></p>

    </div>
 <div class="zone blue grid-wrapper">
    <!-- 
      links to images used:
      https://www.iconfinder.com/icons/3447425/home_house_icon_symbol_icon
      https://www.iconfinder.com/icons/3773917/cogwheel_gear_preferences_setting_icon_icon
      https://www.iconfinder.com/icons/2745002/geo_location_map_marker_point_tag_icon
     -->    
     <div class="box zone">
        <a href="index.php">
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
        <a href="">
          <img src="img/map.png">
          <p>Account</p>
        </a>
     </div>
  </div>
  <footer class="zone yellow">DIY GPRS Tracker</footer>
  <?php endif ?>
  <!-- ATTENTION!!!:
   all of the script for the openlayers map will go here-->

   <!-- script off of openlayers.org -->
    <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>

    <!-- script to run on older platforms (eg. Internet Explorer and Android 4.x) -->
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList"></script>
    <script type="text/javascript">


      //vars below are default coordinates of San Diego, CA for displaying the map.
      var longitude = -117.160263; 
      var latitude = 32.719710; 
      var map = new ol.Map({
        target: 'map',
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([longitude, latitude]),//the coordinates are passed 
          //through the fromLonLat() function. 

         //NOTE TO SELF: 
         //figure out a way to modify the zoom so that it is zoomed out by default.

          zoom: 12.2// zooms in on coordinates
        })
      });
    </script>
</body>
</html>