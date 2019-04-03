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


 <div style="margin-top: 20px; margin-bottom: 20px; padding: 0px;" class="container">
  <div class="row">
    <div  class="col-sm-4" style="outline: none; border: none; border-style: none;">
      <img src="Bilder/mens-fashion4.png" class="img-fluid" alt="mens fashion">
      <div class="carousel-caption">
        <h1 style="font-size: 20px; background-color: black;">Mens spring fashions</h1>
      </div>
    </div>
    <div class="col-sm-4" style="outline: none; border: none; border-style: none;">
      <img src="Bilder/womens-fashion3.png" class="img-fluid" alt="womens fashion">
      <div class="carousel-caption">
        <h1 style="font-size: 20px; background-color: black;">Womens spring fashions</h1>
      </div>
    </div>
    <div class="col-sm-4 " style="outline: none; border: none; border-style: none; ">
      <img src="Bilder/mens-fashion3.png" class="img-fluid" alt="trending">
      <div class="carousel-caption">
        <h1 style="font-size: 20px; background-color: black;">Trending right now</h1>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
 <div class="row">
   <a href="#"><img src="Bilder/sale-banner4.webp" class="img-fluid" alt="Sales banner"></a>
 </div>
</div>

<div style="margin-top: 20px; margin-bottom: 20px;" class="container">
  <div class="row">    
    <div class="col-sm-4"  style="outline: none; border: none; border-style: none;">
      <img src="Bilder/clothes/11.png" class="img-fluid" alt="">
      <div class="carousel-caption">
        <h1 style="font-size: 20px; background-color: black;">New sweaters</h1>
      </div>
    </div>
    <div  class="col-sm-4"  style="outline: none; border: none; border-style: none;">
      <img src="Bilder/clothes/18.png" class="img-fluid" alt="">
      <div class="carousel-caption">
        <h1 style="font-size: 20px; background-color: black;">New jeans</h1>
      </div>
    </div>

    <div class="col-sm-4"  style="outline: none; border: none; border-style: none;">
      <img src="Bilder/clothes/5.png" class="img-fluid" alt="">
      <div class="carousel-caption">
        <h1 style="font-size: 20px; background-color: black;">New T-shirts</h1>
      </div>
    </div>
  </div>
</div>
</body>

<?php
require 'bottom.php';
?>

</html>