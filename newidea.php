<?php

// Turn off all error reporting
error_reporting(0);

require_once 'db.php';
require_once 'session.php';
if (!$_loggedIn) {
  header("Location: login.php"); 
   die();
}

// define variables and set to empty values
$cat_nameError = $i_titleError = $i_ideaError = $a_nameError = $IdeaError = "";
$cat_name = $a_name = $i_title = $i_idea = "";
$statement=true;

$cat_name = $_POST["cat_name"];
$i_title= $_POST["i_title"];
$i_idea = $_POST["i_idea"];
$a_name = $_POST["a_name"];
$doc = $_FILES["doc"];

	
$doc=($_FILES['doc']['name']);
 $target = "doc/";
 $target = $target . basename( $_FILES['doc']['name']);
			
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		//check the category name is empty or not
		if(empty($_POST["cat_name"])){
			$cat_nameError = "*Please enter the category name!";
        $statement = false;	
		}
		
			//check the title name is empty or not
		if(empty($_POST["i_title"])){
			$i_titleError = "*Please enter the title!";
        $statement = false;	
		}
		
    // check whether the idea field is empty or not	
		if(empty($_POST["i_idea"])){
			$i_ideaError =  "*Please enter the idea!";
         $statement = false;			
		}		
		
		
 /* if all inputs are valid, then */
    if ($statement) {
		
        $i_postdate = date("Y-m-d H:i:s");
//		date('Y-m-d');

$sql = mysqli_query($cont,"SELECT * FROM student WHERE s_id = '$userLog'");
	if (mysqli_num_rows($sql) ==1)
        while($row = mysqli_fetch_array($sql)) {
                $author_id = $row["s_id"];
            }

 if (!$cont) {
       die("Connection failed: " . mysqli_connect_error());
       }
	       		
        /* insert idea into new idea table */
        $sql = "INSERT INTO idea (category, author_name, title, idea, doc, posted_time, author_id) VALUES ('$cat_name', '$a_name', '$i_title', '$i_idea', '$doc', '$i_postdate', '$author_id'); ";
        if (mysqli_query($cont, $sql)) {
			if(move_uploaded_file($_FILES['doc']['tmp_name'], $target)); 
 
echo "Idea has been submitted.";
		} 
else 

 { 
$IdeaError = "Idea could not submit. Try again later." .mysqli_close($cont);
 } 
}}	 mysqli_error($cont); 		
        		
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

.Err{
	color: #FF0000;
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
</head>
<body>
<div id="link">  
  <ul>
 <li><a href ="index.php"> Home </a> </li> 
 <li><a href ="logout.php"> Logout </a> </li>
 <li><a href ="viewidea.php?page=1"> View Ideas </a> </li>
</ul>
	  	</div><br/>
<h2>Submit your ideas</h2> <br/>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data"> 
<div class= "idea_form"> 
<label for= "cat"> Category : </label> 
<select name="cat_name">       
	<?php
	$sql2 = mysqli_query($cont,"SELECT cat_name FROM category ORDER BY cat_name asc ");
    while($row1 = mysqli_fetch_array($sql2)) 
	{
		?>
		<option><?php echo $row1["cat_name"];  ?></option>
		<?php
	}
	?>
	</select> <span class="Err"> <?php echo $cat_nameError; ?></span> <br/>	
	

        <label for= "cat"> Your name : </label> 
        <input type="text" name="a_name" placeholder=" Enter your category" >
    <span class="Err"> <?php echo $a_nameError; ?></span> <br/>
	
	 <label for= "title"> Title : </label> 
        <input type="text" name="i_title" placeholder=" Enter your title" >
    <span class="Err"> <?php echo $i_titleError; ?></span> <br/>

	 <label for= "idea"> Idea : </label> <br/>
       <textarea name="i_idea" cols="60" rows="6" placeholder="Enter the idea"></textarea>
    <span class="Err"> <?php echo $i_ideaError; ?></span> <br/>

	<label for="doc"> Upload Document : </label>
    <input type="file" name="doc">	<br/> 
<br/>
 <div class="sbtn">
      <input type="submit" name="submit" value="Submit">  <span class="Err"> <?php echo $IdeaError; ?></span>
    </div>
 </div>
</form>
</body>
</html>