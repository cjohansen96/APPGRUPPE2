<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style_cart.css">
</head>

<?php
require 'top.php';
?>

<body>
	<div class="container row">
		<?php
		require 'includes/dbh.inc.php';
		/* php kode for å koble til og hente data fra databasen */
		$query = 'SELECT * FROM Clothes ORDER by IdClothes ASC';
		$result = mysqli_query($conn,$query);

		if ($result):
			if (mysqli_num_rows($result)>0):
				while ($Clothes = mysqli_fetch_assoc($result)):
					//print_r($Clothes);
					?>
					<div style="margin-top: 10px;" class="col-sm-4 col-md-3">
						<form method="post" action="clothing.php?action=add&id=<?php echo $Clothes['IdClothes'];?>">
							<div class="products" style="height: 400px;">
								<img src="Bilder/clothes/<?php echo $Clothes ['ProductImage'];?>" class="img-fluid"/>
								<h4 class="text-info"><?php echo $Clothes['Name'];?></h4>
								<h4>£ <?php echo $Clothes['Price'];?></h4>
								<input type="text" name="quantity" class="form-control" value="1"/>
								<input type="hidden" name="name" value="<?php echo $Clothes['Name'];?>" />
								<input type="hidden" name="price" value="<?php echo $Clothes['Price'];?>" />
								<input type="submit" name="add_to_cart" class="btn btn-info"
									   value="Add to cart" style="margin-top: 10px;" />
							</div>
						</form>

					</div>
					<?php
				endwhile;
			endif;
		endif;
		?>
	</div>
</body>

<?php
require 'bottom.php';
?>

</html>