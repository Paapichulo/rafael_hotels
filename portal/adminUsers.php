<?php
    $title = 'Users | Rafael Hotels';
    require_once '../assets/config/db_connect.php';
    require_once '../assets/includes/sessions.php';
    // disabled();
    auth();
     require_once '../assets/includes/portal_header.php';
     $id =  $_SESSION['id'];
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
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/adminUsers.css">
    <link rel="stylesheet" href="../assets/fonts/css/all.css">
</head>
<body>
    <!-- <div class="dashboard"> -->
        <div class="right-content">
            <div class="cover">
                <h1>Users</h1>
            </div>

            <div class="users-wrapper container">
                <?php
                    echo successMessage();
                    echo errorMessage();
                ?>
                <div class="search-wrapper">
                    <form action="adminUsers.php" method="post">
                        <input type="text" name="search" placeholder="Search User">
                        <button name="searchBtn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="total-users-card">
                    <h1>Total Users</h1>
                    <p>
                    <?php 
                        if (isset($_POST['searchBtn'])) {
                        $search = $_POST['search'];
                        $sql = "SELECT * FROM users WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'";
                        }else{
                        $sql = "SELECT * FROM users WHERE user_role = 'user' OR first_name = 'Chris' ORDER BY id DESC LIMIT 0,3";
                        }
                        $query = mysqli_query($connection,$sql);
                        $message = "";
                        if (mysqli_num_rows($query) < 1) {
                        $message = "No User Found";
                        }
                        echo mysqli_num_rows($query);
                    ?>
                    </p>
                </div>

                <table>
                    <tr>
                        <td class="td1">Image</td>
                        <td class="td1">Name</td>
                        <td class="td1">Email</td>
                        <td class="td1">Phone Number</td>
                        <td class="td1"><i class="fas fa-box"></i></td>
                    </tr>
                
                    <?php
                        while($row = mysqli_fetch_assoc($query)){ 
                    ?>

                    <tr>
                        <td>
                            <div>
                                <img src="../assets/img/profile_pic/<?php
                                    $img = $row['profile_pic'];

                                    if (!empty($img)) {
                                    echo "$img?".mt_rand();
                                    }else{
                                    echo 'user.png';
                                    }
                                ?>" alt="" style="height: 50px; width: 50px; border-radius: 50%;">    
                            </div>
                        </td>
                        <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td>
                            <a href="dashboard?id=<?php echo $row['id']; ?>">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } echo $message ?>
                </table>
            </div>
            
        </div>
    <!-- </div> -->

<?php
    require_once '../assets/includes/portal_footer.php';
?>