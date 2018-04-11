<?php

error_reporting(0);

require_once 'db.php';


?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head><title><?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> </title> 

<style>
* {
margin:0px;
padding:0px;}

body{
	background-color:#f1d5b9;
}
.Err{
	color: #FF0000;
}

#link{
	width: 100%;
	height:50px;
	line-height :45px;
	background-color:#5ee045;
}
#link ul{
	margin:auto;
	margin-left: 70%;
	
}
#link ul li{
	display:inline-block;
	list-style:none;
}

#link ul li a{
	text-decoration:none;
	color:red;
	padding: 20px;	
	font-size: 22px;
	font-weight:bold; 
}
#link ul li a:hover
{
	color:blue;	
}


</style>
</head>
<body>
<div id="link">  
  <ul>
  <li><a href ="index.php"> Home </a> </li>  
 <li><a href ="logout.php"> Logout </a> </li>
 <li><a href ="viewidea.php?page=1"> View Ideas </a> </li>
</ul></div><br/>
<h2>Welcome, Admin</h2><br/>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
<div class= "form">

      
 <a href="addstudent.php">Add new student</a> <br/>
		
 </div>
</form>
</body>
</html>