<?php
    $title = 'Update Profile | Rafael Hotels';
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
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/updateProfile.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
</head>
<body>
    <!-- <div class="dashboard"> -->
 
         <div class="right-content">
             <div class="cover">
                 <h1>Update Profile</h1>
             </div>
             
             <div class="updateP-wrapper container">
                <div class="prof-img">
                <img src="../assets/img/profile_pic/<?php
                         $img = $row['profile_pic'];

                         if (!empty($img)) {
                           echo "$img?".mt_rand();
                         }else{
                           echo 'user.png';
                         }
                      ?>" alt="" style="height: 150px; width: 150px; border-radius: 50%;">
                    <form action="../assets/config/updateProfile_control.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="img" id="image-input">
                        <button type="submit" name="updatePicture">Update Photo</button>
                    </form>
                </div>

                <div class="update-form">
                    <form action="../assets/config/updateProfile_control.php" method="post">
                        <input type="text" name="fname" id="fname" placeholder="First Name">
                        <input type="text" name="lname" id="lname" placeholder="Last Name">
                        <input type="text" name="uname" id="uname" placeholder="username">
                        <input type="email" name="email" id="email" placeholder="myemail@gamil.com">
                        <input type="text" name="country" id="country" placeholder="Country">
                        <input type="text" name="user_state" id="ustate" placeholder="State">
                        <input type="text" name="city" id="city" placeholder="city">
                        <input type="address" name="user_address" id="address" placeholder="Address"></input>                    
                        <input type="tel" name="phone" id="phone" placeholder="Phone Number">
                        <button type="submit" name="updateProfile">Update Profile</button>
                        </div>
                    </form>
                </div>
             </div>
         </div>
     <!-- </div> -->

    <?php
    require_once '../assets/includes/portal_footer.php';
?>