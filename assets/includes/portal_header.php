<?php
    require_once '../assets/config/db_connect.php';
    require_once '../assets/includes/sessions.php';
    auth();
    $id =  $_SESSION['id'];
?>

<?php
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $query = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="shortcut icon" href="../assets/img/logo.jpg">
</head>

<div class="dashboard">
        <div class="menu">
            <button class="toggle-btn-open">
                <i class="fas fa-bars" id="bIcon"></i>
            </button>
        </div>
        <div class="left-sidebar">
            <button class="toggle-btn-close">
                <i class="fas fa-times"></i>
            </button>

            <div class="brand">
                <img src="../assets/img/logo.jpg" alt="">
                <h1>RH</h1>
            </div>
    
            <div class="sideitems">
                <a href="dashboard.php" class="sidebar-link">
                    <img src="../assets/img/user.png" alt="">
                    <span>Profile</span>
                </a>

                <?php if($_SESSION['role'] == 'admin') {?>
                    <a href="adminUsers.php" class="sidebar-link">
                        <img src="../assets/img/users.png" alt="">
                        <span>Users</span>
                    </a>
                <?php } ?>

                <?php if($_SESSION['role'] == 'admin') {?>
                    <a href="addRoom.php" class="sidebar-link">
                        <div class="add">
                            <img src="../assets/img/room.png" alt="">
                            <span>Add Room</span>
                            <i class="fas fa-plus plus"></i>
                        </div>
                    </a>
                <?php } ?>
                
                <a href="rooms.php" class="sidebar-link">
                    <img src="../assets/img/room.png" alt="">
                    <span>Rooms</span>
                </a>
                
                <?php if($_SESSION['role'] == 'admin') {?>
                    <a href="adminBookedRooms.php" class="sidebar-link">
                        <img src="../assets/img/recent booking.png" alt="">
                        <span>Booked Rooms</span>
                    </a>
                <?php }else{ ?>
                    
                <a href="previousBookings.php" class="sidebar-link">
                    <img src="../assets/img/recent booking.png" alt="">
                    <span>Previous Bookings</span>
                </a>
                <?php } ?>
    
                <a href="#" class="sidebar-link">
                    <img src="../assets/img/payment.png" alt="">
                    <span>Payment</span>
                </a>
    
                <a href="updateProfile.php" class="sidebar-link">
                    <img src="../assets/img/update profile.png" alt="">
                    <span>Update Profile</span>
                </a>
    
                <a href="../assets/config/logout_control" class="sidebar-link">
                    <img src="../assets/img/logout.png" alt="">
                    <span>Log Out</span>
                </a>
            </div>
        </div>
 </div>