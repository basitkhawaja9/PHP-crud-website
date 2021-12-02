<?php 
include("includes/connection.php");
if(count($_POST))
{
	$title=$_POST['title'];
	$duration=$_POST['duration'];
	
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
$id=$_GET['record_id'];
$sql="select * from courses where id='$id'"	;
$records=mysqli_query($connection,$sql);
$record=mysqli_fetch_array($records);
$title=$record['title'];
$duration=$record['duration'];
?>
<h1>Edit Course</h1>
<hr>

<form action="update.php" method="post" class="edit-form">
			
			Enter Title:
			<input type="text" name="title" value="<?php echo $title;?>"/>
			<br/>
			Enter Duration:
			<input type="number" name="duration" value="<?php echo $duration;?>"/>
			<br/>
			<input type="hidden" name="record_id" value="<?php echo $id;?>"/>
			<input type="submit" value="Update Course"/>
		</form>
<br/>
<?php 
$sql="select * from courses";
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

	$counter++;
	echo "<td>".$record['id']."</td>";
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