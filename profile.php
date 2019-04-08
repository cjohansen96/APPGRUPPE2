<?php 
session_start();
require 'includes/dbh.inc.php';

if(!isset($_SESSION['customerId'])){
	header("location: ../APPGRUPPE2/index.php");
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

		<div id="success"> 
			<h3 class="text-center"></h3>
		</div>

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
				<p class="profiletxt"><span class="fas fa-at"></span> Email:</p>
				<?php echo $userArray['Email']; ?>
			</div>

			<div class="col-sm-4 text-center">
				<p class="profiletxt"><span class="fas fa-mobile-alt"></span> Phone:</p>
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
				<div id="error-fname"> 
					<label>First name:</label>
				</div> 
				<input id="fname" type="text" name="name" value="<?php echo $userArray['First_Name'];?>"> <br>

				<div id="error-lname"> 
					<label>Last name:</label>
				</div> 
				<input id="lname" type="text" name="lname" value="<?php echo $userArray['Last_Name'];?>">  <br>

				<div id="error-email"> 
					<label>Email:</label>
				</div> 
				<input id="email" type="text" name="mail" value="<?php echo $userArray['Email'];?>"> <br>

				<div id="error-tlf"> 
					<label>Tlf:</label>
				</div> 
				<input id="tlf" type="text" name="tlf" value="<?php echo $userArray['Phone'];?>"> <br> <br>

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

		<!-- Collapse form for editing password -->
		<div class="collapse" id="editPassword">
			<form action="includes/edit-pwd.inc.php" class="text-center" method="POST">
				<div id="error-oldpass"> 
					<span>Old password:</span>
				</div>
				<input id="oldpass" type="password" name="old-pwd"> <br>

				<div id="error-newpass"> 
					<span>New password:</span>
				</div>
				<input id="newpass" type="password" name="new-pwd"> <br>

				<div id="error-repeatpass"> 
					<span>Repeat password:</span>
				</div>
				<input id="repeatpass" type="password" name="pwd-repeat"> <br> <br>

				<button type="submit" class="btn btn-secondary editbtn" name="pwd-submit">Save
				</button> <br> <br>
			</form>
		</div>

		<hr>
		<br>

		<!--Edit password content -->
		<div class="row">
			<div class="col-sm text-center">
				<h5>Join our monthly quiz, and hava a chance to win cool prices!</h5> <br>
				<p>
					<a class="btn btn-secondary editbtn"href="quiz.php" role="button">
						QUIZ
					</a>
				</p>
			</div>
		</div>

	</div>

</body>

<script>
	$(function() {
  	var loc = window.location.href; // returns the full URL
  	if(/errorpass/.test(loc) ) {
  		$('#editPassword').addClass('show');

  		if(/wrongpassword/.test(loc) ) {
  			$('#oldpass').addClass('input-error');
  			$('#error-oldpass span').text("Old password incorrect!");
  			$('#error-oldpass span').addClass('form-error');
  			alert("Old password incorrect!");
  		}
  		if(/uppercase/.test(loc) ) {
  			$('#newpass').addClass('input-error');
  			$('#error-newpass span').text("Password needs atleast one uppercase!");
  			$('#error-newpass span').addClass('form-error');
  			alert("Password needs atleast one uppercase!");
  		}
  		if(/lowercase/.test(loc) ) {
  			$('#newpass').addClass('input-error');
  			$('#error-newpass span').text("Password needs atleast one lowercase!");
  			$('#error-newpass span').addClass('form-error');
  			alert("Password needs atleast one lowercase!");
  		}
  		if(/onenumber/.test(loc) ) {
  			$('#newpass').addClass('input-error');
  			$('#error-pwd span').text("Password needs atleast one number");
  			$('#error-pwd span').addClass('form-error');
  			alert("Password needs atleast one number");
  		}
  		if(/minimum8/.test(loc) ) {
  			$('#newpass').addClass('input-error');
  			$('#error-newpass span').text("Password needs to be atleast 8 characters long");
  			$('#error-newpass span').addClass('form-error');
  			alert("Password needs to be atleast 8 characters long");
  		}
  		if(/notmatching/.test(loc) ) {
  			$('#repeatpass').addClass('input-error');
  			$('#error-repeatpass span').text("Passwords not matching");
  			$('#error-repeatpass span').addClass('form-error');
  			alert("Passwords not matching");
  		}
  		if(/same/.test(loc) ) {
  			$('#oldpass').addClass('input-error');
  			$('#newpass').addClass('input-error');
  			$('#error-oldpass span').text("Old and new password are the same!");
  			$('#error-oldpass span').addClass('form-error');
  			alert("Old and new password are the same!");
  		}
  	}
  	
  	else {
  		if(/successpass/.test(loc) ) {
  			$('#success').addClass('form-success');
  			$('h3').text("Password changed!");
  		}
  	}

  	if(/errorprofile/.test(loc) ) {
  		$('#editProfile').addClass('show');

  		if(/invalidfname/.test(loc) ) {
  			$('#fname').addClass('input-error');
  			$('#error-fname label').text("Invalid first name");
  			$('#error-fname label').addClass('form-error');
  			alert("Invalid first name");
  		}
  		if(/invalidlname/.test(loc) ) {
  			$('#lname').addClass('input-error');
  			$('#error-lname label').text("Invalid last name");
  			$('#error-lname label').addClass('form-error');
  			alert("Invalid last name");
  		}
  		if(/invalidmail/.test(loc) ) {
  			$('#email').addClass('input-error');
  			$('#error-email label').text("Invalid mail");
  			$('#error-email label').addClass('form-error');
  			alert("Invalid mail");
  		}
  		if(/invalidtlf/.test(loc) ) {
  			$('#tlf').addClass('input-error');
  			$('#error-tlf label').text("Invalid phone number");
  			$('#error-tlf label').addClass('form-error');
  			alert("Invalid phone number");
  		}
  	}
  	else {
  		if(/successprofile/.test(loc) ) {
  			$('#success').addClass('form-success');
  			$('h3').text("Profile changed!");
  		}
  	}
  });
</script>

<?php
require 'bottom.php';
?>
</html>