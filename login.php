<?php
    $title = 'Log In | Rafael Hotels';
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
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/fonts/css/all.css">
</head>
<body>
    
    <main class="wrapper">
        <article>
            <section id=""  class=" container">
                <div class="login-form">
                     <?php 
                            echo successMessage(); echo errorMessage();
                        ?>
                    <form action="assets/config/login_control.php" method="post">
                        <div class="role1">
                            <input type="email" name="email" id="email" placeholder="myemail@gamil.com" required>
                            <input type="password" name="password" id="passWord" placeholder="Password" required>
                            <span id="show"><i class="fas fa-eye" id="icon"></i></span>
                        </div>
                        <div class="role2">
                            <button type="submit" name="login">Log In</button>
                            <a href="createAccount.php">Create Account</a>
                        </div>
                    </form>
                </div>

            </section>
        </article>
    </main>

<!-- FOOTER -->
<?php 
    require_once 'assets/includes/footer.php';
?>