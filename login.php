<?php
    session_start();
    include 'includes/connection.php';

    if(isset($_POST['email'],$_POST['password']))
    {
        $email = mysqli_escape_string($connect,$_POST['email']);
        $password = mysqli_escape_string($connect,$_POST['password']);
        //var_dump(($_POST));

        $password = md5($password);

        $sql = "select * from users where email = '$email' and password = '$password' ";
        $sqlRun = mysqli_query($connect,$sql);
        $data = mysqli_fetch_assoc($sqlRun);

        //var_dump($data);

        if($data==NULL)
        {
            $_SESSION['msg'] = "Invalid email or password";
            header('location:index.php');
        }
        else
        {
            if($data['isApprove']==1)
            {
                //echo "login";
                $_SESSION['loginId'] = $data['id'];
                $_SESSION['loginEmail'] = $data['email'];
                header('location:dashboard.php');
            }
            else
            {
                $_SESSION['msg'] = "you are not activated yet";
                header('location:index.php');

            }
        }
    }
    else
    {
        header('location:index.php');
    }