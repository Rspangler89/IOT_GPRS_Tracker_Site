<?
//file to clean up session variables after loging out.
session_start();
session_unset();
session_destroy();

header("location:/capstone_test/login.php");
exit();
?>