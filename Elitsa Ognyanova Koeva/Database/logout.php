<?php
session_start();

// Unset all session variables
$_SESSION = array();

//destroys the session
session_destroy();

//redirects to login page
header("Location: login.php");
exit();
?> 