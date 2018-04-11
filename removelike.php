<?php
session_start();
$var1=$_SESSION["s_id"];
$var2=$_GET["pid"];

require_once 'db.php';

if (!$cont) {
       die("Connection failed: " . mysqli_connect_error());
       }
	/*   
	   $sql1 = "SELECT * from unliked where i_id='".$var2."'";		
        $runsql = $cont->query($sql1);
        if ($runsql->num_rows > 0) {
			
            echo("Already disliked ");
        }	
  else{
*/	  
	   //if all validate, then insert the data
    $sql = "INSERT INTO unliked VALUES ('$var1','$var2')"; 	
	       $result= mysqli_query($cont,$sql);

  

		   
		 $sql2 = mysqli_query($cont,"SELECT count(i_id) as totalidea from unliked where i_id='".$var2."'");
	if (mysqli_num_rows($sql2) ==1) {
		//if match found
	while($row = mysqli_fetch_array($sql2)){  
	echo($row['totalidea']);
	}}
		   
?>