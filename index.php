<?php 
include("includes/connection.php");
$option="";
if(count($_POST) && !isset($_POST['searchBtn'])
){
	$title=$_POST['title'];
	$duration=$_POST['duration'];
	
	$sql="select * from courses where title='$title' and duration='$duration'"	;
	$records=mysqli_query($connection,$sql);
	if(mysqli_num_rows($records)>0)
	{
		header("location:index.php?record_exist=1");
	}
	else{
	$sql="insert into courses(title,duration) values('$title','$duration')";
	mysqli_query($connection,$sql);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Fetch Records</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body class="container">
<?php 
$title="";
$duration="";
$option="";
?>
<h1 class="header">PHP Crud website</h1>
<hr>
<div class="forms">


	<form method="post" class="add-item">
			<h1>Add Courses</h1>
			<hr>
			Enter Title:
			<input type="text" name="title"/>
			<br/>
			Enter Duration:
			<input type="number" name="duration"/>
			<br/>
			<input type="submit" value="Add Course"/>
	</form>
	<form action="index.php" method='post' class="search_form">
	<h1>Course Search</h1>
	<hr>
	Enter Search Word:
	<input type="text" name="word" value=""/>
	<input type="submit" name="searchBtn" value="Search"/>
</form>
	</div>
	
<br/>
<?php 
if(isset($_GET['record_exist']))
{
	echo "<font color='red'>Record already exists.</font>";

}
if(isset($_GET['record_id']))
{

	if($_GET['option']=='updated')
	{
		echo "<font color='green'>Record#".$_GET['record_id']." Updated.</font>";
	}
	else{
	echo "<font color='green'>Record#".$_GET['record_id']." Deleted.</font>";
	}
}

?>

<br/>
<?php
$sql="";
$count=0; 
if(isset($_POST['searchBtn']))
{
	$word=$_POST['word'];
	$sql="select * from courses where title like '%$word%' or duration like '%$word%'";

}
else{
$sql="select * from courses";
}

$recordset=mysqli_query($connection,$sql);
$counter=0;
echo "<table border='1'>";
echo '<tr>';
echo '<td>ID</td>';
echo '<td>Title</td>';
echo '<td>Duration</td>';
echo '<td>Edit</td>';
echo '<td>Delete</td>';

echo '</tr>';



while($record=mysqli_fetch_array($recordset))
{
	echo '<tr>';
	$count++;
	$counter++;
	echo "<td>".$count."</td>";
	echo "<td>".$record['title']."</td>";
	echo "<td>".$record['duration']."</td>";
	echo "<td><a href='edit.php?record_id=".$record['id']."&option=edit'>Edit</a></td>";
	echo "<td><a href='delete.php?record_id=".$record['id']."'>Delete</a></td>";

	echo '</tr>';

}
echo '</table>';

?>
</body>
</html>