<?php

// Turn off all error reporting
error_reporting(0);

require_once 'db.php';

// define variables and set to empty values
$s_idError = $s_departError = $s_ageError = $s_mailError =  $s_pwdError = $s_nameError = "";
$s_id= $s_depart = $s_age = $s_name = $s_mail = $s_pwd ="";

$statement=true;

$s_id = $_POST["s_id"];
$s_depart = $_POST["s_depart"];
$s_age= $_POST["s_age"];
$s_name = $_POST["s_name"];
$s_mail = $_POST["s_mail"];
$s_pwd = $_POST["s_pwd"];

	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	//check the student name is empty or not
		if(empty($_POST["s_name"])){
			$s_nameError = "*Please enter the your name!";
        $statement = false;	
		}
	  //validate student name format
		else if(!preg_match('/^[a-zA-Z]+$/', $_POST["s_name"])){
			$s_nameError = "*Invalid student name format!";	
			$statement = false;
		}			
	//check the department id is empty or not
		if(empty($_POST["s_depart"])){
			$s_departError = "*Please enter the department id!";
        $statement = false;	
		}
	  //validate department id format
		else if(!preg_match('/^[0-9]+$/', $_POST["s_depart"])){
			$s_departError = "*Invalid department id format!";	
			$statement = false;
		}			
    // check whether the s_id field is empty or not
	    if(empty($_POST["s_id"])){
			$s_idError = "*Please enter the student ID!";
        $statement = false;			
		}	
    //validate student id format
		else if(!preg_match('/^[0-9]+$/', $_POST["s_id"])){
			$s_idError = "*Invalid student id!";	
			 $statement = false;
		}	
		//check the student id length
		else if(strlen($_POST["s_id"]) < 9){
			$s_idError= "*The minimum length of student id is 9!";
			$statement = false;
		}  
    // check whether the age field is empty or not	
		if(empty($_POST["s_age"])){
			$s_ageError =  "*Please enter the age!";
         $statement = false;			
		}
		   //validate age format
		else if(!preg_match('/^[0-9]+$/', $_POST["s_age"])){
			$s_ageError = "*Number only!";	
			 $statement = false;
		}
		
    // check whether the email field is empty or not
    	if(empty($_POST["s_mail"])){
		$s_mailError= "*Please enter email address!";	
		 $statement = false;
    } 
	//validate email address format
		else if(!filter_var($_POST["s_mail"], FILTER_VALIDATE_EMAIL)){
			$s_mailError= "*The email address is invalid!";
			 $statement = false;
		}		
    // check whether the password field is empty or not	
		if(empty($_POST["s_pwd"])){
			$s_pwdError =  "*Please enter the password!";
         $statement = false;			
		}
		
		else if(!preg_match('/^[0-9A-Za-z]{10,60}$/', $_POST["s_pwd"])) {
			$s_pwdError =  "*Password doesn't meet the requirement!";
         $statement = false;
}

if ($statement) {
	
	 //checking existing student id
        $sql = "SELECT * FROM student WHERE s_id = '$s_id'";		
        $runsql = $cont->query($sql);
		// returns the number of rows in a query result- less than 0 data
        if ($runsql->num_rows > 0) {
            $s_idError = "*Student id already exists.";
            $statement = false;
        }		
		//checking existing student email
        $sql = "SELECT * FROM student WHERE s_mail = '$s_mail'";
        $runsql = $cont->query($sql);
        if ($runsql->num_rows > 0) {
           $s_mailError = "*Email already exists."; 
           $statement = false;
        }}
         if ($statement) {
					   
     // create a encrypted password	
    $hashedpwd = password_hash($s_pwd, PASSWORD_DEFAULT);
		     
       if (!$cont) {
       die("Connection failed: " . mysqli_connect_error());
       }
	   //if all validate, then insert the data
    $sql = "INSERT INTO student (s_id, s_name, s_age, depart_id, s_mail, s_pwd ) 
	 VALUES ( '$s_id', '$s_name', '$s_age', '$s_depart', '$s_mail', '$hashedpwd')"; 
	 
	        if (mysqli_query($cont, $sql)) {
			echo "Account has been created successfully.";           
 } 
else { 
echo "Account has not created. Try again later." .mysqli_close($cont);
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
 <li><a href ="videa.php?page=1"> View Ideas </a> </li>
</ul>
	  	</div><br/>
<h2>Registration Form</h2> <br/>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
<div class= "sr_form">

        <label for= "studentname"> Name : </label> 
        <input type="text" name="s_name" placeholder=" Enter student name" value="<?php echo htmlspecialchars($s_name); ?>" >
    <span class="Err"> <?php echo $s_nameError; ?></span> <br/>

	 <label for= "s_id"> Student ID : </label> 
        <input type="text" name="s_id" placeholder=" Enter the student id" value="<?php echo htmlspecialchars($s_id); ?>" >
    <span class="Err"> <?php echo $s_idError; ?></span> <br/>

	 <label for= "s_age"> Age : </label> 
        <input type="text" name="s_age" placeholder=" Enter the age" value="<?php echo htmlspecialchars($s_age); ?>" >
    <span class="Err"> <?php echo $s_ageError; ?></span> <br/>

	 <label for= "s_depart"> Department : </label> 
        <input type="text" name="s_depart" placeholder=" Enter the department id" value="<?php echo htmlspecialchars($s_depart); ?>" >
    <span class="Err"> <?php echo $s_departError; ?></span> <br/>
	
       <label for="s_mail"> Email : </label>  
       <input type="email" name="s_mail" placeholder=" Enter the email address " value="<?php echo htmlspecialchars($s_mail); ?>" >
	   <span class="Err"> <?php echo $s_mailError;?></span>  <br/> <br/>
    
	<label for= "s_pwd"> Password : </label>
        <input type="password" name="s_pwd" placeholder=" Enter the password" value="<?php echo htmlspecialchars($s_pwd); ?>" > 
   <span class="Err"> <?php echo $s_pwdError; ?></span>
			 
<br/>
 <div class="sbtn">
      <input type="submit" name="submit" value="Submit">  <span class="Err"> <?php echo $AddError; ?></span>
    </div>
 </div>
</form>
</body>
</html>