<?php
session_start();
session_unset();
session_destroy();

// Clear session variables
$_SESSION['session_username'] = "";
$_SESSION['session_password'] = "";


// Clear cookies
$cookie_name = "cookie_username";
$cookie_value = "";
$time = time() - (60 * 60);
setcookie($cookie_name, $cookie_value, $time, "/");

$cookie_name = "cookie_id"; 
$cookie_value = "";
$time = time() - (60 * 60);
setcookie($cookie_name, $cookie_value, $time, "/");

// Redirect to 1.php
header("location: ../1.php");
?>