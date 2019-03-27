<?php

//fetch_data.php

include('dbh.inc.php');

if(isset($_POST["action"]))
{
 $query = "
 SELECT * FROM Clothes WHERE Gender = 'M'
 ";

if(isset($_POST["brand"]))
{
  $brand_filter = implode("','", $_POST["brand"]);
  $query .= "
  AND Brand IN('".$brand_filter."')
  ";
}

elseif(isset($_POST["category"]))
{
  $category_filter = implode("','", $_POST["category"]);
  $query .= "
  AND Category IN('".$category_filter."')
  ";
}

elseif(isset($_POST["color"]))
{
  $color_filter = implode("','", $_POST["color"]);
  $query .= "
  AND Color IN('".$color_filter."')
  ";
}


$result = mysqli_query($conn,$query); 
$output = '';
while($row = mysqli_fetch_assoc($result))
{
 $output .= '



      <div style="margin-bottom: 20px;" class="col-md-3 col-sm-6">
        <form method="post" action="clothing.php?action=add&id='.$row['IdClothes'].'">
        <div style="height: 450px;" class="card shadow text-center">
          <div class="card-block">
            <img src="Bilder/clothes/'. $row['ProductImage'].'" alt="" class="img-fluid" style="height: 250px;">
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
            <a style="margin-top: 10px; margin-bottom: 10px;" href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
          </div>
        </div>
      </form>
      </div>
 ';
}


echo $output;
}

?>