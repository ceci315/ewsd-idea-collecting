<?php

require_once 'db.php';

global $_loggedIn, $userLog; 
$_loggedIn = true;

session_start();
//for student id only
if (!isset($_SESSION['s_id']) || (!isset($_SESSION['s_pwd']))) {
    $_loggedIn = false;
	//if correct
} else {
    $s_id = $_SESSION['s_id'];
    $s_pwd = $_SESSION['s_pwd'];

    $session_sql = mysqli_query($cont,"SELECT * FROM student WHERE s_id = '$s_id'");
    $row3 = mysqli_fetch_array($session_sql, MYSQLI_ASSOC); //search result
	
    if (!mysqli_num_rows($session_sql)) {			
        $_loggedIn = false; // if user not login, display none
		} else {
        $_loggedIn = true; // if user login, display the user name
        $userLog = $s_id;
    }
}
?>

