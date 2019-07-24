<?php 

//starts session
session_start();

//include('/capstone_test/map_config.php');
include('/capstone_test/insert_coordinates_config.php');

//vars to connect to database below left blank for security reasons.
$db_host = '';//database host name goes here
$db_username = '';//database username goes here
$db_password = '';//database password goes here
$db_name = '';//database name goes here

//Create connection
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

//Check connection 
if (!$conn) {
	die("Connection failed:" . mysqli_connect_error());
}




//defining and retrieving the username 
//to be used in getting the user id in the code on line 38-39
$userName = $_SESSION['username'];
//variables to hold the information given for the device.
$itemID = $_SESSION['devID'];
$itemDescript = $_SESSION['descript'];




//code below retrieves coordinates after they've been stored

$sql = "SELECT Latitude, Longitude FROM Settings_and_Locations WHERE Device_ID = '$itemID'
AND User_ID = (SELECT User_ID FROM User_Account WHERE User_Name = '$userName');";



$result = mysqli_query($conn, $sql);


if(mysqli_num_rows($result)) {



	while($row = mysqli_fetch_assoc($result)) {
		//foreach sets the retrieved coordinance as session variables.
		foreach ($row as $key => $value) {
			$_SESSION[$key] = $value;//sets coordinates as session variables.
			$_SESSION['devID'] = $itemID;//helps display the device id on the map page.
  		    $_SESSION['descript'] = $itemDescript;//helps display id description on map page.
		}
        header('Location: /capstone_test/tracking_map.php');
    }
	
} else {

	//error given to user if Device ID is invalid.
	echo "Sorry, Device is invalid for this account.<br>
	Please try again.";
}

 ?>