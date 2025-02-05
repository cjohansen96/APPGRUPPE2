<!DOCTYPE html>
<html lang="en">
<head>
  <title>Exizt</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style_top.css">
</head>
<?php
require 'modal.php';
?>
<body>

  <nav class="navbar navbar-expand-md navbar-dark navbarbgclr">
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand"><img src="Bilder/Exizt-logo-sm.png" style="width: 120px; height: auto;"></a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon ml-auto"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">

          <li class="dropdown" style="padding-right: 10px;">
            <a href="#"  data-toggle="dropdown" style="text-decoration: none;"><h2><a href="mens.php?clothes" style="text-decoration: none;">MEN </a></h2></a>
            <ul class="dropdown-menu navbarbgclr">
              <li><a href="mens.php?clothes=Tshirt">T-shirts</a></li>
              <li><a href="mens.php?clothes=Sweater">Sweaters</a></li>
              <li><a href="mens.php?clothes=Jeans">Jeans</a></li>
            </ul>
          </li> 
          <li class="dropdown" style="padding-right: 10px;">
            <a href="#" data-toggle="dropdown" style="text-decoration: none;"><h2><a href="womens.php?clothes" style="text-decoration: none;"> WOMEN</a></h2></a>
            <ul class="dropdown-menu navbarbgclr">
              <li><a href="womens.php?clothes=Tshirt">T-shirts</a></li>
              <li><a href="womens.php?clothes=Sweater">Sweaters</a></li>
              <li><a href="womens.php?clothes=Jeans">Jeans</a></li>
            </ul>
          </li>
          <li>
            <a href="sale.php" style="text-decoration: none;"> <h2 style="color: #ff165f;"> SALE </h2></a>
          </li>
        </ul>
        <!-- dropdown for cart and login for smaller screens -->
        <?php
        if(!isset($_SESSION['customerId'])) {
          echo '<li class="dropdown" id="login">
          <a href="#modalLoginForm" data-toggle="modal" style="text-decoration: none;"><h2> LOGIN</h2></a>
          </li>';
        }
        elseif (isset($_SESSION['customerId'])) {
          echo '<li class="dropdown" id="login">
          <a href="profile.php" style="text-decoration: none;"><h2> MY PROFILE</h2></a>
          </li>';
          echo '<li class="dropdown" id="login">
          <a href="includes/logout.inc.php" style="text-decoration: none;"><h2> LOGOUT</h2></a>
          </li>';
        }
        ?>
        <li class="dropdown" id="cart">
          <a href="cart.php"  style="text-decoration: none;"><h2> CART</h2></a>
        </li>

      </ul>
    </div>
    




    <?php

    if(!isset($_SESSION['customerId'])) {
      echo '<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalLoginForm"> <span class="fas fa-user"></span> LOGIN</button>';
    }
    elseif (isset($_SESSION['customerId'])) {
      echo '<a href="profile.php"  class="btn btn-default"> <span class="fas fa-user"></span> My profile</a>';
      echo '<a href="includes/logout.inc.php" class="btn btn-default"> <span class="fas fa-sign-out-alt"> </span> </a>';
    }

    ?>

    <a href="cart.php" class="btn btn-default"><span class="fas fa-shopping-cart"></span></a>
<!--
<button href="cart.php" type="button" class="btn btn-default"> <span class="fas fa-shopping-cart"></span> </button>
-->

</div>
</nav>
<script type="text/javascript">
  $('li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
  });
</script>
</body>
</html>