<?php 
/*
Author: Swarup
*/
include("auth.php"); //include auth.php file on all secure pages 
require_once "DbConfig.php";
 $message = $_GET['message']; 
?> 
<!DOCTYPE html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

	<nav class="navbar">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">EmployeeRegistration</a>
			<a href="logout.php" class="btn btn-danger navbar-btn">Logout</a>
		</div>
	</nav>

	<div class="container bdy-ctr">
		<?php echo "<h2> Welcome   ".$_SESSION['name']."</h2>"?>
		<div class="page-header clearfix">
			<h2 class="pull-left">Employees Details</h2>
			<span class="label label-success"><?php echo $message; ?></span>
			<input type="button" class="btn btn-success pull-right alignIcons" data-toggle="modal" data-target="#create-employee" value="Add New Employee">
		</div>

		<?php 
		$admin_id=$_SESSION['admin_id'];
		$empAccordingToAdmin = "SELECT * FROM employees where admin_id='$admin_id'";
		if($result = $conn->query($empAccordingToAdmin)){

			if($result->num_rows > 0){
				echo "<table class='table table-bordered table-striped' id='empTbl'>";
				echo "<thead>";
				echo "<tr>";
				echo "<th>#</th>";
				echo "<th>Name</th>";
				echo "<th>Address</th>";
				echo "<th>Salary</th>";
				echo "<th>Action</th>";
				echo "</tr>";
				echo "</thead>";
				echo "<tbody id='myTable'>";
				while($row = $result->fetch_assoc()){
					echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['address'] . "</td>";
					echo "<td>" . $row['salary'] . "</td>";
					echo "<td>";
					echo "<a href='edit.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a> <span>|</span>";
					echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
					echo "</td>";
					echo "</tr>";
				}
				echo "</tbody>";                            
				echo "</table>";
                            // Free result set
				$result->free();
			} else{
				echo "<p class='lead'><em>No records were found.</em></p>";
			}
		} else{
			echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
		}
		$conn->close();
		?>
	</div>
	<!-- Modal -->
	<div id="create-employee" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3>Create Employee</h3>
				</div>
				<form id="create" role="form">
					<span class="label label-danger" id="empSpan"></span>
					<div class="modal-body">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" name="address" class="form-control">
						</div>
						<div class="form-group">
							<label for="salary">Salary</label>
							<input type="number" name="salary" class="form-control">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-success" id="create" value="Create">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div class="navbar-fixed-bottom">
		<p class="text-muted">Copyright  @2109</p>
	</div>
	
	<link rel="stylesheet" href="css/style.css">
	<script src="js/validation.js"></script>
	<script src="js/submitform.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
</body>
</html>
