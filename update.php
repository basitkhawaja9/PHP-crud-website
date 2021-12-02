<?php 
include('includes/connection.php');
$id=$_POST['record_id'];
$title=$_POST['title'];
$duration=$_POST['duration'];
$sql="update courses

	SET
		title='$title',
		duration='$duration'

 where id='$id'";
mysqli_query($connection,$sql);
header("location:index.php?record_id=$id&option=updated");
?>