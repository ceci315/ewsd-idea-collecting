<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>	
	<title>View Ideas List</title>
</head>
<style>
table
{
	font-size:20px;	
	margin:auto;
		
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
   <li><a href ="videa.php?page=1"> View Ideas </a> </li>
</ul>
	  	</div><br/><br/>
<h1>Ideas List </h1> <br/><br/>
	

	<table border="3" >
	<tr>
<th>ID</th>
<th>CATEGORY</th>
<th>AUTHOR</th>
<th>TITLE</th>
<th>IDEA</th>
<th>POSTED ON</th>
</tr>

	<?php 
	 require_once 'db.php';

	$ppage=$_GET["page"];
	
	//page is empty or 1
	if($ppage=="" || $ppage=="1"){
		$page1=0;
	}else{
		$page1=($ppage*10)-10; 
	}

$sql3 = mysqli_query($cont,$sql3 = "SELECT * FROM idea ORDER BY posted_time desc LIMIT $page1,10 ");
if (mysqli_num_rows($sql3) >0) {
    while($row2 = mysqli_fetch_assoc($sql3))	
		{  		
		echo "<tr>";
		echo "<td>".$row2['id']."</td>";
		echo "<td>".$row2['category']."</td>";	
		echo "<td>".$row2['author_name']."</td>";
		echo "<td>".$row2['title']."</td>";	
		echo "<td>".$row2['idea']."</td>";	
		echo "<td>".$row2['posted_time']."</td>";			
        echo "</tr>";	
}}
$sql4 = mysqli_query($cont,"SELECT * FROM `idea`");
$count1= mysqli_num_rows($sql4);
//page records divide into 10 per page
$per=$count1/10;
$per=ceil($per);
for($k=1;$k<=$per;$k++)
{ 
	?><a href="latestidea.php?page=<?php echo $k; ?>" style="text-decoration:none"> <?php echo $k."";?></a> <?php
}

	?>
<br/>	
</body>
</html>



