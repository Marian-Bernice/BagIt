<?php
//for header redirection
ob_start();

//start session
session_start();


// unset login session variables
session_unset();

// destroy login the session 
session_destroy();

//redirect to login
header('Location: login.php');

?>