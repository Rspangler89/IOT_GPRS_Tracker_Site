<?php 
//php logic for this page
session_start();
  //session variables declared here.
  $longitude = $_SESSION['Longitude'];
  $latitude = $_SESSION['Latitude'];
  $itemID = $_SESSION['devID'];
  $itemDescript = $_SESSION['descript'];

 ?>

<!DOCTYPE html>
<html>
<!-- meta tag below adjusts page scale for responsiveness -->
<meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
<head>
  <title>DIY GSM/GPRS Tracker</title>
  <link rel="icon" href="img/favicon.jpg" type="image/jpg" sizes="16x16">
  <link rel="stylesheet" type="text/css" href="./style.css">
  <!-- link to css code for openlayers map below-->
   <link rel="stylesheet" href="https://openlayers.org/en/v4.6.5/css/ol.css" type="text/css">
   <style>
      .map {
        height: 400px;
        width: 80%;
      }
      .input{
        color: #ffff1a;
      }
      .device-info {
        display: flex;
        list-style: none;
        font-size: 0.7em;
        margin: 0;
      }
      @media only screen and (max-width: 600px) {
          .device-info {
              font-size: 0.5em;
              padding: 0;
          }  
      }
    </style>
</head>
<!-- the functions below are used in loading the Openlayers map that displays the 
users devices location. -->
<body onload="initialize_map(); add_map_point(mapLat, mapLng);">
  <?php 
  //html code below will only be loaded if session is successful
  if(isset($_SESSION['success'])) :
   ?>
   <!-- links "Access Device", "Register Device", "Log out" displayed below.-->
  <nav class="zone green">
  	<ul class="main-nav">
      <li><a href="tracking_access.php">Access Device</a></li>
      <li><a href="tracking_register.php">Register Device</a></li>
      <li>Tracking Map</li>
      <li class="push"><a href="/capstone_test/logout.php">logout</a></li>
    </ul>
  </nav>
  <div class="container zone red">
     <!-- if the user is logged in print info about them -->
     <?php if(isset($_SESSION['username'])) : ?>
    <h1>Welcome <strong><?php echo $_SESSION['username'] ?></strong> to your Tracking Account!!</h1>
    <h2>The location of your device is displayed below.</h2>
    <?php endif ?>

    
      <div id="map" class="map"></div><!--div displays the OpenLayers map-->
      
      <nav >
        <ul class="device-info">
          <li class="device-id">
            <!-- code below displays the devices id and the item it's tracking. -->
            <strong><u>Device ID:</u> <span class="input"><?php echo $itemID ?></span></strong>
          </li>
          <li class="item">
            <strong><u>Item:</u> <span class="input"><?php echo $itemDescript ?></span></strong></a>
          </li> 
        </ul>
      </nav>

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
        <a href="tracking_access.php">
          <img src="img/map.png">
          <p>Account</p>
        </a>
     </div>
  </div>
  <footer class="zone yellow">DIY GPRS Tracker</footer>
  <?php endif ?>
  
   <!-- script off of openlayers.org --> 
   <script src="https://openlayers.org/en/v4.6.5/build/ol.js" type="text/javascript"></script>
   
   <!-- script off of openlayers.org --> 
    <script type="text/javascript">
      /* OSM & OL example code provided by https://mediarealm.com.au/ */
    var map; 
    var mapLat = <?php echo $latitude; ?>;//php session vars declared here
    var mapLng = <?php echo $longitude; ?>;//php session vars declared here

    // NOTE: the commented out code below is used to track the users device through a channel 
    // that is set up via thingspeek.com that is accessed with a API Key, it will be modified 
    //in the future to fit into the OpenLayers map once a device has been made for testing.

    // var channelId = window.parent.location.pathname.match(/\d+/g);
    // $.getJSON("https://api.thingspeak.com/channels/" + channelId + "/feed/last.json?location=true", function(data)
    // {
    //   var coords = new google.maps.LatLng(parseFloat(data.latitude), parseFloat(data.longitude));
    //   var mapOptions = { zoom: 12, center: coords, mapTypeControl: true, mapTypeId: google.maps.MapTypeId.ROADMAP };
    //   map = new google.maps.Map(document.getElementById("map"), mapOptions);
    //   var marker = new google.maps.Marker({ position: coords, map: map, title: "My Bag" });
    // });



    function initialize_map() {
      map = new ol.Map({
        target: "map",
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM({
                      url: "https://a.tile.openstreetmap.org/{z}/{x}/{y}.png"
                })
            })
        ],
        view: new ol.View({
            center: ol.proj.fromLonLat([mapLng, mapLat]),
            //zoom: mapDefaultZoom
            zoom: 19.3// zooms in on coordinates
        })
      });
    }

    // the function below marks the coordinates with a red dot.
    function add_map_point(lat, lng) {
      var vectorLayer = new ol.layer.Vector({
        source:new ol.source.Vector({
          features: [new ol.Feature({
                geometry: new ol.geom.Point(ol.proj.transform([parseFloat(lng), parseFloat(lat)], 'EPSG:4326', 'EPSG:3857')),
            })]
        }),
        style: new ol.style.Style({
          image: new ol.style.Icon({
            anchor: [0.5, 0.5],
            anchorXUnits: "fraction",
            anchorYUnits: "fraction",
            src: "https://upload.wikimedia.org/wikipedia/commons/e/ec/RedDot.svg"
          })
        })
      });
      map.addLayer(vectorLayer); 
    }
    </script>
</body>
</html>