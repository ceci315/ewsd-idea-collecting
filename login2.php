<?php

error_reporting(0);

require_once 'db.php';

$u_nameError =  $staff_pwdError = $logErr ="";
$statement= true;

	$u_name = $_POST['u_name'];
    $staff_pwd = $_POST['staff_pwd'];
	
if($_SERVER["REQUEST_METHOD"] == "POST"){
	

//check the username name is empty or not
		if(empty($_POST["u_name"])){
			$u_nameError = "*Please enter the your username!";
        $statement = false;	
		}
			
//check the password is empty or not
		if(empty($_POST["staff_pwd"])){
			$staff_pwdError = "*Please enter the password!";
        $statement = false;	
		}
		
		if ($statement) {	
 
	// check whether the student id and password match with the student table
 $sql = mysqli_query($cont,"SELECT * FROM staff WHERE u_name = '$u_name' AND staff_pwd='$staff_pwd'");
	if (mysqli_num_rows($sql) ==1) {
	while($data = mysqli_fetch_array($sql)){	            			
if($data['status'] == 1){
	if($data['level'] == 1){
	$_SESSION["admin1"]= $u_name; 
header("Location:admin.php");	
}elseif($data['level'] == 2){
	$_SESSION["qa"]= $u_name;
header("Location: qa.php");
}else{
	$_SESSION["ca"]= $u_name;
header("Location:videa.php?page=1");
}}else {
				$logErr = "Error";
		}
	}} else {
		$logErr ="Invalid username or password";
	}
}}
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

       <label for="s_id"> Username: </label>  
       <input type="text" name="u_name" placeholder=" Enter your username " value="<?php echo htmlspecialchars($u_name); ?>" >
	   <span class="Err"> <?php echo $u_nameError;?></span>  <br/> <br/>
    
	<label for= "s_pwd"> Password : </label>
        <input type="password" name="staff_pwd" placeholder=" Enter your password" value="<?php echo htmlspecialchars($staff_pwd); ?>" > 
   <span class="Err"> <?php echo $staff_pwdError; ?></span> <br/> <br/>
		
	<div class="btn">   
      <input type="submit" name="submit" value="Login"> <span class="Errmsg"> <?php echo $logErr; ?></span>  <br/> 
     	  
    </div>
 </div>
</form>
</body>
</html>