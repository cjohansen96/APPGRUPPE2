<?php

//fetch_data.php
session_start();
include('dbh.inc.php');


if(isset($_POST["action"])) {
   /*$query = "SELECT * FROM Clothes WHERE Gender = 'M'";*/
   $query = "SELECT Clothes.IdClothes as Id, Name, Category, Price, Brand, Gender, Quantity, Color, Size, ProductImage FROM Clothes LEFT OUTER JOIN Sale ON Clothes.IdClothes = Sale.IdClothes WHERE Sale.IdSale IS null AND Gender = 'M'";

  if(!preg_match("/^[A-Za-z ]+$/", $_POST['search']) || $_POST['search'] == "SELECT") {
    $query .= "
    AND Name LIKE '%%'";
  }

  else if(isset($_POST["search"]) && !empty($_POST["search"])) {
    $query .= "
    AND Name LIKE '%".$_POST["search"]."%'";
  }

  if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"])){
    $query .= "
    AND Price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
    ";
  }

  if(isset($_POST["category"]))  {
    $category_filter = implode("','", $_POST["category"]);
    $query .= "
    AND Category IN('".$category_filter."')
    ";
  }

  if(isset($_POST["brand"])) {
    $brand_filter = implode("','", $_POST["brand"]);
    $query .= "
    AND Brand IN('".$brand_filter."')
    ";
  }

  if(isset($_POST["color"]))  {
    $color_filter = implode("','", $_POST["color"]);
    $query .= "
    AND Color IN('".$color_filter."')
    ";
  }

  if(isset($_POST["size"]))  {
    $size_filter = implode("','", $_POST["size"]);
    $query .= "
    AND Size IN('".$size_filter."')
    ";
  }


  $result = mysqli_query($conn,$query); 
  $numRows = mysqli_num_rows($result);
  $output = '';



  if($numRows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
     $output .= '
     <div style="margin-bottom: 20px;" class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
     <form method="post" action="cart.php">
      <div style="height: 400px;" class="card shadow text-center">
     <div class="card-block">
     <img src="Bilder/clothes/'. $row['ProductImage'].'" alt="" class="img-fluid" style="height: 200px;">
     <div class="card-text">
     '.$row['Brand'].'
     </div>
     <div class="card-text">
     '.$row['Quantity'].' in stock
     </div>
     <div class="card-text">
     <h3>€ '.$row['Price'].'</h3>
     </div>

     <input style="width: 80%; margin-left: 10%; " type="text" name="quantity" href class="form-control" value=""/>

     <a style="margin-top: 10px; margin-bottom: 10px; background-color:#FB8122; border: none; color:black;" 
      href="cart.php?id='.$row['Id'].'" class="btn btn-success" role="button" type ="submit">Add to cart <span class="fas fa-cart-arrow-down"></span></a>


     </div>
     </div>
     </form>
     </div>';
   }
   echo $output;
 }
 else {
  if(!empty($_POST['search'])) {
    $output .= 'No items found by ' . $_POST['search'] . ' !';
    echo $output;
  }
  else {
    $output .= 'No items found!';
    echo $output;

  }
}

}
else if (isset($_POST["actionWomen"])) {
   $query = "SELECT Clothes.IdClothes as Id, Name, Category, Price, Brand, Gender, Quantity, Color, Size, ProductImage FROM Clothes LEFT OUTER JOIN Sale ON Clothes.IdClothes = Sale.IdClothes WHERE Sale.IdSale IS null AND Gender = 'F'";

  if(!preg_match("/^[A-Za-z ]+$/", $_POST['search']) || $_POST['search'] == "SELECT") {
    $query .= "
    AND Name LIKE '%%'";
  }

  else if(isset($_POST["search"]) && !empty($_POST["search"])) {
    $query .= "
    AND Name LIKE '%".$_POST["search"]."%'";
  }

  if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
  {
    $query .= "
    AND Price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
    ";
  }

  if(isset($_POST["category"]))  {
    $category_filter = implode("','", $_POST["category"]);
    $query .= "
    AND Category IN('".$category_filter."')
    ";
  }

  if(isset($_POST["brand"])) {
    $brand_filter = implode("','", $_POST["brand"]);
    $query .= "
    AND Brand IN('".$brand_filter."')
    ";
  }

  if(isset($_POST["color"]))  {
    $color_filter = implode("','", $_POST["color"]);
    $query .= "
    AND Color IN('".$color_filter."')
    ";
  }

  if(isset($_POST["size"]))  {
    $size_filter = implode("','", $_POST["size"]);
    $query .= "
    AND Size IN('".$size_filter."')
    ";
  }

  $result = mysqli_query($conn,$query); 
  $numRows = mysqli_num_rows($result);
  $output = '';

  if($numRows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
     $output .= '
     <div style="margin-bottom: 20px;" class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
     <form method="post" action="">
      <div style="height: 400px;" class="card shadow text-center">
     <div class="card-block">
     <img src="Bilder/clothes/'. $row['ProductImage'].'" alt="" class="img-fluid" style="height: 200px;">
     <div class="card-text">
     '.$row['Brand'].'
     </div>
     <div class="card-text">
     '.$row['Quantity'].' in stock
     </div>
     <div class="card-text">
     <h3>€ '.$row['Price'].'</h3>
     </div>
     <input style="width: 80%; margin-left: 10%; " type="text" name="quantity" class="form-control" value="1"/>
     <a style="margin-top: 10px; margin-bottom: 10px; background-color:#FB8122; border: none; color:black;" 
      href="cart.php?id='.$row['Id'].'" class="btn btn-success" role="button">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
     </div>
     </div>
     </form>
     </div>';
   }
   echo $output;
 }
 else {
  if(!empty($_POST['search'])) {
    $output .= 'No items found by ' . $_POST['search'] . ' !';
    echo $output;
  }
  else {
    $output .= 'No items found!';
    echo $output;

  }
}

}

/* Fetch data for salg */
else if (isset($_POST["actionSale"])) {
  $query = "
  SELECT Clothes.*, Sale.* FROM Clothes INNER JOIN Sale ON Clothes.IdClothes = Sale.IdClothes";

  if(!preg_match("/^[A-Za-z ]+$/", $_POST['search']) || $_POST['search'] == "SELECT") {
    $query .= "
    AND Name LIKE '%%'";
  }

  else if(isset($_POST["search"]) && !empty($_POST["search"])) {
    $query .= "
    AND Name LIKE '%".$_POST["search"]."%'";
  }

  if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
  {
    $query .= "
    AND Price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
    ";
  }

  if(isset($_POST["category"]))  {
    $category_filter = implode("','", $_POST["category"]);
    $query .= "
    AND Category IN('".$category_filter."')
    ";
  }

  if(isset($_POST["brand"])) {
    $brand_filter = implode("','", $_POST["brand"]);
    $query .= "
    AND Brand IN('".$brand_filter."')
    ";
  }

  if(isset($_POST["color"]))  {
    $color_filter = implode("','", $_POST["color"]);
    $query .= "
    AND Color IN('".$color_filter."')
    ";
  }

  if(isset($_POST["size"]))  {
    $size_filter = implode("','", $_POST["size"]);
    $query .= "
    AND Size IN('".$size_filter."')
    ";
  }

  $result = mysqli_query($conn,$query); 
  $numRows = mysqli_num_rows($result);
  $output = '';

  if($numRows > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      $sale = $row['New_Price']/$row['Price']*100;
     $output .= '
     <div style="margin-bottom: 20px;" class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
     <form method="post">
     <div style="height: 420px;" class="card shadow text-center">
     <div class="card-block">
     <h3 style="position:absolute; color:#ff165f;">-'.round($sale).'%</h3>
     <img src="Bilder/clothes/'. $row['ProductImage'].'" alt="" class="img-fluid" style="height: 200px;">
     <div class="card-text">
     '.$row['Brand'].'
     </div>
     <div class="card-text">
     '.$row['Quantity'].' in stock
     </div>
     <div class="card-text">
     <h3 style="color:#ff165f;">€ '.$row['New_Price'].'</h3>
     <p style="color:grey; text-decoration:line-through;">€ '.$row['Price'].'</p>
     </div>
     <input style="width: 80%; margin-left: 10%; " type="text" name="quantity" class="form-control" value="1"/>
     <a style="margin-top: 10px; margin-bottom: 10px; background-color:#FB8122; border: none; color:black;" 
      href="cart.php?id='.$row['IdClothes'].'" class="btn btn-success" role="button">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
     </div>
     </div>
     </form>
     </div>';
   }
   echo $output;
 }
 else {
  if(!empty($_POST['search'])) {
    $output .= 'No items found by ' . $_POST['search'] . ' !';
    echo $output;
  }
  else {
    $output .= 'No items found!';
    echo $output;

  }
}

}
