<?php 
$host="localhost";
$user="root";
$password="";
$db="college";

$connection=mysqli_connect($host,$user,$password);
if($connection)
{
	echo "Connection Successful";
	mysqli_select_db($connection,$db);
}
else{
	echo "Unable to connect";
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fetch Records</title>
</head>
<body>
<?php 
$sql="select * from courses";
$recordset=mysqli_query($connection,$sql);
$counter=0;
while($record=mysqli_fetch_array($recordset))
{
	$counter++;

	echo "Record#".$counter;
	echo "<br/>ID:".$record['id'];
	echo "<br/>Title:".$record['title'];
	echo "<br/>Duration:".$record['duration']."<br/><br/>";
}
?>
</body>
</html>