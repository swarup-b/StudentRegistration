<?php 
/*
Author: Swarup
*/
include("auth.php"); //include auth.php file on all secure pages 
require_once "DbConfig.php";
	$id=$_GET['id'];
	$stmt = $conn->prepare('DELETE FROM employees WHERE id = ?');
	$stmt->bind_param( 's', $id);
	if($stmt->execute() === TRUE) echo "success";
	else echo "error";
	$stmt->close();

?>


