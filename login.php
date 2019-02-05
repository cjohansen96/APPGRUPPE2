<?php
	session_start();

	require "includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0">
	<link rel="stylesheet" type="text/css" href="css/style_login.css">
	<title>Login</title>
</head>
<body>

	<div class="container">
		<div class="box">
			<section class="section-1">
				<div class="brand">
					<img src="#" alt="">
				</div>
				<h1>LogIn</h1>
				<p>Don't have an account? <a class="SignUp-link"s href="registration.php">Sign Up Here</a></p>
			</section>

			<section class="section-2">
				<form action="includes/login.inc.php" method="post">
					<p>
						<input type="text" name="mail" placeholder="E-mail">
					</p>
					<p>
						<input type="password" name="pwd" placeholder="Password">
					</p>
					<p class="btn">
						<button type="submit" name="login-submit">LogIn</button>
					</p>
				</form>
			<p class="last-p">
			<a class="forgot-link"href="#">Forgot e-mail or password?</a>
			</p>
			</section>
			<section class="footer">
				
				<!-- Whitespace  -->
				<!-- Bare test for å se om bruker får logget inn -->
          	<?php
          		if (!isset($_SESSION['email'])) {
            		echo '<p>You are logged out!</p>';
          		}
          		else if (isset($_SESSION['email'])) {
            		echo '<p>You are logged in!</p>';
          		}
          	?>
			
			</section>
		</div>
	</div>


	
</body>
</html>