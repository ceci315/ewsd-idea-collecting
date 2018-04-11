<?php
session_start();
$var1=$_SESSION["s_id"];


require_once 'db.php';

$cmtError = $addErr = $cmt= $title= $titleError=$sid="";
$statement= true;
	
if($_SERVER["REQUEST_METHOD"] == "POST"){

//check the cmt is empty or not
		if(empty($_POST["cmt"])){
			$cmtError = "*Please enter the comment!";
        $statement = false;	
		}

		
if ($statement) {	
$cmt = $_POST['cmt'];
$title = $_POST['title'];
	
if (!$cont) {
       die("Connection failed: " . mysqli_connect_error());
       }
	   //if all validate, then insert the data
	
		
	 $sql = "INSERT INTO comment (c_title, comments, user_id) VALUES ('$title','$cmt','$var1')";
	       $result= mysqli_query($cont,$sql);
	 
}	
} 
		
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
<a href="viewidea.php?page=1">Back</a><br/><br/>
<a href="viewic.php">View Comments</a><br/><br/>
<h2>Add Comment</h2><br/>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
<div class= "cmtform">

<label for= "title"> Title : </label> 
<select name="title">       
	<?php
	$sql2 = mysqli_query($cont,"SELECT title FROM idea ORDER BY title asc ");
    while($row1 = mysqli_fetch_array($sql2)) 
	{
		?>
		<option><?php echo $row1["title"];  ?></option>
		<?php
	}
	?>
	</select> <span class="Err"> <?php echo $titleError; ?></span> <br/>	
	

       <label for="cmt"> Add comment  </label>  <br/><br/>
             <textarea name="cmt" cols="60" rows="6" placeholder="Enter the comment"></textarea>
    <span class="Err"> <?php echo $cmtError; ?></span> <br/>
    		
	<div class="btn">   
      <input type="submit" name="submit" value="Submit"> <span class="Errmsg"> </span>  
	
     	  
    </div>
 </div>
</form>
</body>
</html>