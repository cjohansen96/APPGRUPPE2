<!DOCTYPE html>
<html>
<head>
	<title>Mens clothes</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style_mensclothes.css">
</head>


<?php
require 'top.php';
?>

<body>
	<!-- Filter options -->
	<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
		<div class="row">
			<div class="col-md-2 dropdown">
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
			<!-- cards for clothes -->
			<div class="col-md-3">
				<div class="card shadow" style="width: 20rem; height: 500px; margin-bottom: 20px;">
					<div class="inner">
						<img class="card-img-top" src="Bilder/clothes/3.png" alt="Card image cap">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title">T-shirt</h5>
						<p class="card-text">Exizt T-shirt with logo</p>
						<a href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
						<h3>20£</h3>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card shadow" style="width: 20rem; height: 500px; margin-bottom: 20px;">
					<div class="inner">
						<img class="card-img-top" src="Bilder/clothes/3.png" alt="Card image cap">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title">Exizt T-shirt</h5>
						<p class="card-text">Exizt T-shirt with logo</p>
						<a href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
						<h3>20£</h3>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card shadow" style="width: 20rem; height: 500px; margin-bottom: 20px;">
					<div class="inner">
						<img class="card-img-top" src="Bilder/clothes/3.png" alt="Card image cap">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title">T-shirt</h5>
						<p class="card-text">Exizt T-shirt with logo</p>
						<a href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
						<h3>20£</h3>
					</div>
				</div>
			</div>

			<div class="col-md-3">
				<div class="card shadow" style="width: 20rem; height: 500px;margin-bottom: 20px;">
					<div class="inner">
						<img class="card-img-top" src="Bilder/clothes/3.png" alt="Card image cap">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title">T-shirt</h5>
						<p class="card-text">Exizt T-shirt with logo</p>
						<a href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
						<h3>20£</h3>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card shadow" style="width: 20rem; height: 500px; margin-bottom: 20px;">
					<div class="inner">
						<img class="card-img-top" src="Bilder/clothes/3.png" alt="Card image cap">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title">Exizt T-shirt</h5>
						<p class="card-text">Exizt T-shirt with logo</p>
						<a href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
						<h3>20£</h3>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card shadow" style="width: 20rem; height: 500px;margin-bottom: 20px;">
					<div class="inner">
						<img class="card-img-top" src="Bilder/clothes/3.png" alt="Card image cap">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title">T-shirt</h5>
						<p class="card-text">Exizt T-shirt with logo</p>
						<a href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
						<h3>20£</h3>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card shadow" style="width: 20rem; height: 500px;margin-bottom: 20px;">
					<div class="inner">
						<img class="card-img-top" src="Bilder/clothes/3.png" alt="Card image cap">
					</div>
					<div class="card-body text-center">
						<h5 class="card-title">T-shirt</h5>
						<p class="card-text">Exizt T-shirt with logo</p>
						<a href="#" class="btn btn-success">Add to cart <span class="fas fa-cart-arrow-down"></span></a>
						<h3>20£</h3>
					</div>
				</div>
			</div>

		</div>
	</div>

</body>

<?php
require 'bottom.php';
?>

</html>