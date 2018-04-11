<?php

require_once 'db.php';


$sql1 = mysqli_query($cont, "SELECT * FROM category "); 

?>


<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>	
	<title>Category List</title>
</head>
<style>
table
{
	font-size:20px;	
	margin:auto;
	margin-left: 42.5%;
	
}
* {
margin:0px;
padding:0px;}

h1{
	text-align:center;
	font-size:35px;
	
}
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
<body>

<div id="link">  
  <ul>
 <li><a href ="index.php"> Home </a> </li>  
 <li><a href ="logout.php"> Logout </a> </li>
 <li><a href ="v.php?page=1"> View Ideas </a> </li>
</ul>
	  	</div><br/>
<a href="qa.php">Back</a><br/><br/>
<h1>Category List </h1> <br/><br/>
	
	<table border="1"   >
<tr>
<th>ID</th>
<th>CATEGORY</th>
<th>EDIT</th>
</tr>
	<?php 
	//display the results in the table form
	while($row1 = mysqli_fetch_assoc($sql1)) { 		
		echo "<tr>";
		echo "<td>".$row1['cat_id']."</td>";
		echo "<td>".$row1['cat_name']."</td>";		
		echo "<td><a href=\"delcat.php?cat_id=$row1[cat_id]\" onClick=\"return confirm('Are you sure you want to delete this category ?')\">Delete</a></td>";		
        echo "</tr>";	
	}
	
	
	?>
	</table><br/> <br/>
</body>
</html>