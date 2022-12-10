<?php
    $title = 'Sign Up | Rafael Hotels';
    require_once 'assets/includes/header.php';
    require_once 'assets/includes/sessions.php';
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
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="img/logo.jpg">
    <link rel="stylesheet" href="assets/css/auth.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/fonts/css/all.css">
</head>
<body>


    <main class="wrapper">
        <article>
            <section id=""  class=" container">
                <div class="reg-form">
                        <?php 
                            echo successMessage(); echo errorMessage();
                        ?>
                    <form action="assets/config/createAccount_control.php" method="post">
                        <div class="role1">
                            <input type="text" name="fname" id="fname" placeholder="First Name" required>
                            <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                        </div>

                        <div class="role2">
                            <input type="text" name="uname" id="uname" placeholder="username" required>
                            <input type="email" name="email" id="email" placeholder="myemail@gamil.com" required>
                        </div>
                        
                        <div class="role3">
                            <input type="text" name="country" id="country" placeholder="Country" required>
                            <input type="text" name="user_state" id="ustate" placeholder="State" required>
                            <input type="text" name="city" id="city" placeholder="city" required>
                        </div>

                        <input type="address" name="user_address" id="address" placeholder="Address" required></input>
                        
                        <div class="role4">
                            <input type="tel" name="phone" id="phone" placeholder="Phone Number" required>
                            <input type="password" name="password" id="passWord" placeholder="Password" required>
                            <span id="show"><i class="fas fa-eye" id="icon"></i></span>
                        </div>

                        <div class="role5">
                            <button type="submit" name="register">Sign Up</button>
                            <a href="login.php">Login Instead</a>
                        </div>
                    </form>
                </div>
            </section>
        </article>
    </main>
    

<!-- FOOTER -->
<?php include_once 'assets/includes/footer.php'; ?>