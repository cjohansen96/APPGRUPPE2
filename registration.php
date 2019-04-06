<?php
session_start();
if (isset($_SESSION['customerId'])) {
	header("Location: ../APPGRUPPE2/index.php");
	exit();
}

require 'top.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0">
	<title>Exizt Registration</title>

	<script>
		$(function() {
  var loc = window.location.href; // returns the full URL
  if(/invalidfname/.test(loc) ) {
  	$('#reg-fname').addClass('input-error');
  	$('#error-fname span').text("Invalid first-name");
  	$('#error-fname span').addClass('form-error');
  }
  if(/invalidlname/.test(loc) ) {
  	$('#reg-lname').addClass('input-error');
  	$('#error-lname span').text("Invalid last-name");
  	$('#error-lname span').addClass('form-error');
  }
  if(/invalidmail/.test(loc) ) {
  	$('#reg-mail').addClass('input-error');
  	$('#error-mail span').text("Invalid mail");
  	$('#error-mail span').addClass('form-error');
  }
  if(/uppercase/.test(loc) ) {
  	$('#reg-pwd').addClass('input-error');
  	$('#error-pwd span').text("Password needs atleast one uppercase!");
  	$('#error-pwd span').addClass('form-error');
  }
  if(/lowercase/.test(loc) ) {
  	$('#reg-pwd').addClass('input-error');
  	$('#error-pwd span').text("Password needs atleast one lowercase!");
  	$('#error-pwd span').addClass('form-error');
  }
  if(/onenumber/.test(loc) ) {
  	$('#reg-pwd').addClass('input-error');
  	$('#error-pwd span').text("Password needs atleast one number");
  	$('#error-pwd span').addClass('form-error');
  }
  if(/minimum8/.test(loc) ) {
  	$('#reg-pwd').addClass('input-error');
  	$('#error-pwd span').text("Password needs to be atleast 8 characters long");
  	$('#error-pwd span').addClass('form-error');
  }
  if(/notmatching/.test(loc) ) {
  	$('#reg-pwdRepeat').addClass('input-error');
  	$('#error-pwdRepeat span').text("Passwords not matching");
  	$('#error-pwdRepeat span').addClass('form-error');
  }
});
</script>

</head>
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
				<a href="#modalLoginForm" data-toggle="modal" id="linktxt">Login Here ></a></p>	
				<h4>Fill Out Form</h4>

				<form action="includes/registration.inc.php" method="post">

					<div id="error-fname"> 
						<span>First-name:</span>
					</div>

					<?php
					if (isset($_GET['name'])) {
						$name = $_GET['name'];
						echo '<p><input id="reg-fname" type="text" name="name" placeholder="First name" value="' . $name . '"></p>';
					}
					else{
						echo '<p><input id="reg-fname" type="text" name="name" placeholder="First name"></p>';
					}
					?>

					<div id="error-lname"> 
						<span>Last-name</span>
					</div>

					<?php
					if (isset($_GET['lname'])) {
						$lname = $_GET['lname'];
						echo '<p><input id="reg-lname" type="text" name="lname" placeholder="Last name" value="' . $lname . '"></p>';
					}
					else{
						echo '<p><input id="reg-lname" type="text" name="lname" placeholder="Last name"></p>';
					}
					?>

					<div id="error-mail"> 
						<span>Email:</span>
					</div>

					<?php
					if (isset($_GET['mail'])) {
						$email = $_GET['mail'];
						echo '<p><input id="reg-mail" type="text" name="mail" placeholder="Email" value="' . $email . '"></p>';
					}
					else {
						echo '<p><input id="reg-mail" type="text" name="mail" placeholder="Email"></p>';
					}
					?>

					<div id="error-tlf"> 
						<span>Phone number</span>
					</div>

					<?php
					if (isset($_GET['tlf'])) {
						$tlf = $_GET['tlf'];
						echo '<p><input id="reg-tlf" type="text" name="tlf" placeholder="Phone number" value="' . $tlf . '"></p>';
					}
					else{
						echo '<p><input id="reg-tlf" type="text" name="tlf" placeholder="Phone number"></p>';
					}

					?>

					<div id="error-pwd"> 
						<span>Password:</span>
					</div>

					<p>
						<input id="reg-pwd" type="password" name="pwd" placeholder="Password">
					</p>

					<div id="error-pwdRepeat"> 
						<span>Repeat password:</span>
					</div>

					<p>
						<input id="reg-pwdRepeat" type="password" name="pwd-repeat" placeholder="Confirm Password">
					</p>

					<p>
						<input type="checkbox" name="checkbox" value="check" id="agree">
					</p>
					
					<p class="check"> I have read and agree to the Terms and<br> Conditions and Privacy Policy</p>
					
					
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
