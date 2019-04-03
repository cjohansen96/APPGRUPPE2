<?php 
	session_start();
	require 'includes/dbh.inc.php';

	if(!isset($_SESSION['customerId'])){
		header("location: ../index.php");
		exit();
	}

	$userArray = array();

	$id = $_SESSION['customerId'];
	$sql = "SELECT * FROM Customer WHERE IdCustomer ='$id'";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$userArray['First_Name'] = $row['First_Name'];
			$userArray['Last_Name'] = $row['Last_Name'];
			$userArray['Email'] = $row['Email'];
			$userArray['Phone'] = $row['Phone'];
		}
	}


?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

<?php
	require 'top.php';
?>
<link rel="stylesheet" type="text/css" href="css/style_profile.css">

	<title>My profile</title>
</head>
<body>
<!-- Content for the profile -->
<div class="container contentbox"> <br>
	<h2 class="text-center" style="color: black;"> MY PROFILE </h2>
		<br>
	<div class="row">
		<div class="col-sm-4 text-center">
			<img src="Bilder/avatar-orange.png">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4 text-center">
			<p class="profiletxt">Name:</p>
			<?php echo $userArray['First_Name'] . " " . $userArray['Last_Name'];  ?>
		</div>

		<div class="col-sm-4 text-center">
			<p class="profiletxt">Email:</p>
			<?php echo $userArray['Email']; ?>
		</div>

		<div class="col-sm-4 text-center">
			<p class="profiletxt">Tlf:</p>
			<?php echo $userArray['Phone']; ?>
			<br> <br>
		</div>

	</div>

<!-- Edit profile content -->
	<div class="row">
		<div class="col-sm text-center">
		  <p>
			<a class="btn btn-secondary editbtn" data-toggle="collapse" href=	"#editProfile" role="button" aria-expanded="false" 	aria-controls="	collapseExample">
    		EDIT PROFILE
  			</a>
		  </p>
		</div>
	</div>
<!-- Collapse form for editing profile -->
		<div class="collapse" id="editProfile">
				<form action="includes/edit-profile.inc.php" class="text-center" method="POST">
				   <label>First name:</label> <br>
				   <input type="text" name="name" value="<?php echo $userArray['First_Name'];?>"> <br>

				   <label>Last name:</label> <br>
				   <input type="text" name="lname" value="<?php echo $userArray['Last_Name'];?>">  <br>

				   <label>Email:</label> <br>
				   <input type="text" name="mail" value="<?php echo $userArray['Email'];?>"> <br>

				   <label>Tlf:</label> <br>
				   <input type="text" name="tlf" value="<?php echo $userArray['Phone'];?>"> <br> <br>

				   <button type="submit" class="btn btn-secondary editbtn" name="save-submit">Save
				   </button> <br> <br>
				</form>
		</div>

	<hr>
	<br>	

<!--Edit password content -->
	<div class="row">
		<div class="col-sm text-center">
		  <p>
			<a class="btn btn-secondary editbtn" data-toggle="collapse" href=	"#editPassword" role="button" aria-expanded="false" 	aria-controls="	collapseExample">
    		CHANGE PASSWORD
  			</a>
		  </p>
		</div>
	</div>

	<!-- Collapse form for editing profile -->
		<div class="collapse" id="editPassword">
				<form action="includes/edit-pwd.inc.php" class="text-center" method="POST">
				   <label>New password:</label> <br>
				   <input type="password" name="pwd"> <br>
				   <label>Repeat new password:</label> <br>
				   <input type="password" name="pwd-repeat"> <br> <br>

				   <button type="submit" class="btn btn-secondary editbtn" name="pwd-submit">Save
				   </button> <br> <br>
				</form>
		</div>

	</div>

</body>
<?php
		require 'bottom.php';
	?>
</html>