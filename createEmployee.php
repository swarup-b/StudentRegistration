<?php
/*
Author: Swarup
*/
	include("auth.php"); //include auth.php file on all secure pages 
	require_once "DbConfig.php";
    //Getting the form input data
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name    = trim($_POST["name"]);
		$address = trim($_POST["address"]);
		$salary = trim($_POST["salary"]);
		$admin_id=$_SESSION['admin_id'];
		if (($stmt = $conn->prepare("INSERT INTO employees (name, address, salary,admin_id) VALUES(?, ?, ?,?)"))) {

			if (($stmt->bind_param("ssss", $name, $address, $salary,$admin_id))) {
				$stmt->execute();
				$stmt->close();
				echo "success";
			}else{
				echo "bind_param error";
			}
		}else{
			echo "bind_param error";
		}
	}
	?>