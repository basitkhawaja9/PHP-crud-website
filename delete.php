<?php 
include('includes/connection.php');
$id=$_GET['record_id'];
$sql="delete from courses where id='$id'";
mysqli_query($connection,$sql);
header("location:index.php?record_id=$id&option=delete");
?>