<?php 
/*
Author: Swarup
*/ ?>
<?php
// Include database config file
require_once "DbConfig.php";

//Getting the form input data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = trim($_POST["name"]);
    $email    = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["password"]);
    //check user already registered or not
    if ($conn) {
        $checkUserEmail = "SELECT name,email FROM admin WHERE email='$email'";
        $result = $conn->query($checkUserEmail);
        if ($result->num_rows == 0) {
                // prepare and bind
            if (!($stmt = $conn->prepare("INSERT INTO admin (name, email, password) VALUES(?, ?, ?)"))) {
                die("Error preparing: (" . $conn->errno . ") " . $conn->error);
            }
            
            if (!($stmt->bind_param("sss", $name, $email, $password))) {
                die("Error in bind_param: (" . $conn->errno . ") " . $conn->error);
            }
            $stmt->execute();
            $stmt->close();
            header("Location:index.php?message=successfully registered login to proceed"); 

        } else {
            header("Location:index.php?message=email  already exist please provide another email address");
        }

    } else {
        var_dump($this->conn->error);
    }
    $conn->close();
}
?>
</body>
</html>