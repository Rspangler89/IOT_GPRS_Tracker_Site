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
$firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastName = mysqli_real_escape_string($conn, $_POST['lastname']);
$userName = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password_1 = mysqli_real_escape_string($conn, $_POST['password1']);
$password_2 = mysqli_real_escape_string($conn, $_POST['password2']);
$phoneNumber = mysqli_real_escape_string($conn, $_POST['phone']);
$faceBook = mysqli_real_escape_string($conn, $_POST['facebook']);

//LOGIC TO VALIDATE PASSWORD BELOW

if ($password_1 != $password_2) {
	die("<h1 class='error'>Sorry the passwords do not match,<br> 
		<a href='signup.php'>please try again</a></h1>");
}

//NOTE: crypt() appears to work, but the function is not (yet) binary safe.
//More research is needed to be sure if this is secure enough to use permanently.
$password_encrypt = crypt($password_1, salt);




$sql = "INSERT INTO User_Account(
First_Name, Last_Name, User_Name, Password, Email, Phone_Number, FB_Account
)
 VALUES('$firstName', '$lastName', '$userName', '$password_encrypt', '$email', 
'$phoneNumber', '$faceBook')";

if(mysqli_query($conn, $sql)) {
	$_SESSION['username'] = $userName;
    $_SESSION['success'] = "You are now logged in";
	header('Location: /capstone_test/tracking_register.php');
} else {

	
	//code below gives out an error message.
	if (mysqli_error($conn)) {
		echo "<h1 style='text-align: center;'>Sorry, username and/or email is already taken.<br>
	 	<a href='signup.php'>please try again.</a></h1>";
	}

}

 ?>