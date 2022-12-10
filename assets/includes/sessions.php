<?php
    session_start();

    function errorMessage(){
        if(isset($_SESSION['errormessage'])){
            $message = "<div style = \"color: white; background-color: #b60303; padding: 10px 20px; font-weight: bold; text-align: center\">";
            $message .= htmlentities($_SESSION['errormessage']);
            $message .= "</div>";
        

            $_SESSION['errormessage'] = null;
            return $message;
        }
    }

    function successMessage(){
        if(isset($_SESSION['successmessage'])){
            $message = "<div style = \"color: white; background-color: #006426; padding: 10px 20px; font-weight: bold; text-align: center;\">";
            $message .= htmlentities($_SESSION['successmessage']);
            $message .= "</div>";

            $_SESSION['successmessage'] = null;
            return $message;
        }
    }

    
    // USERS LOGIN AUTHENTIFICATION
    function auth(){
        if(!isset($_SESSION['id'])){
            header('Location: ../login.php');
        }
    }

    // ADMIN LOGIN AUTHENTIFICATION
    function adminAuth(){
        if ($_SESSION['role'] !== 'admin') {
            header('Location: dashboard');
        }
    }


?>