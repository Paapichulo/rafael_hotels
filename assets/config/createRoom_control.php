<?php
    require_once '../includes/sessions.php';
    require_once 'db_connect.php';
    $id = $_SESSION['id'];
    date_default_timezone_set('Africa/Lagos');
    if(isset($_POST['addRoom'])){
        // COLLECTING ROOM DATA
        $roomName = $_POST['rname'];
        $roomPrice = $_POST['rprice'];
        $roomStatus = $_POST['rstatus'];
        $availRoom = $_POST['avrooms'];
        $roomDetails = $_POST['rdetails'];
        $date = date('Y-m-d h:i:s');
        // $fileName = $_FILES["uploadImage"]["name"];
        // $tempName = $_FILES["uploadImage"]["tmp_name"];
        // $folder = "../img/rooms_image/".$fileName;

        $sql = "INSERT INTO hotel_rooms(room_name,room_price,room_status,available_rooms,room_details,date_created) VALUES (?,?,?,?,?,?)";
            // INITIALIZING CONNECTION
            $stmt = mysqli_stmt_init($connection);
            // PREPARING STATMENT
            mysqli_stmt_prepare($stmt,$sql);
            // BINIDING PARAMETERS
            mysqli_stmt_bind_param($stmt,'ssssss',$roomName,$roomPrice,$roomStatus,$availRoom,$roomDetails,$date);
            // EXECUTING STATEMENT
            if(mysqli_stmt_execute($stmt)){
                $_SESSION['successmessage'] = "Room Created Successfully";
                header('Location: ../../portal/rooms.php');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/addRoom.php');
            }

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
                    $location = '../img/rooms_image/';
                    $fileNewName = 'room'.$id.'.'.$fileName;
                    if (file_exists($location.$fileNewName)) {
                        unlink($location.$fileNewName);
                        // Move file to correct file location
                        $move = move_uploaded_file($fileTempName,$location.$fileNewName);
                        if ($move) {
                            $sql = "INSERT INTO hotel_rooms SET room_image ='$fileNewName'";
                            $query = mysqli_query($connection,$sql);
                            if ($query) {
                                $_SESSION['successmessage'] = "Room image uploaded successfully";
                                header('Location: ../../portal/rooms.php');
                            }else{
                                $_SESSION['errormessage'] = "Something went wrong";
                                header('Location: ../../portal/addRoom.php');
                            }
                        }else{
                            $_SESSION['errormessage'] = "Something went wrong";
                            header('Location: ../../portal/addRoom.php');
                        }
                        
                    }else{
                        $move = move_uploaded_file($fileTempName,$location.$fileNewName);
                        if ($move) {
                            $sql = "INSERT INTO hotel_rooms SET room_image ='$fileNewName'";
                            $query = mysqli_query($connection,$sql);
                            if ($query) {
                                $_SESSION['successmessage'] = "Room image uploaded successfully";
                                header('Location: ../../portal/rooms.php');
                            }else{
                                $_SESSION['errormessage'] = "Something went wrong";
                                header('Location: ../../portal/addRoom.php');
                            }
                        }else{
                            $_SESSION['errormessage'] = "Something went wrong";
                            header('Location: ../../portal/addRoom.php');
                        }
                    }
                   }else{
                    $_SESSION['errormessage'] = "File too large, maximum 1mb";
                    header('Location: ../../portal/addRoom.php');
                }  
               }else{
                    $_SESSION['errormessage'] = "File Error, Please Upload a new File";
                    header('Location: ../../portal/addRoom.php');
               }
            }else{
                $_SESSION['errormessage'] = "Please uploade either a jpg, png or jpeg file";
                header('Location: ../../portal/addRoom.php');
            }
        }

        
    elseif(isset($_POST['bookRoom'])){
        $roomName = $_POST['rname'];
        $roomID = $_POST['rid'];
        $noRooms = $_POST['noRooms'];
        $noGuests = $_POST['noGuests'];
        $dateCheckIn = $_POST['checkIn'];
        $dateCheckOut = $_POST['checkOut'];
        $date = date('Y-m-d h:i:s A');
        $status = 'Booking pending....'; 

        // CHECKING AVAILABLE ROOMS
        $sql = "SELECT * FROM hotel_rooms WHERE id = '$roomID'";
        $query = mysqli_query($connection,$sql);
        $row = mysqli_fetch_assoc($query);

        $returnedRooms = $row['available_rooms'];
        if($noRooms > $returnedRooms){
            $_SESSION['errormessage'] = "Sorry, $returnedRooms Rooms are Left";
            header('Location: ../../portal/rooms.php');
        }else{
            // WHEN ROOMS ARE AVAILABLE
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $query = mysqli_query($connection,$sql);
            $row = mysqli_fetch_assoc($query);

            $fullName = $row['first_name']." ".$row['last_name'];

            $sql = "INSERT INTO booked_rooms(userid,full_name,booked_room,no_of_rooms,no_of_guests,date_of_check_in,date_of_check_out,booking_status,date_created) VALUES(?,?,?,?,?,?,?,?,?)";
            // Initialise Connection 
            $stmt = mysqli_stmt_init($connection);
            // Prepare Statement
            mysqli_stmt_prepare($stmt,$sql);
            // Bind Parameters
            mysqli_stmt_bind_param($stmt,'sssssssss',$id,$fullName,$roomName,$noRooms,$noGuests,$dateCheckIn,$dateCheckOut,$status,$date);
        
            // Execute Statement
            if(mysqli_stmt_execute($stmt)){
                $newRooms = intval($returnedRooms)- intval($noRooms);
                $sql = "UPDATE hotel_rooms SET available_rooms = '$newRooms' WHERE id = '$roomID'";
                $query = mysqli_query($connection,$sql);
                if($query){
                    $_SESSION['successmessage'] = "Booking Successful, Please proceed to payment";
                    header('Location: ../../portal/payment.php');
                }else{
                    $_SESSION['errormessage'] = "Something went wrong";
                    header('Location: ../../portal/rooms.php');
                }
            }else{
                $_SESSION['errormesage'] = "Something went wrong";
                header('Location: ../../portal/rooms.php');
            }
        }
    }
    elseif(isset($_GET['processBooking'])){
        $rid = $_GET['processBooking'];
        $sql = "UPDATE booked_rooms SET booking_status = '<i>Processing...</i>' WHERE id = '$rid'";
        $query = mysqli_query($connection,$sql);
        if($query){
            $_SESSION['successmessage'] = 'Booking processing';
            header('Location: ../../portal/adminBookedRooms.php');
        }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/adminBookedRooms.php');
        }
    }

    elseif(isset($_GET['acceptBooking'])){
        $rid = $_GET['acceptBooking'];
        $sql = "UPDATE booked_rooms SET booking_status = '<i>Booking Sucessfull.</i>' WHERE id = '$rid'";
        $query = mysqli_query($connection,$sql);
        if($query){
            $_SESSION['successmessage'] = 'Booking has been accepted';
            header('Location: ../../portal/adminBookedRooms.php');
        }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/adminBookedRooms.php');
        }
    }

    elseif(isset($_GET['declineBooking'])){
        $rid = $_GET['declineBooking'];
        $sql = "UPDATE booked_rooms SET booking_status = '<i>Booking Declined</i>' WHERE id = '$rid'";
        $query = mysqli_query($connection,$sql);
        if($query){
            $_SESSION['successmessage'] = 'Booking has been declined';
            header('Location: ../../portal/adminBookedRooms.php');
        }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/adminBookedRooms.php');
        }
    }
    //     // update trip status
    //     $sql = "UPDATE booked_rooms SET booking_status = '$msg' WHERE id = '$rid'";
    //      $query = mysqli_query($connection,$sql);
    //      if ($query) {
    //         //  Get no of rooms Left
    //          $sql = "SELECT * FROM hotel_rooms WHERE room_name = '$roomName'";
    //          $query = mysqli_query($connection,$sql);
    //          $row = mysqli_fetch_assoc($query);
    //         //  Add no of seat left to seats booked
    //          $available = intval($nos) + intval($row['available_seats']);

    //         //  Update available no of seats
    //          $sql = "UPDATE transport_route SET available_seats = '$available' WHERE route_name = '$routeName'";
    //          $query = mysqli_query($connection,$sql);
    //          if ($query) {
    //              $_SESSION['successmessage'] = "Trip has ended successfully";
    //              header('Location: ../../portal/booked-routes');
    //          }else{
    //             $_SESSION['errormessage'] = "Something went wrong";
    //             header('Location: ../../portal/booked-routes');
    //         }
    //      }else{
    //          $_SESSION['errormessage'] = "Something went wrong";
    //          header('Location: ../../portal/booked-routes');
    //      }
    // }

    elseif(isset($_GET['delBooking'])){
        $rid = $_GET['delBooking'];
        $nor = $_GET['nor'];
        $roomName = $_GET['rn'];
        $sql = "DELETE FROM booked_rooms WHERE id = '$rid'";
        $$query = mysqli_query($connection,$sql);
        if($query){
            // GETTING NUMBER OF SEAT LEFT
            $sql = "SELECT * FROM hotel_rooms WHERE room_name = '$roomName'";
            $query = mysqli_query($connection,$sql);
            $row = mysqli_fetch_assoc($query);

            // ADDING NUMBER OF ROOMS TO BOOKED ROOMS
            $available = intval($nor) + intval($row['available_rooms']);

            // UPDATING AVAILABLE NUMBER OF SEATS
            $sql = "UPDATE hotel_rooms SET available_rooms = '$available' WHERE room_name = '$roomName'";
            $query = mysqli_query($connection,$sql);
            if($query){
                $_SESSION['successmessage'] = "Booking Deleted Successfully";
                header('Location: ../../portal/adminBookedRooms.php');
            }else{
                $_SESSION['errormessage'] = "Something went wrong";
                header('Location: ../../portal/adminBookedRooms.php');
            }
        }else{
            $_SESSION['errormessage'] = "Something went wrong";
            header('Location: ../../portal/adminBookedRooms.php');
        }
    }

    else{
        header('Location:../../Home.php');
    }
