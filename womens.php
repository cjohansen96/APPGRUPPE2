<?php

if (!isset($_GET['clothes'])) {
	header("location: ../APPGRUPPE2/index.php");
}
else {
	session_start();
	require 'includes/dbh.inc.php';
	require 'top.php';
	$checkClothes = $_GET['clothes'];

	?>
	<!DOCTYPE html>
	<html>
	<head>    
		<title>Clothes</title>
		<link rel="stylesheet" type="text/css" href="css/style_clothes.css">
	</head>
	<body>   <!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-md-3">  
					<div class="list-group">
						<h1> Filter </h1> <br>
						<a class="btn btn-primary" data-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false" aria-controls="collapseCategory">
						    Category
						  </a>
						<div class="collapse" id="collapseCategory" style="height: 180px; overflow-y: auto; overflow-x: hidden;">
							<?php

							$query = "SELECT DISTINCT(Category) FROM Clothes";
							$result = mysqli_query($conn,$query);

							while ($row = mysqli_fetch_assoc($result)) 
							{
								?>
								<div class="list-group-item checkbox">
									<label><input type="checkbox" class="common_selector category" value="<?php echo $row['Category']; ?>" > <?php echo $row['Category']; ?></label>
								</div>
								<?php
							}

							?>
						</div>
					</div>

					<div class="list-group">
						<a class="btn btn-primary" data-toggle="collapse" href="#collapseBrand" role="button" aria-expanded="false" aria-controls="collapseBrand">
						    Brand
						  </a>
						  <div class="collapse" id="collapseBrand">
						<?php

						$query = "
						SELECT DISTINCT(Brand) FROM Clothes";
						$result = mysqli_query($conn,$query);

						while ($row = mysqli_fetch_assoc($result)) 
						{
							?>

							<div class="list-group-item checkbox">
								<label><input name="cat" type="checkbox" class="common_selector brand" value="<?php echo $row['Brand']; ?>"  > <?php echo $row['Brand']; ?></label>
							</div>
							<?php    
						}

						?>
					</div>
				</div>
					<div class="list-group">
						<a class="btn btn-primary" data-toggle="collapse" href="#collapseColor" role="button" aria-expanded="false" aria-controls="collapseColor">
						    Color
						  </a>
						  <div class="collapse" id="collapseColor">
						<?php
						$query = "
						SELECT DISTINCT(Color) FROM Clothes";
						$result = mysqli_query($conn,$query);

						while ($row = mysqli_fetch_assoc($result)) 
						{
							?>
							<div class="list-group-item checkbox">
								<label><input type="checkbox" class="common_selector color" value="<?php echo $row['Color']; ?>"  > <?php echo $row['Color']; ?></label>
							</div>
							<?php
						}
						?> 
					</div>
				</div>
					<div class="list-group">
						<a class="btn btn-primary" data-toggle="collapse" href="#collapseSizes" role="button" aria-expanded="false" aria-controls="collapseSizes">
					    Size
					  </a>
					  <div class="collapse" id="collapseSizes">
						<?php
						$query = "
						SELECT DISTINCT(Size) FROM Clothes";
						$result = mysqli_query($conn,$query);

						while ($row = mysqli_fetch_assoc($result)) 
						{
							?>
							<div class="list-group-item checkbox">
								<label><input type="checkbox" class="common_selector size" value="<?php echo $row['Size']; ?>"  > <?php echo $row['Size']; ?></label>
							</div>
							<?php
						}
						?> 
					</div>
				</div>
				</div>

				<div class="col-md-9">
					<br />
					<div class="row filter_data">

					</div>
				</div>
			</div>

		</div>


		<script>
		//Jquery code
		$(document).ready(function(){ // Everything loads after the document is loaded.

			filter_data();

			function filter_data()
			{
				var actionWomen = 'fetch_data';
				var category = get_filter('category');
				var brand = get_filter('brand');
				var color = get_filter('color');
				var size = get_filter('size');
				$.ajax({ //Ajax code
					url:"includes/fetch_data.inc.php",
					method:"POST",
					data:{actionWomen:actionWomen, category:category, brand:brand, color:color, size:size}, //Passing variables to fetch_data.inc.php
					success:function(data){		//Sucsess callback function
						$('.filter_data').html(data); // Pasting html data into the class filter_data
					}
				});
			}

			function get_filter(class_name)
			{
				var filter = [];
				$('.'+class_name+':checked').each(function(){ //To retrieve only the selected options of select elements, use the :selected selector
					filter.push($(this).val());
				});
				return filter;
			}

			var clothesValue = '<?php echo $checkClothes ?>';

			$("input[value='" + clothesValue + "']").prop('checked', true);
			filter_data();

			$('.common_selector').click(function(){ // A fuction that needs to run, when it is clicked
				filter_data();
			});


		});
	</script>
	<?php
	require 'bottom.php';
}
?>

</body>


</html>