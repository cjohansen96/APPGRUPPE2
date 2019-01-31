
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
				<p>Already have an account?</p>
				<div class="logIn-link">
					<a href="">Log In here ></a>
				</div>
			</section>

			<section class="section-2">
				<h4>Fill Out Form</h4>
				<form action="includes/registration.inc.php" method="post">
					<p>
						<label>First name</label>
						<input type="text" name="name">
					</p>
					<p>
						<label>Last name</label>
						<input type="text" name="lname">
					</p>
					<p>
						<label>Email</label>
						<input type="text" name="mail">
					</p>
					<p>
						<label>Phone number</label>
						<input type="text" name="tlf">
					</p>
					<p>
						<label>Password</label>
						<input type="password" name="pwd">
					</p>
					<p>
						<label>Confirm Password</label>
						<input type="password" name="pwd-repeat">
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