<?php
    $title = 'Contact Us | Rafael Hotels';
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
    <link rel="stylesheet" href="assets/css/contactUs.css">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/fonts/css/all.css">
</head>
<body>

<section class="section contact-us">
        <h1>Contact Us</h1>
        <p>Any Questions, Feedbacks or Complaints? Just write us a message.</p>
        
        <div class="contact-wrapper container">
            <div class="information">
                <h1>Contact Information</h1>
                <div class="contact-links">
                    <ul>
                        <li><a href="+2347082320244"><i class="fas fa-phone"></i> +23408100493357</a></li>
                        <li><i class="fas fa-envelope"></i> info@rafaelhotelsabuja</li>
                        <li><i class="fas fa-map-marker-alt"></i> Abuja, Nigeria</li>
                    </ul>
                </div>

                <div class="social-links">
                    <a href="facebook.com"><img src="assets/img/facebook.png" alt=""></a>
                    <a href="whatsapp.com"><img src="assets/img/whatsapp.png" alt=""></a>
                    <a href="twitter.com"><img src="assets/img/twitter.png" alt=""></a>
                    <a href="instagram.com"><img src="assets/img/instagram.png" alt=""></a>
                    <a href="youtube.com"><img src="assets/img/youtube.png" alt=""></a>
                </div>
            </div>

            <div class="contact-form">
                <p>Fill up this form and our team will get back to you within 24 hours.</p>
                <form action="" class="form">
                    <div class="name">
                        <div>
                            <h1>First Name</h1>
                            <input type="text" name="" id="" placeholder="Papi" required>
                        </div>
                        <div>
                            <h1>Last Name</h1>
                            <input type="text" name="" id="" placeholder="Chulo" required>
                        </div>
                    </div>
    
                    <div class="email-tel">
                       <div>
                           <h1>Email</h1>
                           <input type="email" name="" id="" placeholder="yourmail@mail.com">
                       </div>
                        <div>
                            <h1>Tel:</h1>
                            <input type="tel" name="" id="" placeholder="Mobile No.:">
                        </div>
                        
                        <div>
                            <h1>Write us a message:</h1>
                            <textarea name="" id="" cols="20" rows="3"></textarea>
                        </div>
                    </div>
                    <button>Send Message</button>
                </form>
            </div>
        </div>
    </section>
    




<!-- FOOTER -->
<?php include_once 'assets/includes/footer.php'; ?>