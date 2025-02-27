<?php
include('dbcon.php');
$get_id = $_GET['id'];

mysqli_query($con, "DELETE FROM users WHERE id = '$get_id'") or die(mysqli_error($con));
header('location:user_management.php'); 
?>
