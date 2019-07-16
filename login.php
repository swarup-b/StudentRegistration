<?php 
/*
Author: Swarup
*/ ?>
<?php
// Include database config file
require_once "DbConfig.php";

// Start the session
session_start();

//Getting the form input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["password"]);
    if ($conn) {
        $checkUserEmail = "SELECT admin_id,name,email FROM admin WHERE email='$email' and password='$password'";
        $result = $conn->query($checkUserEmail);
        if($result->num_rows==1){
         $_SESSION['email'] = $email;
         while($row = $result->fetch_assoc()){
            $admin_id=$row['admin_id'];
            $name=$row['name'];
        }
        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['name'] = $name;
			header("Location: dashboard.php"); // Redirect user to dashboard.php
            exit();
        }else{
            echo "password is incorrect";
        }
    }
}