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
      if( isset($_POST['newName']) )
     {
     	$newName = $_POST['newName'];
     	$newAddr = $_POST['newAaddress'];
     	$newSalary = $_POST['newSalary'];
     	$id  	 = $_POST['emp_id'];
     	$result     = "";
     	$stmt = $conn->prepare("UPDATE employees SET name='$newName',address='$newAddr',salary='$newSalary' WHERE id=?");
     	$stmt->bind_param( 's', $id);
     	if ($stmt->execute() === TRUE) {
     		$result= "success";
     	} else {
     		$result= "error";
     	}
          echo $result;
     	$stmt->close();
     }?>
     