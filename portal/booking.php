<?php
    $title = 'Booking| Rafael Hotels';
     require_once '../assets/includes/portal_header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="This is a Rafael Hotel Wwebsite">
    <meta name="keywords" content="Hotel, Best Hotels, 10star Hotel">
    <meta name="author" content="Raphael">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../assets/css/booking.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
</head>
<body>

    <!-- <div class="dashboard"> -->

         <div class="right-content">
             <div class="cover">
                 <h1>Booking</h1>
             </div>
             <?php
                $sql = "SELECT * FROM hotel_rooms";
                $query = mysqli_query($connection,$sql); 
                while($row = mysqli_fetch_assoc($query)){ 
            ?>
             <div>
                <form action="../assets/config/createRoom_control.php" method="post">
                    <div class="booking-wrapper">
                        <div class="each">
                            <img src="../assets/img/kings_room.jpg" alt="">
                            <h1><?php echo $row['room_name']; ?></h1>
                            <h2><?php echo "₦".number_format($row['room_price'],2,'.',','); ?></h2>
                            <h3>Available Rooms: <span><?php echo $row['available_rooms'] ?></span></h3>
                        </div>
        
                        <div class="form-div">
                            <h1>Check-in Time</h1>
                            <input type="datetime-local" name="checkIn" required>
        
                            <h1>Check-out Time</h1>
                            <input type="datetime-local" name="checkOut" required>

                            <h1>No of Rooms</h1>
                            <input type="number" name="noRoom" id="noRooms" placeholder="1">
                        
                            <h1>No of Guests</h1>
                            <input type="number" name="guests" id="guests" placeholder="1">
                        
                            <button type="submit" name="roomBook">Book</button>
                        </div>
                    </div>
                </form>
             </div>
             <?php } ?>
         </div>
     <!-- </div> -->
    
<?php
    require_once '../assets/includes/portal_footer.php';
?>