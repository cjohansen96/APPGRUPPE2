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
    <div class="col-sm-6 col-md-3 col-lg-3" style=" margin-bottom: 10px;">
      <a href="mens.php?clothes">
        <img src="Bilder/mens-fashion5.png" class="img-fluid" alt="mens fashion">
        <div class="carousel-caption">
          <h1 style="font-size: 15px; background-color: #1D2228;">Mens spring fashions</h1>
        </div>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3" style=" margin-bottom: 10px;">
      <a href="womens.php?clothes">
        <img src="Bilder/womens-fashion3.png" class="img-fluid" alt="womens fashion">
        <div class="carousel-caption">
          <h1 style="font-size: 15px; background-color: #1D2228;">Womens spring fashions</h1>
        </div>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3" style=" margin-bottom: 10px;">
      <a href="">
        <img src="Bilder/mens-fashion4.png" class="img-fluid" alt="best sellers">
        <div class="carousel-caption">
          <h1 style="font-size: 15px; background-color: #1D2228;">Items on sale</h1>
        </div>
      </a>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3" style=" margin-bottom: 10px;">
      <a href="">
        <img src="Bilder/mens-fashion3.png" class="img-fluid" alt="trending">
        <div class="carousel-caption">
          <h1 style="font-size: 15px; background-color: #1D2228;">Trending</h1>
        </div>
      </a>
    </div>
  </div>
</div>
<div class="container" style="height: 300px; background: url('Bilder/bildegizmo.png')no-repeat center center;-webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover; display: flex; flex-direction: column; text-align: center; justify-content: center; align-items: center; margin-bottom: 20px;">
  <div class="row" >
 <div>
   <a class="btn btn-danger btn-lg text-center mx-5" role="button" href="mens.php?clothes">SHOP MEN ></a>
 </div>
 <div>
   <a class="btn btn-danger btn-lg text-center mx-5" role="button" href="womens.php?clothes">SHOP WOMEN ></a>
 </div>
</div>
</div>

<?php
if (isset($_SESSION['customerId'])) {
echo '
<div class="container" style="margin-bottom: 20px;">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <a class="btn btn-primary btn-block quizbtn text-center" href="quiz.php" role="button" style=" background-color: #1D2228; height: 150px; border-radius: 4px; border: 5px solid #FB8122;"><h1 id="quiztxt">CLICK HERE TO ENTER OUR MONTHLY CONTEST FOR A CHANCE TO WIN FREE PRIZES!</h1></a>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>
';
}
?>

</body>

<?php
require 'bottom.php';
?>

</html>