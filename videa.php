<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>	
	<title>View Ideas List</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

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
	  	</div><br/>
		<a href="viewic.php">	View Comments</a><br/><br/>
<h1>Ideas List </h1> <br/><br/>
	
	<?php 
		
	 require_once 'db.php';
	

	$ppage=$_GET["page"];
	
	//page is empty or 1
	if($ppage=="" || $ppage=="1"){
		$page1=0;
	}else{
		$page1=($ppage*5)-5; //the number page will be multiply by 5  and minus from 5 
	}
$sql = mysqli_query($cont,$sql = "SELECT * FROM idea ORDER BY category asc LIMIT $page1,5 ");
?>
<table border="2" >
	<tr>
<th>ID</th>
<th>CATEGORY</th>
<th>AUTHOR</th>
<th>TITLE</th>
<th>IDEA</th>
<th>POSTED ON</th>
</tr>
<?php


    while($row2 = mysqli_fetch_assoc($sql))	
		{  		
	?>
	<tr><td><?php echo($row2['i_id']); ?> </td>
	<td><?php echo($row2['category']); ?> </td>
	<td><?php echo($row2['author_name']); ?> </td>
	<td><?php echo($row2['title']); ?> </td>
	<td><?php echo($row2['idea']); ?> </td>
	<td><?php echo($row2['posted_time']); ?> </td>
	   
	 
	   
	   
	<td><a href="#" class="like" id="<?php echo($row2['i_id']); ?>">Like</a> 
	<div id="like<?php echo($row2['i_id']); ?>">
	
	<?php
	
	$sql3 = mysqli_query($cont,"SELECT count(i_id) as totalidea from liked where i_id='".$row2['i_id']."'");
	if (mysqli_num_rows($sql3) ==1) {
		//if match found
	while($row3 = mysqli_fetch_array($sql3)){  
	echo($row3['totalidea']);
		}}
	
	?>
	
	</div>						
			<a href="#" class="dislike" id="<?php echo($row2['i_id']); ?>">Dislike</a>
			<div id="dislike<?php echo($row2['i_id']); ?>">
			
			<?php
	
	$sql6 = mysqli_query($cont,"SELECT count(i_id) as totalidea from unliked where i_id='".$row2['i_id']."'");
	if (mysqli_num_rows($sql6) ==1) {
		//if match found
	while($row6 = mysqli_fetch_array($sql6)){  
	echo($row6['totalidea']);
		}}	
	?>
	
			</div>
				<a href="#" class="comment" id="<?php echo($row2['i_id']); ?>">Comment</a>
				<div id="comment<?php echo ($row2['i_id']); ?>">
				
				<?php
		
	  $sql2 = mysqli_query($cont,"SELECT count(c_id) as totalcomment from comment where c_title='".$row2['title']."'");
	if (mysqli_num_rows($sql2) ==1) {
		//if match found
	while($row = mysqli_fetch_array($sql2)){  
	echo($row['totalcomment']);
		 }}
	?>			
				</div>
				</td></tr>
		
<?php
$sql3 = mysqli_query($cont,"SELECT * FROM `idea`");
$count2= mysqli_num_rows($sql3);
//5 ideas per page
$per=$count2/5;
$per=ceil($per);

// d as page number
		}for($d=1;$d<=$per;$d++)
{ 
	?><a href="viewidea.php?page=<?php echo $d; ?>" style="text-decoration:none"> <?php echo $d."";?></a> <?php
}
		
	?>
		
<br/>	
</body>
</html>



