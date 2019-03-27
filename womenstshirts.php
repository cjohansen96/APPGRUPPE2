<!DOCTYPE html>
<html>
<head>
	<title>Womens clothes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style_womensclothes.css">
</head>


<?php
require 'top.php';
require 'includes/dbh.inc.php';
?>

<body>
	<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
		<div class="row">

			<!-- Filter options -->

			<!--
			<div class="col-md-3 col-sm-12">
				<h1><span class="fas fa-sliders-h" style="font-size: 0.9em;"></span>Filter</h1>
				<select class="form-control form-control-lg" style="margin-bottom: 10px;">
					<option>Category</option>
					<option>T-shirt</option>
					<option>Sweater</option>
					<option>Jeans</option>
				</select>
				<select class="form-control form-control-lg" style="margin-bottom: 10px;">
					<option>Brand</option>
					<option>Exizt</option>
					<option>Vans</option>
					<option>The hundreds</option>
				</select>
				<select class="form-control form-control-lg" style="margin-bottom: 10px;">
					<option>Price</option>
					<option>Low-high</option>
					<option>High-low</option>	
				</select>
				<select class="form-control form-control-lg" style="margin-bottom: 10px;">
					<option>Color</option>
					<option>Black</option>
					<option>Grey</option>
					<option>White</option>
				</select>
				<select class="form-control form-control-lg" style="margin-bottom: 10px;">
					<option>Size</option>
					<option>S</option>
					<option>M</option>
					<option>L</option>
				</select>
			</div>
-->

			<?php
			$query = 'SELECT * FROM Clothes WHERE Category="Tshirt"';
			$result = mysqli_query($conn,$query);	

			
			if (mysqli_num_rows($result)>0):
				while ($Clothes = mysqli_fetch_assoc($result)):
				?>		
			<!-- Clothing cards -->
			<div style="margin-bottom: 20px;" class="col-md-3 col-sm-6">
				<form method="post" action="clothing.php?action=add&id=<?php echo $Clothes['IdClothes'];?>">
				<div style="height: 450px;" class="card shadow text-center">
					<div class="card-block">
						<img src="Bilder/clothes/<?php echo $Clothes ['ProductImage'];?>" alt="" class="img-fluid" style="height: 250px;">
						<div class="card-title">
							<h4><?php echo $Clothes['Name'];?></h4>
						</div>
						<div class="card-text">
							<?php echo $Clothes['Quantity'];?> in stock
						</div>
						<div class="card-text">
							<h3>£ <?php echo $Clothes['Price'];?></h3>
						</div>
						<input style="width: 80%; margin-left: 10%; " type="text" name="quantity" class="form-control" value="1"/>
						<a style="margin-top: 10px; margin-bottom: 10px;" href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
					</div>
				</div>
			</form>
			</div>

			<?php
		endwhile;
endif;
			?>
		</div>
	</div>
</body>

<?php
require 'bottom.php';
?>

</html>