<?php
	include("auth.php"); //include auth.php file on all secure pages 
	require_once "DbConfig.php";
	$admin_id=$_SESSION['admin_id'];


		$empAccordingToAdmin = "SELECT * FROM employees where admin_id='$admin_id'";
		$myArray = array();
		if($result = $conn->query($empAccordingToAdmin)){
			$data=array();
			if($result->num_rows > 0){
				while($rows=$result->fetch_assoc()) {
					$data[] = $rows;
				}

			}
		}
		$conn->close();

		echo json_encode($data);

		?>