<?php
    $title = 'Add Room | Rafael Hotels';
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
    <link rel="stylesheet" href="../assets/css/addRoom.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
</head>
<body>
    <!-- <div class="dashboard"> -->

         <div class="right-content">
             <div class="cover">
                 <h1>Add Room</h1>
             </div>
             
             <div class="roomAdd-wrapper container">
             <?php
                echo successMessage();
                echo errorMessage();
            ?>
                <div class="prof-img">
                    
                </div>

                <div class="roomAdd-form">
                    <form action="../assets/config/createRoom_control.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="my_image" id="image-input" required>
                        <input type="text" name="rname" placeholder="Room Name" required>
                        <input type="number" name="rprice" placeholder="Room Price" required>

                            <select name="rstatus" required>
                                <option>Available</option>
                                <option>Active by you</option>
                                <option>Full</option>
                                <option selected disabled>Room Status</option>
                            </select>
                            <input type="number" name="avrooms" placeholder="Available Rooms" required>
                            <input type="text" name="rdetails" placeholder="Room Details" required>
                            <div style="text-align: end;">
                                <button type="submit" name="addRoom">Add</button>
                            </div>
                        </form>
                </div>
             </div>
         </div>
     <!-- </div> -->

<?php
    require_once '../assets/includes/portal_footer.php';
?>