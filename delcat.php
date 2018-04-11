<?php

require_once 'db.php';


$cat_id = $_GET['cat_id'];

	$sql = mysqli_query($cont,"DELETE FROM `category` WHERE cat_id = '$cat_id'");

 
header("Location:viewcat.php");
?>


