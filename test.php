<?php
	require 'includes/dbh.inc.php';


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php

		$sql = "SELECT * FROM Clothes WHERE Gender = 'M'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);

		if ($resultCheck > 0) {

			while ($row = mysqli_fetch_assoc($result)) {
				?>

		<img src="Bilder/<?php echo $row["ProductImage"]; ?>" width="200" height="200">
		Name: <?php echo $row["Name"];?>




	<?php			
		}
	}

	?>

</body>
</html>