<?php 
    require_once '../includes/sessions.php';
    require_once 'db_connect.php';
    $id = $_SESSION['id'];
    if(isset($_POST['updateProfile'])){
        $firstName = $_POST['fname'];

        if(!empty($firstName)){
            $sql = "UPDATE users SET first_name = '$firstName' WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            if($query){
                $_SESSION['successmessage'] = "Update Successful";
                header('Location: ../../portal/dashboard');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/dashboard');
            }
        }else{
            header('Location: ../../portal/dashboard');
        }

        $lastName = $_POST['lname'];

        if(!empty($lastName)){
            $sql = "UPDATE users SET last_name = '$lastName' WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            if($query){
                $_SESSION['successmessage'] = "Update Successful";
                header('Location: ../../portal/dashboard');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/dashboard');
            }
        }else{
            header('Location: ../../portal/dashboard');
        }

        $userName = $_POST['uname'];

        if(!empty($userName)){
            $sql = "UPDATE users SET username = '$userName' WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            if($query){
                $_SESSION['successmessage'] = "Update Successfull";
                header('Location: ../../portal/dashboard');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/dashboard');
            }
        }else{
            header('Location: ../../portal/dashboard');
        }

        $country = $_POST['country'];

        if(!empty($country)){
            $sql = "UPDATE users SET country = '$country' WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            if($query){
                $_SESSION['successmessage'] = "Update Successfull";
                header('Location: ../../portal/dashboard');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/dashboard');
            }
        }else{
            header('Location: ../../portal/dashboard');
        }

        $city = $_POST['city'];

        if(!empty($city)){
            $sql = "UPDATE users SET city = '$city' WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            if($query){
                $_SESSION['successmessage'] = "Update Successfull";
                header('Location: ../../portal/dashboard');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/dashboard');
            }
        }else{
            header('Location: ../../portal/dashboard');
        }

        $state = $_POST['user_state'];

        if(!empty($state)){
            $sql = "UPDATE users SET user_state = '$state' WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            if($query){
                $_SESSION['successmessage'] = "Update Successfull";
                header('Location: ../../portal/dashboard');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/dashboard');
            }
        }else{
            header('Location: ../../portal/dashboard');
        }

        $address = $_POST['user_address'];

        if(!empty($address)){
            $sql = "UPDATE users SET user_address = '$address' WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            if($query){
                $_SESSION['successmessage'] = "Update Successfull";
                header('Location: ../../portal/dashboard');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/dashboard');
            }
        }else{
            header('Location: ../../portal/dashboard');
        }

        $email = $_POST['email'];

        if(!empty($email)){
            $sql = "UPDATE users SET email = '$email' WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            if($query){
                $_SESSION['successmessage'] = "Update Successfull";
                header('Location: ../../portal/dashboard');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/dashboard');
            }
        }else{
            header('Location: ../../portal/dashboard');
        }

        $phone = $_POST['phone'];

        if(!empty($phone)){
            $sql = "UPDATE users SET phone = '$phone' WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            if($query){
                $_SESSION['successmessage'] = "Update Successfull";
                header('Location: ../../portal/dashboard');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/dashboard');
            }
        }else{
            header('Location: ../../portal/dashboard');
        }
    }
    elseif (isset($_POST['updatePicture'])) {
        $image = $_FILES['img'];

        $fileName = $image['name'];
        $fileTempName = $image['tmp_name'];
        $fileError = $image['error'];
        $fileSize = $image['size'];

        $allowedFiles = array('jpg','png','jpeg');

        $fileName = explode('.',$fileName);
        $fileName = end($fileName);
        $fileName = strtolower($fileName);

        if (in_array($fileName,$allowedFiles)) {
           if ($fileError < 1) {
               if ($fileSize < 1000000) {
                //   Create a location to where file will be stored
                $location = '../img/profile_pic/';
                $fileNewName = 'profile'.$id.'.'.$fileName;
                if (file_exists($location.$fileNewName)) {
                    unlink($location.$fileNewName);
                    // Move file to correct file location
                    $move = move_uploaded_file($fileTempName,$location.$fileNewName);
                    if ($move) {
                        $sql = "UPDATE users SET profile_pic ='$fileNewName' WHERE id = '$id'";
                        $query = mysqli_query($connection,$sql);
                        if ($query) {
                            $_SESSION['successmessage'] = "Profile Picture Updated Successfully";
                            header('Location: ../../portal/dashboard');
                        }else{
                            $_SESSION['errormessage'] = "Something went wrong";
                            header('Location: ../../portal/dashboard');
                        }
                    }else{
                        $_SESSION['errormessage'] = "Something went wrong";
                        header('Location: ../../portal/dashboard');
                    }
                    
                }else{
                    $move = move_uploaded_file($fileTempName,$location.$fileNewName);
                    if ($move) {
                        $sql = "UPDATE users SET profile_pic ='$fileNewName' WHERE id = '$id'";
                        $query = mysqli_query($connection,$sql);
                        if ($query) {
                            $_SESSION['successmessage'] = "Profile Picture Updated Successfully";
                            header('Location: ../../portal/dashboard');
                        }else{
                            $_SESSION['errormessage'] = "Something went wrong";
                            header('Location: ../../portal/dashboard');
                        }
                    }else{
                        $_SESSION['errormessage'] = "Something went wrong";
                        header('Location: ../../portal/dashboard');
                    }
                }
               }else{
                $_SESSION['errormessage'] = "File too large, maximum 1mb";
                header('Location: ../../portal/dashboard');
            }  
           }else{
                $_SESSION['errormessage'] = "File Error, Please Upload a new File";
                header('Location: ../../portal/dashboard');
           }
        }else{
            $_SESSION['errormessage'] = "Please uploade either a jpg, png or jpeg file";
            header('Location: ../../portal/dashboard');
        }
    }

    else{
        header('Location:../../Home');
    }