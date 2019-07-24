<?php 

//php logic for this page
session_start();
 ?>
<!DOCTYPE html>
<!-- meta tag below adjusts page scale for responsiveness -->
<html>
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
  <div class="container zone red">
    <h1>How it works</h1>
      <div class="how-to-descript">
        <h2>INTERNET OF THINGS - GPRS Tracking Device</h2>

          <p>The Internet of Things (IoT) allows anyone to create a plethora of gadgets in which to solve an array of problems, or just to make everyday task more convenient. This site focuses on how to create and deploy a GSM/GPRS (lobal System for Mobile Communications/General Packet Radio Service) device that you will be able to use to track any item you wish. It's incredibly frustrating to lose something that you either need or hold dear to you. This is especially true if you are unfortunate enough to lose your luggage at the airport while traveling. This is one thing that the device can be used for to prevent such a frustration. This tutorial will show you how a device can be attached to a belonging or put in a bag and give you its position that will be analyzed and mapped out for you. This device uses the ThingSpeak cloud to help pinpoint where your tagged belongings are located.</p>

          <p>The hardware for the device will consist of the following component:</p>

          <p>1. A GSM (Global System for Mobile communications) module board 
          called FONA from AdaFruit (<a class="link" href="https://www.adafruit.com/product/1946" target="_blank">www.adafruit.com/product/1946</a>):
          </p>

          <!-- photo here -->
          <a href="https://www.adafruit.com/product/1946" target="_blank">
            <img src="img/FONA.jpg" style="width:17.5em;height:12.25em;">
          </a>

          <p>2. A microcontroller such as an Arduino (3.3V or 5V)(<a class="link" href="https://www.adafruit.com/product/2377" target="_blank">https://www.adafruit.com/product/2377</a>):</p>

          <!-- photo here -->
          <a href="https://www.adafruit.com/product/2377" target="_blank">
            <img src="img/Arduino_3.3V8.jpg" style="width:17.5em;height:12.25em;">
          </a>

          <p>3. other components include a SIM card, a battery (<a class="link" href="https://www.adafruit.com/products/1578" target="_blank">www.adafruit.com/products/1578</a>):</p>

          <!-- photo here -->
          <a href="https://www.adafruit.com/products/1578" target="_blank">
            <img src="img/battery.jpg" style="width:17.5em;height:12.25em;">
          </a>

          <p>4. An antenna (<a class="link" href="https://www.adafruit.com/products/1859" target="_blank">www.adafruit.com/products/1859</a>):</p>

          <!-- photo here -->
          <a href="https://www.adafruit.com/products/1859" target="_blank">
            <img src="img/antenna.jpg" style="width:17.5em;height:12.25em;">
          </a>

          <p>5. And an antenna adaptor cable (<a class="link" href="https://www.adafruit.com/products/851" target="_blank">www.adafruit.com/products/851</a>):</p>

          <!-- photo here -->
          <a href="https://www.adafruit.com/products/851" target="_blank">
            <img src="img/antenna_cableAdaptor.jpg" style="width:17.5em;height:12.25em;">
          </a>
          <p> In order to connect everything, you will need a breadboard and 4 jumper wires. When setting up the hardware, be sure to disconnect everything from its power source, then proceed to connect the Arduino VCC(VOLTAGE, common collector) to the GSM module's Vio (that sets the I/O pin voltage level). Connect the Arduino GND (ground) to the GSM GND, then connect pin 2 on the Arduino to the GSM transmit (TX) pin, and pin 3 on the Arduino to the GSM receive (RX) pin.</p>

           <img src="img/gprs_setup.png" style="width:17.5em;height:12.25em;">

          <p> The Arduino code below is used to get the current location using the GSM positioning to send it over GPRS to the server (make sure to replace with your APN and ThingSpeak API key)...
          </p>

      </div>
      <div class="how-to-instructions">
        <h2>Arduino Code </h2>
        <p class="how-to-code">
         <span class="line-numbering">line 1:</span> #include &lt;SoftwareSerial.h&gt;<br>
            <span class="line-numbering">line 2:</span> SoftwareSerial SoftSerial(2, 3); // RX, TX<br>
            <span class="line-numbering">line 3:</span><br>
            <span class="line-numbering">line 4:</span> void setup()<br>
            <span class="line-numbering">line 5:</span> {<br>
            <span class="line-numbering">line 6:</span> SoftSerial.begin(9600);<br>
            <span class="line-numbering">line 7:</span> SoftSerial.println("AT+SAPBR=3,1,\"APN\",\"claro.com.br\"");<br>
            <span class="line-numbering">line 8:</span> delay(100);<br>
            <span class="line-numbering">line 9</span>: SoftSerial.println("AT+SAPBR=1,1");<br>
            <span class="line-numbering">line 10:</span> delay(1500);<br>
            <span class="line-numbering">line 11:</span> }<br>
            <span class="line-numbering">line 12:</span><br>
            <span class="line-numbering">line 13:</span> void loop()<br>
            <span class="line-numbering">line 14:</span> {<br>
            <span class="line-numbering">line 15:</span>    SoftSerial.println("AT+CIPGSMLOC=1,1");<br>
            <span class="line-numbering">line 16:</span>    while(!SoftSerial.find("+CIPGSMLOC: 0,")) { }<br>
            <span class="line-numbering">line 17:</span>    String longitude = readValue();<br>
            <span class="line-numbering">line 18:</span>    String latitude = readValue();<br>
            <span class="line-numbering">line 19:</span>    SoftSerial.println("AT+HTTPINIT");<br>
            <span class="line-numbering">line 20:</span>    delay(100);<br>
            <span class="line-numbering">line 21:</span>    SoftSerial.println("AT+HTTPPARA=\"URL\",\"http://api.thingspeak.com/update?key=APIKEY&lat=" + latitude + "&long=" + longitude + "\"");<br>
            <span class="line-numbering">line 22:</span>   delay(200);<br>
            <span class="line-numbering">line 23:</span>   SoftSerial.println("AT+HTTPACTION=0");<br>
            <span class="line-numbering">line 24:</span>   delay(5000);<br>
            <span class="line-numbering">line 25:</span>   SoftSerial.println("AT+HTTPTERM");<br>
            <span class="line-numbering">line 26:</span>   delay(54700);<br>
            <span class="line-numbering">line 27:</span> }<br>
            <span class="line-numbering">line 28:</span> <br>
            <span class="line-numbering">line 29:</span> String readValue()<br>
            <span class="line-numbering">line 30:</span> {<br>
            <span class="line-numbering">line 31:</span>   String value = "";<br>
            <span class="line-numbering">line 32:</span>   unsigned int i = 0;<br>
            <span class="line-numbering">line 33:</span>   while(i++ < 60000)<br>
            <span class="line-numbering">line 34:</span>  {<br>
            <span class="line-numbering">line 35:</span>   if(SoftSerial.available())<br>
            <span class="line-numbering">line 36:</span>     {<br>
            <span class="line-numbering">line 37:</span>       char c = SoftSerial.read();<br>
            <span class="line-numbering">line 38:</span>       if(c == ',') break;<br>
            <span class="line-numbering">line 39:</span>       value += c;<br>
            <span class="line-numbering">line 40:</span>     }<br>
            <span class="line-numbering">line 41:</span> }<br>
            <span class="line-numbering">line 42:</span> if(i < 60000) return value; else return "";<br>
            <span class="line-numbering">line 43:</span> }<br>
        </p>
      </div>
      <div class="how-to-descript">
        <p>After the initial include of the software serial library (on line 1), a variable is declared for it (on line 2). In this setup, the software serial communication is initiated (on line 6), then the APN (Access Point Name) for the operator is configured (on line 7, if you are using T-Mobile in the US, use epc.tmobile.com), and then the GPRS connection is opened (on line 9). The eternal loop starts by querying the current position of the device (on line 15), waits for a reply (on line 16), and then retrieves the position values (on lines 17-18, using the function on lines 29-43). Then an HTTP connection is initiated (on line 19), the URL is set (on line 21), and the request is made (on line 23). Finally, the HTTP connection is terminated (on line 25), and then process is repeated reporting the position of the device once a minute.</p>

        <p>You can then sign up for a ThingSpeak account (on <a class="link" href="https://thingspeak.com" target="_blank">https://thingspeak.com</a>), and create a new channel, it will give you the API (application programming interface) key that you will need to insert into the code. You can just receive the raw data on the channel page, but is you want to see the position on a map, you can create the page with this code...</p>
      </div>

      <div class="how-to-instructions">
        <h2>HTML</h2>
        <p class="how-to-code">
          &lt;html&gt;<br>
          &lt;head&gt;<br>
            %%PLUGIN_CSS%%<br>
            %%PLUGIN_JAVASCRIPT%%<br>
          &lt;/head&gt;<br>
          &lt;body&gt;<br>
            &lt;div id="map"&gt;&lt;/div&gt;<br>
          &lt;/body&gt;<br>
          &lt;/html&gt;<br>
        </p>

        <h2>CSS</h2>
        <p class="how-to-code">
          &lt;style type="text/css"&gt;<br>
            body { margin: 0 0 0 0; }<br>
            #map { width: 450px; height: 260px; }<br>
          &lt;/style&gt;<br>

        </p>

        <h2>JavaScript</h2>
        <p class="how-to-code">
          &lt;script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"&gt;&lt;/script&gt; <br>
          &lt;script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"&gt;&lt;/script&gt;<br>
          &lt;script type="text/javascript"&gt;<br>
          var channelId = window.parent.location.pathname.match(/\d+/g);<br>
          $.getJSON("https://api.thingspeak.com/channels/" + channelId + "/feed/last.json?location=true", function(data)<br>
          {<br>
          var coords = new google.maps.LatLng(parseFloat(data.latitude), parseFloat(data.longitude));<br>
          var mapOptions = { zoom: 12, center: coords, mapTypeControl: true, mapTypeId: google.maps.MapTypeId.ROADMAP };<br>
          map = new google.maps.Map(document.getElementById("map"), mapOptions);<br>
          var marker = new google.maps.Marker({ position: coords, map: map, title: "My Bag" });<br>
          });<br>
          &lt;/script&gt;<br>

        </p>

      </div>


      <div class="how-to-descript">
        <p>I won’t get to into detail about this code, but to sum it up it basically just queries the channel for the last reported position and shows it on a map provided by Google. Here is a link to the code by ThinkSpeak that you can set up on your server (<a class="link" href="https://github.com/iobridge/thingspeak" target="_blank">https://github.com/iobridge/thingspeak</a>), the code is open source and free to use. </p>

        <p>In a real-world scenario, adding an accelerometer to the device would be a good idea so that it is able to stop and start the reporting position when it is in the same location for a long period of time. This will allow the device to conserve energy by as it can be turned off temporarily and the Arduino put to sleep. </p>

        <p>For more information on this subject, please visit the following link (<a class="link" href="http://cforsberg.com/?p=254" target="_blank">http://cforsberg.com/?p=254</a>). </p>
      </div>
    <br><br>
    
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
        <a href="">
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