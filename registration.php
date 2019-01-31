
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0">
	<link rel="stylesheet" type="text/css" href="css/style_registration.css">
	<title>Exizt Registration</title>
</head>
<body>


	<div class="container">
		
		<div class="grid">

			
			<section class="section-1">

				<div class="brand">
					<img src="#" alt="">
				</div>
				<h1>Sign Up</h1>
				<p>Already have an account? <a href="index.php">Click Here ></a></p>	
			</section>
			
			<section class="section-2">
				<h4>Fill Out Form</h4>
				<form action="includes/registration.inc.php" method="post">
					<p>
						<input type="text" name="name" placeholder="First name">
					</p>
					<p>
						<input type="text" name="lname" placeholder="Last name">
					</p>
					<p>
						<input type="text" name="mail" placeholder="Email">
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
					
					<p class="btn">
						<button type="submit" name="reg-submit">Submit</button>

					</p>
				</form>
			</section>
		

		</div>
	</div>

</body>
</html>