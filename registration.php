<?php
session_start();
if (isset($_SESSION['customerId'])) {
	header("Location: ../APPGRUPPE2/index.php");
	exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0">
	<title>Exizt Registration</title>
</head>
<?php
require 'top.php';
?>
<link rel="stylesheet" type="text/css" href="css/style_reg.css">
<body style="background: url('Bilder/bg3.jpg') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;">
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12 col-md-12 col-lg-12 text-center" style="padding:0px;margin:0px;">
				<h1>Sign Up</h1>
				<p>Already have an account? 
					<a href="login.php" id="linktxt">Login Here ></a></p>	
					<h4>Fill Out Form</h4>
					<form action="includes/registration.inc.php" method="post" >
						<p>
							<input type="text" name="name" placeholder="First name">
						</p>
						<p>
							<input type="text" name="lname" placeholder="Last name">
						</p>
						<p>
							<input type="text" name="mail" placeholder="Email" class="validate">
						</p>
						<p>
							<input type="text" name="tlf" placeholder="Phone number">
						</p>
						<p>
							<input type="password" name="pwd" placeholder="Password">
						</p>
						<p>
							<input type="password" name="pwd-repeat" placeholder="Confirm Password">
						</p>

						<p>
							<input type="checkbox" name="checkbox" value="check" id="agree">
						</p>

						<p> I have read and agree to the Terms and<br> Conditions and Privacy Policy</p>


						<p class="btn">
							<button type="submit" name="reg-submit">Submit</button>

						</p>
					</form>
				</div>

			</div>
		</div>
	</body>
	<?php
	require 'bottom.php';
	?>
	</html>