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

			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					$name=$row['name'];
					$address=$row['address'];
					$salary=$row['salary'];
				}
			}
	}
	echo "success";
}?>

 <?php if( isset($_POST['newName']) )
	{
		$newName = $_POST['newName'];
		$newAddr = $_POST['newAddr'];
		$newSalary = $_POST['newSalary'];
		$id  	 = $_POST['id'];
		$sql     = "";
		$stmt = $conn->prepare("UPDATE employees SET name='$newName',address='$newAddr',salary='$newSalary' WHERE id='$id'");
		$stmt->bind_param( s, $id);
		if ($stmt->execute() === TRUE) {
   	    	header("Location:dashboard.php?message=successfully updated"); 
		} else {
    		header("Location:dashboard.php?message=Error occurred"); 
		}
		$stmt->close();
	}?>
<!-- <!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<nav class="navbar">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">EmployeeRegistration</a>
		</div>
			<ul class="nav navbar-nav navbar-right">
		      <li><a href="dashboard.php" class="btn btn-success"> Home</a></li>
		      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
		    </ul>
	</nav>
	<div class="container  bdy-ctr">
		<div>
			<h1>Edit Employee Details</h1>
		</div>
		<form action="edit.php" method="POST">
						<div class="form-group sm-6">
							<label for="name">Name</label>
							<input type="text"  class="form-control" name="newName" value="<?php echo $name;?>">
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" name="newAddr" value="<?php echo $address;?>">
						</div>
						<div class="form-group">
							<label for="salary">Salary</label>
							<input type="number" class="form-control"  name="newSalary" value="<?php echo $salary;?>">
						</div>
						<input type="hidden" name="id" value="<?php echo $id; ?>">
			
			<input type="submit" value=" Update" class="btn btn-success" />
		
		</form>
	</div>
	<div class="navbar-fixed-bottom">
		<p class="text-muted">Copyright  @2109</p>
	</div>
	
	<link rel="stylesheet" href="css/style.css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html> -->

 $(document).on('click','.edit_data' ,function(){
        var emp_id=$(this).attr('id');
        $.ajax({
            url:'update.php?id='+emp_id,
            method:'GET',
            data:"",
            success:function(response){
                var json=JSON.parse(response);
                $('#hidId').val(json[0].id);
                $('#name').val(json[0].name);
                $('#salary').val(json[0].salary);
                $('#address').val(json[0].address);
                $('#create').hide();
                $('#update').show();
                $('#update-employee').modal('show');
                console.log(response);
            }
        })
    })
   