<!DOCTYPE html>
<html>

<head>
    <title>UserRegistration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 left-row">
                <p>User Registration</p>
            </div>
            <div class="col-md-9 right-row">
                <div class="row register-form">
                    <?php if(!empty($_GET['message'])) {
                     $message = $_GET['message']; ?>
                        <span class="label label-danger"><?php echo $message;?></span>
                        <?php } ?>
                            <div class="col-md-6" id="registerDiv">
                                <form method="post" action="home.php" id="f1">

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Name " name="name" style="border-radius: 15px;" required />
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Enter Email " style="border-radius: 15px;" name="email" required/>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Enter Password " id="password" style="border-radius: 15px;" required/>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Confirm Password " name="cpasswd" style="border-radius: 15px;" id="cpassword" onkeyup="checkPassword()" required/>
                                        <span id="passSpan"></span>
                                    </div>
                                    <!-- 
                                     <input type="button" class="btnRegister" value="Login" data-toggle="modal" data-target="#login-modal" /> -->
                                    <input type="button" id="lDiv" value="Login">
                                    <input type="submit" class="btnRegister" value="Register" />
                                </form>
                                <div id="imgDiv"><img src="images/icon.png" class="img-circle" alt="Register Image"></div>

                            </div>
                            <div class="col-md-6" id="loginDiv" style="display: none;">
                                <form id="loginf">
                                    <span class="label label-danger" id="loginSpan"></span>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Enter Email " style="border-radius: 15px;" name="email" required/>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Enter Password " style="border-radius: 15px;" required/>
                                    </div>
                                    <a href="" id="signup">Signup here..</a>
                                    <input type="submit" class="btnRegister" value="Login" />
                                </form>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <div></div>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <link rel="stylesheet" href="css/style.css">
    <script src="js/validation.js"></script>
    <script src="js/submitform.js"></script>
    <script src="js/reveledData.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</body>

</html>