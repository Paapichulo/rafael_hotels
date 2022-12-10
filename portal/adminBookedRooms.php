<?php
    $title = 'Booked Rooms | Rafael Hotels';
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
    <link rel="stylesheet" href="../assets/css/adminBookedRooms.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
</head>
<body>


    <!-- <div class="dashboard"> -->
        <div class="right-content">
            <div class="cover">
                <h1>Recent Bookings</h1>
            </div>
    
            <div class="booked-rooms-wrapper container">
                <?php
                    $sql = "SELECT * FROM booked_rooms";
                    $query = mysqli_query($connection,$sql); 
                    while($row = mysqli_fetch_assoc($query)){ 
                ?>
                <div class="booked-rooms">
                    <div class="each">
                        <img src="../assets/img/kings_room.jpg" alt="">
                        <div class="title">
                            <h1>Full Name: </h1>
                            <span><?php echo $row['full_name']; ?></span>
                        </div>
                        <div class="title">
                            <h1>Room Name: </h1>
                            <span><?php echo $row['booked_room']; ?></span>
                        </div>
                        <div class="title">
                            <h1>Room Price:</h1>
                            <span>
                                <?php
                                    $rname = $row['booked_room'];
                                    $sql2 = "SELECT * FROM hotel_rooms WHERE room_name = '$rname'"; 
                                    $query2 = mysqli_query($connection,$sql2);
                                    $row2 = mysqli_fetch_assoc($query2);
                                    echo "₦".number_format($row2['room_price'],2,'.',','); 
                                ?>
                            </span>
                        </div>
                        
                        <div class="title">
                            <h1>Check In:</h1>
                            <span>
                                <?php 
                                    $date = date_create($row['date_of_check_in']); 
                                    echo date_format($date,'j, M. Y');
                                ?>
                            </span>
                        </div>
                        
                        <div class="title">
                            <h1>Check Out:</h1>
                            <span>
                                <?php 
                                    $date = date_create($row['date_of_check_out']); 
                                    echo date_format($date,'j, M. Y');
                                ?>
                            </span>
                        </div>
                        <div class="title">
                            <h1>No of Rooms:</h1>
                            <span><?php echo $row['no_of_rooms']; ?></span>
                        </div>
                        
                        <div class="title">
                            <h1>No of Guests:</h1>
                            <span><?php echo $row['no_of_guests']; ?></span>
                        </div>

                        <div class="title">
                            <h1>Status:</h1>
                            <span id="span"><?php echo $row['booking_status']; ?></span>
                        </div>

                        <div class="title">
                            <div class="dropdown-div">
                                <button class="dropdown-btn">
                                    <i class="fas fa-cogs"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../assets/config/createRoom_control?processBooking=<?php echo $row['id']; ?>">Process Booking</a></li>
                                    <li><a class="dropdown-item" href="../assets/config/createRoom_control?acceptBooking=<?php echo $row['id']; ?>">Accept Booking</a></li>
                                    <li><a class="dropdown-item" href="../assets/config/createRoom_control?declineBooking=<?php echo $row['id']; ?>">Decline Booking</a></li>
                                    <li><a class="dropdown-item" href="../assets/config/createRoom_control?delBooking=<?php echo $row['id']; ?>&nor=<?php echo $row['no_of_rooms'] ?>&rn=<?php echo $row['booked_room'] ?>">Delete Booking</a></li>
                                </ul>
                           </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <!-- </div> -->

<?php
    require_once '../assets/includes/portal_footer.php';
?>