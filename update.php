<?php
	
     include("auth.php"); //include auth.php file on all secure pages 
     require_once "DbConfig.php";
    $name="";
	$address="";
	$salary=0; 
	if( isset($_GET['id']) )
	{
		$id = $_GET['id'];
		$empAccordingToId = "SELECT * FROM employees where id='$id'";
		if($result = $conn->query($empAccordingToId)){
			$rowDetails=array();
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$rowDetails[]=$row;
				}
				echo json_encode($rowDetails);
			}
			
			
	}
	
}
?>