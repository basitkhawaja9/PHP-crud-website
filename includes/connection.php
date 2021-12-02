<?php 
$host="localhost";
$user="root";
$password="";
$db="college";

$connection=mysqli_connect($host,$user,$password);
if($connection)
{
	//echo "Connection Successful";
	mysqli_select_db($connection,$db);
}
else{
	echo "Unable to connect";
}
?>