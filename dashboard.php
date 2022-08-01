<?php

    session_start();
    include 'includes/connection.php';
    //var_dump($_SESSION);
    if(!isset($_SESSION['loginId']))
    {
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome <?= $_SESSION['loginEmail']; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>