<?php 

//starts session
session_start();

include('/capstone_test/tracking_register.php');

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

//$userName used in retrieving and storing the user ID 
//from one table to anthother (see lines 37-45).
$userName = $_SESSION['username'];

//variables to hold the information given for the device.
$itemDescript = mysqli_real_escape_string($conn, $_POST['descript']);
$itemID = mysqli_real_escape_string($conn, $_POST['devID']);
$apiKey = mysqli_real_escape_string($conn, $_POST['api-key']);




// code below inserts data from the tables User_Account and Device_Simulation into 
//Settings_and_Locations

$sql = "INSERT INTO Settings_and_Locations
(User_ID, Device_ID, Item_Description, Latitude, Longitude, API_Key)
VALUES
((SELECT User_ID FROM User_Account WHERE User_Name = '$userName'),
(SELECT Device_ID FROM Device_Simulation WHERE Device_ID = '$itemID'),
'$itemDescript',
(SELECT Latitude FROM Device_Simulation WHERE Device_ID = '$itemID'),
(SELECT Longitude FROM Device_Simulation WHERE Device_ID = '$itemID'),
'$apiKey');";


if(mysqli_query($conn, $sql)) {
		//session variable passed to the file in the header.
    	$_SESSION['username'] = $userName;
		$_SESSION['devID'] = $itemID;
	  	$_SESSION['descript'] = $itemDescript;
	  	header('Location: /capstone_test/get_coordinates_config.php');
	
} else {

	//error given to user if Device ID is invalid.
	echo "<h1 style='text-align: center;'>Sorry, the information for this device is 
	invalid for this account.<br>
	<a href='tracking_register.php'>Please try again.</a></h1>";
}

 ?>