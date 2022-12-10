<?php
    $title = 'Dashboard | Rafael Hotels';
     require_once '../assets/includes/portal_header.php';
     require_once '../assets/config/db_connect.php';
     require_once '../assets/includes/sessions.php';
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
    <meta name="description" content="This is a Rafael Hotel Website">
    <meta name="keywords" content="Hotel, Best Hotels, 10 star Hotel">
    <meta name="author" content="Raphael">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
</head>
<body>


    
        <div class="right-content">
            <div class="cover">
                <?php if($_SESSION['role'] == 'admin') {?>
                    <h1>Admin Dashboard</h1>
                <?php }else{ ?>
                    <h1>Dashboard</h1>
                <?php } ?>
            </div>
    
            <div class="board container">
                    <?php 
                            echo successMessage(); echo errorMessage();
                        ?>
                <div class="id">
                <div>
                    <img src="../assets/img/profile_pic/<?php
                        $img = $row['profile_pic'];

                        if (!empty($img)) {
                        echo "$img?".mt_rand();
                        }else{
                        echo 'user.png';
                        }
                    ?>" alt="" style="height: 150px; width: 150px; border-radius: 50%;">
                        
                </div>
                    <h1><?php echo $row['first_name']." ".$row['last_name']; ?></h1>
                </div>
                <hr>
                <div class="user-details">
                    <div class="row">
                        <div>
                            <h1>First Name</h1>
                            <h2><?php echo $row['first_name']; ?></h2>
                        </div>

                        <div>
                            <h1>Last Name</h1>
                            <h2><?php echo $row['last_name']; ?></h2>
                        </div>

                        <div>
                            <h1>UserName</h1>
                            <h2><?php echo $row['username']; ?></h2>
                        </div>

                        <div>
                            <h1>Email</h1>
                            <h2><?php echo $row['email']; ?></h2>
                        </div>
                    
                        <div>
                            <h1>Country</h1>
                            <h2><?php echo $row['country']; ?></h2>
                        </div>

                        <div>
                            <h1>City</h1>
                            <h2><?php echo $row['city']; ?></h2>
                        </div>

                        <div>
                            <h1>State</h1>
                            <h2><?php echo $row['user_state']; ?></h2>
                        </div>

                        <div>
                            <h1>Address</h1>
                            <h2><?php echo $row['user_address']; ?></h2>
                        </div>

                        <div>
                            <h1>Phone Number</h1>
                            <h2><?php echo $row['phone']; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    require_once '../assets/includes/portal_footer.php';
?>