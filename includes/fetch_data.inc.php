<?php

//fetch_data.php

include('dbh.inc.php');

if(isset($_POST["action"])) {
  $query = "
  SELECT * FROM Clothes WHERE Gender = 'M'";

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
  $output = '';
  while($row = mysqli_fetch_assoc($result)) {
   $output .= '
   <div style="margin-bottom: 20px;" class="col-lg-3 col-md-6 col-sm-6">
   <form method="post">
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
   <h3>£ '.$row['Price'].'</h3>
   </div>
   <input style="width: 80%; margin-left: 10%; " type="text" name="quantity" class="form-control" value="1"/>
   <a style="margin-top: 10px; margin-bottom: 10px; background-color:#FB8122; border: none; color:black;" href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
   </div>
   </div>
   </form>
   </div>';
 }


 echo $output;
}
else if (isset($_POST["actionWomen"])) {
  $query = "
  SELECT * FROM Clothes WHERE Gender = 'F'";

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
  $output = '';
  while($row = mysqli_fetch_assoc($result)) {
   $output .= '
   <div style="margin-bottom: 20px;" class="col-md-3 col-sm-6">
   <form method="post">
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
   <h3>£ '.$row['Price'].'</h3>
   </div>
   <input style="width: 80%; margin-left: 10%; " type="text" name="quantity" class="form-control" value="1"/>
   <a style="margin-top: 10px; margin-bottom: 10px; background-color:#FB8122; border: none; color:black;" href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
   </div>
   </div>
   </form>
   </div>';
 }


 echo $output;
}

?>