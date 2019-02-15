<?php
	session_start();

	require "includes/dbh.inc.php";
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style_profile.css">
	<title></title>
</head>
<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <a class="navbar-brand" href="#">EXIZT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">MENS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">WOMAN</a>
      </li>   
    </ul>
  </div>  
</nav>
<br>

<!-- Content for the profile -->
<div class="container contentbox"> <br>
	<h2 class="text-center">MY PROFILE</h3>
		<br>
	<div class="row">
		<div class="col-sm text-center">
			<p class="profiletxt">Name:</p>
			<p>Negro negros</p>
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