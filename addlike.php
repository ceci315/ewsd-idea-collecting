<?php
session_start();
$var1=$_SESSION["s_id"];
$var2=$_GET["pid"];

require_once 'db.php';

if (!$cont) {
       die("Connection failed: " . mysqli_connect_error());
       }
	   //if all validate, then insert the data
 
/* $sql1 = "SELECT * from liked, student where i_id='".$var2."'";		
        $runsql = $cont->query($sql1);
		// returns the number of rows in a query result- less than 0 data
        if ($runsql->num_rows > 0) {
            echo("Already liked ");
        }	
  else{
*/	 $sql = "INSERT INTO liked VALUES ('$var1','$var2')"; 	
	       $result= mysqli_query($cont,$sql);
	 
	//}	   
		 $sql2 = mysqli_query($cont,"SELECT count(i_id) as totalidea from liked where i_id='".$var2."'");
	if (mysqli_num_rows($sql2) ==1) {
		//if match found
	while($row = mysqli_fetch_array($sql2)){  
	echo($row['totalidea']);
	}}
		   
?>