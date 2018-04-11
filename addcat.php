<?php

error_reporting(0);

require_once 'db.php';


$cat_nameError = $addErr ="";
$statement= true;

	$cat_name = $_POST['cat_name'];
	
if($_SERVER["REQUEST_METHOD"] == "POST"){

//check the category name is empty or not
		if(empty($_POST["cat_name"])){
			$cat_nameError = "*Please enter the category name!";
        $statement = false;	
		}
	  //validate category name format
		else if(!preg_match('/^[a-zA-Z\s]+$/', $_POST["cat_name"])){
			$cat_nameError = "*Invalid category name format!";	
			$statement = false;
		}
		
		if ($statement) {
	
	 //checking existing student id
        $sql1 = "SELECT * FROM category WHERE cat_name = '$cat_name'";		
        $runsql1 = $cont->query($sql1);
        if ($runsql1->num_rows > 0) {
            $cat_nameError = "*Category name already exists.";
            $statement = false;
        }}		
		 if ($statement) {
		     
       if (!$cont) {
       die("Connection failed: " . mysqli_connect_error());
       }
	   //if all validate, then insert the data
    $sql = "INSERT INTO category (cat_name) 
	 VALUES ('$cat_name')"; 
	 
	        if (mysqli_query($cont, $sql)) {
			echo "Category has been added successfully.";           
 } 
else { 
echo "Category has not added. Try again later." .mysqli_close($cont);
 }
}} mysqli_error($cont); 
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
 <li><a href ="videa.php?page=1"> View Ideas </a> </li>
</ul></div><br/>
<a href="qa.php">Back</a><br/><br/>
<h2>Add Category</h2><br/>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
<div class= "catform">

       <label for="cat_name"> Add new category  </label>  <br/><br/>
       <input type="text" name="cat_name" placeholder=" Enter new category " value="<?php echo htmlspecialchars($cat_name); ?>" >
	   <span class="Err"> <?php echo $cat_nameError;?></span>  <br/> <br/>
    

		
	<div class="btn">   
      <input type="submit" name="submit" value="Submit"> <span class="Errmsg"> </span>  <br/> 
     	  
    </div>
 </div>
</form>
</body>
</html>