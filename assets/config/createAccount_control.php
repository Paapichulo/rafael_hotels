<?php
    require_once '../includes/sessions.php';
    require_once 'db_connect.php';
    if(!isset($_POST['register'])){
        $_SESSION['errormessage'] = "Please Log in or create an Account";
        header('Location: ../../createAccount.php');
    }
    else{
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $userName = $_POST['uname'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $state = $_POST['user_state'];
        $city = $_POST['city'];
        $address = $_POST['user_address'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $role = 'user';
        $date = date('Y-m-d');

        // CHECKING PASSWORD LENGTH
        if(strlen($password) < 6){
            $_SESSION['errormessage'] = "Password must be greater than 6 characters ";
            header('Location: ../../createAccount.php'); 
        }else{
            // ENCRYPTING THE PASSWORD
            $password = password_hash($password, PASSWORD_DEFAULT);

            // INSERTING INTO OUR DATABASE
            $sql = "INSERT INTO users(first_name,last_name,username,email,country,user_state,city,user_address,phone,user_password,user_role,date_created) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";

            //INITIALIZING CONNECTION TO OUR DATABASE
            $stmt = mysqli_stmt_init($connection);

            // PREPARING STATEMENT(stmt)
            mysqli_stmt_prepare($stmt,$sql);

            // BIND PARAMETERS
            mysqli_stmt_bind_param($stmt,'ssssssssssss',$firstName,$lastName,$userName,$email,$country,$state,$city,$address,$phone,$password,$role,$date);

            // EXECUTING STATEMENT
            if(mysqli_stmt_execute($stmt)){
                $_SESSION['successmessage'] = "Registration Successful, Please login to continue";
                header('Location: ../../login.php');   
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../createAccount.php');
                 }
        }
    }