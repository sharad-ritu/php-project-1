<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- bootstrap files link -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>
    <?php 
        if(isset($_SESSION['errors'])){
            foreach($_SESSION['errors'] as $error){
                echo $error.'<br>';
            }
            unset($_SESSION['errors']);
        }
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <form action="registrationprocess.php" method="post">
        <p>
            <label>Name</label>
            <input type="text" name="name" class="form-control">
        </p>
        <p>
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </p>
        <p>
            <label>Password</label>
            <input type="password" name="password" class="form-control">
        </p>
        <p>
            <label>Confirm Password</label>
            <input type="password" name="cpassword" class="form-control">
        </p>
        <p>
            <input type="submit" class="btn btn-primary" value="Register">
        </p>
    </form>
    <a href="index.php">Already have account?? Login</a>
</body>
</html>