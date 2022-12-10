<?php
    $title = 'About Us | Rafael Hotels';
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
    <link rel="stylesheet" href="assets/css/aboutUs.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/fonts/css/all.css">
</head>
<body>

<section class="section about-us">
        <h1>About Us</h1>
    </section>

    <section class="about-wrapper container">
        <div class="about-text">
            <h1>Rafael Hotels</h1>
            <img src="assets/img/logo.jpg" alt="">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Enim, autem molestias distinctio perferendis omnis hic doloremque accusantium fuga at eligendi sapiente commodi molestias tempore? </p>
                <br>  
            <p>Dignissimos, maxime minus mollitia a voluptatem illo vitae deleniti obcaecati quibusdam placeat dolores tenetur numquam cumque dolorem voluptatibus eos! Nam aut dignissimos quae in consectetur corrupti sapiente, nihil expedita non aliquam
            optio quam, vero ad accusamus consequuntur.</p>

            <a href="#"><button>Learn More</button></a>
        </div>

        <div class="about-image">
            <img src="assets/img/hotel_background.jpg" alt="">
        </div>
    </section>




<!-- FOOTER -->
<?php include_once 'assets/includes/footer.php'; ?>