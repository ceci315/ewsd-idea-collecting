<?php

error_reporting(0);

require_once 'db.php';

$s_idError =  $s_pwdError = $logErr ="";
$statement= true;

	$s_id = $_POST['s_id'];
    $s_pwd = $_POST['s_pwd'];
	
if($_SERVER["REQUEST_METHOD"] == "POST"){
	

//check the student id is empty or not
		if(empty($_POST["s_id"])){
			$s_idError = "*Please enter the your student id!";
        $statement = false;	
		}
			
//check the password is empty or not
		if(empty($_POST["s_pwd"])){
			$s_pwdError = "*Please enter the password!";
        $statement = false;	
		}
		
		if ($statement) {	
 
	// check whether the student id and password match with the student table
 $sql = mysqli_query($cont,"SELECT * FROM student WHERE s_id = '$s_id'");
	if (mysqli_num_rows($sql) ==1) {
		//if match found
	while($row = mysqli_fetch_array($sql)){
	//verify the password 
	if(password_verify($s_pwd, $row['s_pwd'])){	
               			
  //start the session     
session_start();
$_SESSION["s_id"]= $s_id;
$_SESSION["s_pwd"]= $s_pwd; 
header("location: control.php"); 
    die();					
	}else {
				$logErr = "Invalid password";
		}
	}		
} else {
		$logErr ="Invalid student id or password";
	}
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
 <li><a href ="login.php"> Login </a> </li>
</ul></div><br/>
<h2>Login</h2><br/>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"> 
<div class= "loginform">

       <label for="s_id"> Username(student id) : </label>  
       <input type="text" name="s_id" placeholder=" Enter your student id " value="<?php echo htmlspecialchars($s_id); ?>" >
	   <span class="Err"> <?php echo $s_idError;?></span>  <br/> <br/>
    
	<label for= "s_pwd"> Password : </label>
        <input type="password" name="s_pwd" placeholder=" Enter your password" value="<?php echo htmlspecialchars($s_pwd); ?>" > 
   <span class="Err"> <?php echo $s_pwdError; ?></span> <br/> <br/>
		
	<div class="btn">   
      <input type="submit" name="submit" value="Login"> <span class="Errmsg"> <?php echo $logErr; ?></span>  <br/> 
     	  
    </div>
 </div>
</form>
</body>
</html>