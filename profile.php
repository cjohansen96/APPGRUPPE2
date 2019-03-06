<?php
	session_start();

	require "includes/dbh.inc.php";

        if (!isset($_SESSION['email'])) {
			header("Location: ../index.php");
            exit();
        }
        else if (isset($_SESSION['email'])) {
			$userId = $_SESSION['Email'];
			$sqlName = "SELECT First_name FROM Customer WHERE Email = 'christofferjohansen12@gmail.com'";
			$result = mysqli_query($conn, $sqlName);

        } 		
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style_profile.css">
<?php
	include 'top.php';
?>
	<title></title>
</head>
<body>
<!-- Content for the profile -->
<div class="container contentbox"> <br>
	<h2 class="text-center">MY PROFILE</h3>
		<br>

	<div class="row">
		<div class="col-sm text-center">
			<p class="profiletxt">Name:</p>
			<?php
				if ($result->num_rows > 0) {
    				// output data of each row
    				while($row = $result->fetch_assoc()) {
						echo "Name:".$row[First_name];
					}
				}
			?>
		</div>

		<div class="col-sm text-center">
			<p class="profiletxt">Email:</p>
			<p>negro@gmail.com</p>
		</div>

		<div class="col-sm text-center">
			<p class="profiletxt">Tlf:</p>
			<p>13371337</p>
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
				<form action="includes/edit-profile.inc.php" class="text-center">
				   <label>First name:</label> <br>
				   <input type="text" name="name"> <br>

				   <label>Last name:</label> <br>
				   <input type="text" name="lname"> <br>

				   <label>Email:</label> <br>
				   <input type="text" name="mail"> <br>

				   <label>Tlf:</label> <br>
				   <input type="text" name="tlf"> <br> <br>

				   <button type="button" class="btn btn-secondary editbtn" name="save-submit">Save
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
				<form action="includes/edit-pwd-inc.php" class="text-center">
				   <label>New password:</label> <br>
				   <input type="password" name="pwd"> <br>
				   <label>Repeat new password:</label> <br>
				   <input type="password" name="pwd-repeat"> <br> <br>

				   <button type="button" class="btn btn-secondary editbtn" name="pwd-submit">Save
				   </button> <br> <br>
				</form>
		</div>



</div>
	




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>