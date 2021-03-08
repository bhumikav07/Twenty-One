<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>21</title>

    <!--Bootstrap CDN-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--!Bootstrap CDN-->

    <!--Owl Carousel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
    <!--!Owl Carousel-->

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <!--Font Awesome-->

    <!--Custom CSS-->
    <link rel="stylesheet" href="style.css" />
    <!--!Custom CSS-->

    <?php
        //Require function.php file
        require('functions.php');
    ?>


</head>

<body>
    <!--Header-->
    <!--Main Navigation-->
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php"><img src="./assets/Logo.png" style="width: 90px" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" 
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse font-poppins font-s-14 font-w-600 color-primary" 
                id="navbarNavAltMarkup">
                <div class="navbar-nav m-auto">
                    <a class="nav-item nav-link active" aria-current="page" href="index.php">HOME</a>
                    <a class="nav-item nav-link" aria-current="page" href="shop.php">SHOP</a>
                    <a class="nav-item nav-link" href="aboutus.php">ABOUT US</a>
                    <a class="nav-item nav-link" href="contactus.php">CONTACT US</a>
                </div>
                <button onclick="document.location='login.php'" type="button" class="btn btn-head font-poppins font-s-14 font-w-600" style="margin-right: 20px">
                    LOGIN
                </button>
                <button onclick="document.location='cart.php'" type="button"
                    class="btn btn-head font-poppins font-s-14 font-w-600" style="margin-right: 20px">
                    CART <span class="badge color-secondary"><?php echo count($product->getData('cart'));?></span>
                </button>
            </div>   
        </nav>
    </div>
    <!--!Main Navigation-->

    <!--Carousel-->
    <main id="main-site">