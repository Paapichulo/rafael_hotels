<?php
    $title = 'Rooms | Rafael Hotels';
    require_once '../assets/config/db_connect.php';
     require_once '../assets/includes/portal_header.php';
     require_once '../assets/includes/sessions.php';
     auth();
     $id =  $_SESSION['id'];

     $image1 = '../assets/img/kings_room.jpg';
     $image2 = '../assets/img/deluxe_room.jpg';
     $image3 = '../assets/img/presidential_suite.jpg';
     $image4 = '../assets/img/executive_lounge.jpg';
     $image5 = '../assets/img/executive_twin.jpg';
     $image6 = '../assets/img/ambassadorial_suite.jpg';
     $image7 = '../assets/img/senior_suite.jpg';
?>

<?php
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($query);
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
    <link rel="stylesheet" href="../assets/css/rooms.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
</head>
<body>
    <!-- <div class="dashboard"> -->
        <div class="right-content">
            <div class="cover">
                <h1>Rooms</h1>
            </div>
    
            <div class="rooms-board">
                <?php
                    echo successMessage();
                    echo errorMessage();
                ?>
                 
                <div class="rooms"> 
                    <?php
                        $sql = "SELECT * FROM hotel_rooms";
                        $query = mysqli_query($connection,$sql); 
                        while($row = mysqli_fetch_assoc($query)){   
                    ?>
                    <div class="each">
                        <img src="../assets/img/rooms_image/<?php
                            $img = $row['room_image'];

                            if (!empty($img)) {
                            echo "$img?".mt_rand();
                            }else{
                            echo 'user.png';
                            }
                        ?>" alt="">
                        <h1><?php echo $row['room_name']; ?></h1>
                        <h2><?php echo "₦".number_format($row['room_price'],2,'.',','); ?></h2>
                        <h3>Available Rooms: <span><?php echo $row['available_rooms']; ?></span></h3>
                        <p><?php echo $row['room_details']; ?><span><a href="#">Read More</a></span></p>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#rooms<?php echo $row['id'] ?>">Book Now</button>
                        <div class="modal fade" id="rooms<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Book Now for  <?php echo ucwords($row['room_name']); ?></h5>
                                    <button type="button" class="close outline-none border-none" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../assets/config/createRoom_control.php" method="post">
                                        <div class="booking-wrapper">
                                            <div>
                                            <img src="../assets/img/rooms_image/<?php
                                                $img = $row['room_image'];

                                                if (!empty($img)) {
                                                echo "$img?".mt_rand();
                                                }else{
                                                echo 'user.png';
                                                }
                                            ?>" alt="">
                                                <h1><?php echo $row['room_name'] ?></h1>
                                                <h2><?php echo "₦".number_format($row['room_price'],2,'.',','); ?></h2>
                                                <h3>Available Rooms: <span><?php echo $row['available_rooms'] ?></span></h3>
                                            </div>

                                            <div>
                                                <div>
                                                    <input type="hidden" name="rname" value="<?php echo $row['room_name'] ?>">
                                                </div>
                                                <div>
                                                    <input type="hidden" name="rid" value="<?php echo $row['id'] ?>">
                                                </div>

                                                <h1>Check-in Time</h1>
                                                <input type="datetime-local" name="checkIn" required>

                                                <h1>Check-out Time</h1>
                                                <input type="datetime-local" name="checkOut" required>

                                                <h1>No of Rooms</h1>
                                                <input type="number" name="noRooms" id="noRooms" placeholder="1">
                                            
                                                <h1>No of Guests</h1>
                                                <input type="number" name="noGuests" id="guests" placeholder="1">
                                            
                                                <button type="submit" name="bookRoom">Book</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        <!-- end of modal -->
                    </div>
                    <?php } ?> 
                </div>
              
            </div>
        <!-- </div> -->
<?php
    require_once '../assets/includes/portal_footer.php';
?>