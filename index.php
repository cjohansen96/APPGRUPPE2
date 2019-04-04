<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require 'top.php';
require 'slideshow.php';
?>  

<head>
  <title>Exizt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style_index.css">
</head>



<body>


 <div style="margin-top: 20px; margin-bottom: 10px; " class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-lg-4" style=" margin-bottom: 10px;">
      <img src="Bilder/mens-fashion4.png" class="img-fluid" alt="mens fashion">
      <div class="carousel-caption">
        <h1 style="font-size: 15px; background-color: #1D2228;">Mens spring fashions</h1>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-4" style=" margin-bottom: 10px;">
      <img src="Bilder/womens-fashion3.png" class="img-fluid" alt="womens fashion">
      <div class="carousel-caption">
        <h1 style="font-size: 15px; background-color: #1D2228;">Womens spring fashions</h1>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-4" style=" margin-bottom: 10px;">
      <img src="Bilder/mens-fashion3.png" class="img-fluid" alt="trending">
      <div class="carousel-caption">
        <h1 style="font-size: 15px; background-color: #1D2228;">Trending right now</h1>
      </div>
    </div>
  </div>
</div>

  <?php
    if(!isset($_SESSION['customerId'])) {
    echo '<div class="container">
      <div class="row">
   <a href="#"><img src="Bilder/sale-banner4.webp" style="width: 100%; class="img-fluid" alt="Sales banner"></a>
</div>
</div>';
    }
    elseif (isset($_SESSION['customerId'])) {
      echo '
      <div class="container">
      <div class="row">
        <a href="quiz.php">
   <div class="col-sm-12 col-md-12 col-lg-12" style=" margin-bottom: 10px;">
      <img src="Bilder/orange-banner.jpg" style="width: 100%;" class="img-fluid" alt="">
      <div class="carousel-caption" style="padding: 2px;">
        <h1 id="quiztxt" style="color: #1D2228;">CLICK HERE TO ENTER OUR MONTHLY CONTEST FOR A CHANCE TO WIN FREE CLOTHES!</h1>
      </div>
    </div>
  </a>
</div>
</div>
';
    }
    ?>
<!--
 <div class="row">
   <a href="#"><img src="Bilder/sale-banner4.webp" class="img-fluid" alt="Sales banner"></a>
</div>
-->
<div style="margin-top: 20px; margin-bottom: 10px; " class="container">
  <div class="row">    
    <div class="col-sm-6 col-md-4 col-lg-4" style=" margin-bottom: 10px;">
      <img src="Bilder/clothes/11.png" class="img-fluid" alt="">
      <div class="carousel-caption">
        <h1 style="font-size: 15px; background-color: #1D2228;">New sweaters</h1>
      </div>
    </div>
    <div class="col-sm-6 col-md-4 col-lg-4" style=" margin-bottom: 10px;">
      <img src="Bilder/clothes/18.png" class="img-fluid" alt="">
      <div class="carousel-caption">
        <h1 style="font-size: 15px; background-color: #1D2228;">New jeans</h1>
      </div>
    </div>

    <div class="col-sm-6 col-md-4 col-lg-4" style=" margin-bottom: 10px;">
      <img src="Bilder/clothes/5.png" class="img-fluid" alt="">
      <div class="carousel-caption">
        <h1 style="font-size: 15px; background-color: #1D2228;">New T-shirts</h1>
      </div>
    </div>
  </div>
</div>
</body>

<?php
require 'bottom.php';
?>

</html>