<?php 
    session_start();
    include 'includes/connection.php';

    if(isset($_POST['name'],$_POST['email'],$_POST['password'],$_POST['cpassword'])){

        $name =  mysqli_escape_string($connect,$_POST['name']);
        $email =  mysqli_escape_string($connect,$_POST['email']);
        $password =  mysqli_escape_string($connect,$_POST['password']);
        $cpassword =  mysqli_escape_string($connect,$_POST['cpassword']);
        
        $errors = [];

        if(empty($name)){
            $errors[] = "Name is required";
        }

        if(empty($email)){
            $errors[] = "Email is required";
        }

        if(empty($password)){
            $errors[] = "Password is required";
        }
        else if($password != $cpassword){
            $errors[] = "Password confirmation failed";
        }

       if(count($errors)> 0){
           $_SESSION['errors'] = $errors;
       }
       else{
           $password = md5($password);
           $sql = "insert into users (name,email,password) values ('$name','$email','$password')";
           mysqli_query($connect,$sql);
           $_SESSION['msg'] = "Registration successfull / wait for activation";
       }

    }
    header('location:register.php');