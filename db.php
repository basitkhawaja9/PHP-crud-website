<?php 
$host="localhost";
$user="root";
$password="";
$db="college";
$connection=mysqli_connect($host,$user,$password);
if($connection)
{
	echo "Connection Successful.";
	mysqli_select_db($connection,$db);
}
else{
		echo "Connection not Successful.";
		exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DB Connection</title>
</head>
<body>
<?php 
$sql="select * from courses";
$recordSet=mysqli_query($connection,$sql);
$count=0;
while($record=mysqli_fetch_array($recordSet))
{
	$count++;
	echo "Record#:".$count;
	echo "<br/>ID:".$record['id'];
	echo "<br/>Title:".$record['title'];
	echo "<br/>Duration:".$record['duration'];
	
	echo "<br/><br/>";
}
?>
</body>
</html>