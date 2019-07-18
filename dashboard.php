<?php 
/*
Author: Swarup
*/
include("auth.php"); //include auth.php file on all secure pages 
require_once "DbConfig.php";
$message="";
if(isset($_GET['message'])){
	$message = $_GET['message']; 
}
?> 
<!DOCTYPE html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
</head>
<body onload="myFunction()">

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
		<div>
			<!-- Table -->
			<table id='empTable' class='display dataTable'>

				<thead>
					<tr>
						<th>Id</th>
						<th>Employee name</th>
						<th>Address</th>
						<th>Salary</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="myTable">
					
				</tbody>
			</table>
			<script>
				$(document).ready(function(){
					if ($('#myTable').children().length != 0) {
						$('#empTable').DataTable();
   				}
           
       } );
   </script>

</div>


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
<!-- Modal -->
<div id="update-employee" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Create Employee</h3>
			</div>
			<form id="update" role="form">
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="newName" id='uname' class="form-control">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" name="newAaddress" id='uaddress' class="form-control">
					</div>
					<div class="form-group">
						<label for="salary">Salary</label>
						<input type="number" name="newSalary" id='usalary' class="form-control">
					</div>
				</div>
				<input type="hidden" name="emp_id" id="emp">
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
<script src="js/submitform.js"></script>
<script src="js/reveledData.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
</body>
</html>
