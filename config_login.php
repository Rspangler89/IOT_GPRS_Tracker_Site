<?php 
session_start();

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


//mysqli_real_escape_string() Escapes special characters 
//in a string for use in an SQL statement using the variable for the connection and 
//the $_POST method which retrieves the name of the input tags on the login page.

$userName = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);



	
//NOTE: crypt() appears to work, but the function is not (yet) binary safe.
//More research is needed to be sure if this is secure enough to use permanently.
$password_encrypt = crypt($password, salt);


//the syntax below creates a query that retrieves 
//data which matches the input the user enters in the login form. 
$query = "SELECT * FROM User_Account WHERE User_Name ='$userName' 
AND Password ='$password_encrypt'";
//mysqli_query() Performs a query against the database
$results = mysqli_query($conn, $query);

//Return the number of rows in a result set
if(mysqli_num_rows($results)) {
//repeats the userName and tells you user they have logged into the tracking page.
	$_SESSION['username'] = $userName;
    $_SESSION['success'] = "You are now logged  in";
			
	// header() function sends a raw HTTP header to a client.
	header('Location: /capstone_test/tracking_login.php');
	} else {
 
		echo "<h1 style='text-align: center;'>Sorry, username or password is invalid,<br>
		 <a href='login.php'>please try again.</a></h1>";
	}

		

 ?>