<?php
    require_once '../includes/sessions.php';
    require_once 'db_connect.php';
    if(!isset($_POST['login'])){
        $_SESSION['errormessage'] = "Please login or create an account";
        header('Location: ../../login.php');
    }else{
        $email = $_POST['email'];
        $password = $_POST['password'];

        // SELECTING USER DETAILS
        $sql = "SELECT * FROM users WHERE email = ?";

        // INITIALIZING DATABASE CONNECTION
        $stmt = mysqli_stmt_init($connection);

        // PREPARING SQL STATEMENT
        mysqli_stmt_prepare($stmt,$sql);

        // BINDING PARAMETERS TO THE PLACEHOLDERS
        mysqli_stmt_bind_param($stmt,"s",$email);

        // EXECUTING STATEMENT
        $execute = mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        // PRINTING THE GOTTEN RESULT
        if($row = mysqli_fetch_assoc($result)){
            $returnedPassword = $row['user_password'];
            // VERIFYING IF PASSWORD IS CORRECT
            if(password_verify($password,$returnedPassword)){
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = $row['user_role'];
                
                $_SESSION['successmessage'] = "Login Successfull ".$row['first_name'];
                header('Location: ../../portal/dashboard.php');
           }else{
                $_SESSION['errormessage'] = "Incorrect password" ;header('Location: ../../login.php');
           }
        }else{
            $_SESSION['errormessage'] = "This email does not exist"; header('Location: ../../login.php');
        }
    }