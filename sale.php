<?php

	session_start();
	require 'includes/dbh.inc.php';
	require 'top.php';

	?>
	<!DOCTYPE html>
	<html>
	<head>    
		<title>Clothes</title>
		<link rel="stylesheet" type="text/css" href="css/style_clothes.css">
	</head>
	<body>   
		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-md-3">  
					<div class="list-group">
						<h1  class="text-center"> Filter <span style="font-size: 0.8em;" class="fas fa-sliders-h"></span></h1> <br>

						<button style="margin-top: 5px;" class="search_submit btn btn-primary clear_filter" id="clearbtn">Clear Filter <i style="font-size: 0.8em" class="fas fa-undo-alt"></i></button>

						<!-- Filter søk -->
						<div class="list-group text-center">

						<a class="btn btn-primary" data-toggle="collapse" href="#collapseSearch" role="button" aria-expanded="false" aria-controls="collapseSearch">
							Search <i style="font-size: 0.8em" class="fas fa-search"></i>
						</a>
						<div class="collapse" id="collapseSearch">		
							<span>Search:</span>
							<input id="search">
							<button style="margin-top: 5px; width: 70px;" class="search_submit btn btn-primary"><span class="fas fa-search"></span></button>
						</div>
						</div> 

						<!-- Filter pris -->
						<div class="list-group text-center">

						<a class="btn btn-primary" data-toggle="collapse" href="#collapsePrice" role="button" aria-expanded="false" aria-controls="collapsePrice">
							Price <i style="font-size: 0.8em" class="fas fa-euro-sign"></i>
						</a>
						<div class="collapse" id="collapsePrice">		
							<span>Min price:</span>
							<input id="minimum_price" value="1">
							<br>
							<span>Max price:</span>
							<input id="maximum_price" value="1000">
							<button style="margin-top: 5px;" class="price_submit btn btn-primary">Submit</button>
						</div>
						</div> 

						<!-- Filter category-->
						<a class="btn btn-primary" data-toggle="collapse" href="#collapseCategory" role="button" aria-expanded="false" aria-controls="collapseCategory">

							Category <i style="font-size: 0.8em" class="fas fa-book"></i>
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

					<!-- Filter brand-->
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

					<!-- Filter color-->
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

					<!-- Filter size-->
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

				<!-- Content for klær -->
				<div class="col-md-9">
					<br />
					<div class="row filter_data">

					</div>
				</div>
			</div>

		</div>


		<script>
		//Jquery kode for filtrering
		$(document).ready(function(){ 

			filter_data();

			function filter_data()
			{
				var actionSale = 'fetch_data';
				var search = $('#search').val();
				var minimum_price = $('#minimum_price').val();
				var maximum_price = $('#maximum_price').val();
				var category = get_filter('category');
				var brand = get_filter('brand');
				var color = get_filter('color');
				var size = get_filter('size');

				// Ajax kode
				$.ajax({ 
					url:"includes/fetch_data.inc.php",
					method:"POST",
					data:{actionSale:actionSale, search:search, minimum_price:minimum_price, maximum_price:maximum_price,category:category, brand:brand, color:color, size:size}, 
					success:function(data){		
						$('.filter_data').html(data); 
					}
				});
			}

			function get_filter(class_name)
			{
				var filter = [];
				$('.'+class_name+':checked').each(function(){ 
					filter.push($(this).val());
				});
				return filter;
			}

			$('.common_selector').click(function(){ 
				filter_data();
			});

			$('.price_submit').click(function(){
				filter_data();
			});

			$('.search_submit').click(function(){
				filter_data();
			});

			$('.clear_filter').click(function(){
				var category = get_filter('category');
				var brand = get_filter('brand');
				var color = get_filter('color');
				var size = get_filter('size');

  				$("#search").val("");
  				$("#minimum_price").val("1");
  				$("#maximum_price").val("1000");

				for (var i = 0; i < category.length; i++) {
					$("input[value='" + category[i] + "']").prop('checked', false);
				}
				for (var i = 0; i < brand.length; i++) {
					$("input[value='" + brand[i] + "']").prop('checked', false);
				}
				for (var i = 0; i < color.length; i++) {
					$("input[value='" + color[i] + "']").prop('checked', false);
				}
				for (var i = 0; i < size.length; i++) {
					$("input[value='" + size[i] + "']").prop('checked', false);
				}

				filter_data();
			});


		});
	</script>
	<?php
	require 'bottom.php';

?>

</body>


</html>