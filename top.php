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
            <a href="#"  data-toggle="dropdown" style="text-decoration: none;"><h2>MEN </h2></a>
            <ul class="dropdown-menu text-center navbarbgclr">
              <li><a href="menstshirts.php">T-shirts</a></li>
              <li><a href="menssweaters.php">Sweaters</a></li>
              <li><a href="mensjeans.php">Jeans</a></li>
            </ul>
          </li> 
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" style="text-decoration: none;"><h2> WOMEN</h2></a>
            <ul class="dropdown-menu text-center navbarbgclr">
              <li><a href="womenstshirts.php">T-shirts</a></li>
              <li><a href="womenssweaters.php">Sweaters</a></li>
              <li><a href="womensjeans.php">Jeans</a></li>
            </ul>
          </li>
    <!-- dropdown for cart and login for smaller screens
    <li class="dropdown">
      <a href="#" data-toggle="dropdown" style="text-decoration: none;"><h2> LOGIN</h2></a>
    </li>
    <li class="dropdown" id="cartdd">
      <a href="#" data-toggle="dropdown" style="text-decoration: none;"><h2> CART</h2></a>
    </li>
  -->
</ul>
</div>
<div id="searchbar">
  <form class="form-inline" action="/action_page.php">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-default" type="submit"> <span class="fas fa-search"></span> </button>
  </form>
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

</body>
</html>