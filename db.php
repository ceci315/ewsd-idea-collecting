<?php

define ("MYSQL_HOST", 'localhost');
define ("MYSQL_USERNAME", 'root');
define ("MYSQL_PASSWORD", '');
define ("MYSQL_DB", 'ideascorner');

//establish connection 
$cont=mysqli_connect(MYSQL_HOST,MYSQL_USERNAME,MYSQL_PASSWORD,MYSQL_DB);

if (!$cont){
die("Connection failed: ".mysqli_connect_error());
}

?>            