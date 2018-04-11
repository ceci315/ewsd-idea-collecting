<?php

// Turn off all error reporting
error_reporting(0);

session_start();
//destroy the session 
if (session_destroy()) {
	//return to the login page
    header("Location: login.php");
}

?> 