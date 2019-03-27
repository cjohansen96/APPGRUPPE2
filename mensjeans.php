<!DOCTYPE html>
<html>
<head>    
	<title>Clothes</title>
</head>


<?php
require 'includes/dbh.inc.php';
require 'top.php';
?>

<body>   <!-- Page Content -->
	<div class="container">
		<div class="row">
			<div class="col-md-3">     
				<div class="list-group">
					<h3>Brand</h3>
					<div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
						<?php

						$query = "SELECT DISTINCT(Brand) FROM Clothes";
						$result = mysqli_query($conn,$query);

						while ($row = mysqli_fetch_assoc($result)) 
						{
							?>
							<div class="list-group-item checkbox">
								<label><input type="checkbox" class="common_selector brand" value="<?php echo $row['Brand']; ?>"  > <?php echo $row['Brand']; ?></label>
							</div>
							<?php
						}

						?>
					</div>
				</div>

				<div class="list-group">
					<h3>Category</h3>
					<?php

					$query = "
					SELECT DISTINCT(Category) FROM Clothes";
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

				<div class="list-group">
					<h3>Color</h3>
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

			<div class="col-md-9">
				<br />
				<div class="row filter_data">

				</div>
			</div>
		</div>

	</div>

	<script>
		$(document).ready(function(){

			filter_data();

			function filter_data()
			{
				var action = 'fetch_data';
				var brand = get_filter('brand');
				var category = get_filter('category');
				var color = get_filter('color');
				$.ajax({
					url:"includes/fetch_data.inc.php",
					method:"POST",
					data:{action:action, brand:brand, category:category, color:color},
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

		});
	</script>
	<?php
	require 'bottom.php';
	?>

</body>


</html>