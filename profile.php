<?php 
session_start();
require 'includes/dbh.inc.php';

if(!isset($_SESSION['customerId'])){
	header("location: ../APPGRUPPE2/index.php");
	exit();
}

/* Hente score i en variabel */
$customerScore = 0;

if (isset($_GET['score'])) {
	$customerScore = $_GET['score'];
}

/* Spørring for å hente brukerinformasjon */
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

/* Spørring for quiz */
$sql = "SELECT * FROM CustomerScore WHERE Customer_IdCustomer = '$id' AND Category_IdCategory = 2";

$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
$quizTaken = false;

if ($resultCheck > 0) {
	$quizTaken = true;
}

/* Spørring for å sjekke om refer a friend er gjort */

$query = "SELECT C.IdCustomer AS Cid, C.First_Name, C.Email, O.IdOrder, O.IdCustomer, RF.refereId AS Rid, RF.Email, RF.IdCustomer AS Rfid FROM Customer AS C INNER JOIN Orders AS O ON C.IdCustomer = O.IdCustomer INNER JOIN Refere_Friend AS RF ON C.Email = RF.Email";

$result = mysqli_query($conn,$query);

$friendRefered = false;
while ($row = mysqli_fetch_assoc($result)) 
{
	if($row['Rfid'] == $id) {
		$friendRefered = true;
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
				<h5 id="refer-text"></h5> <br>
				<p>
					<a id="refer-button" class="btn btn-secondary editbtn" data-toggle="collapse" href="#referFriend" role="button" aria-expanded="false" 	aria-controls="	collapseExample">
						REFER A FRIEND
					</a>
				</p>
			</div>
		</div>

		<!-- Collapse form for refering a friend -->
		<div class="collapse" id="referFriend">
			<form action="includes/refer_friend.inc.php" class="text-center" method="POST">
				<p> Refer a friend and get 30% cupon on any clothes you want! </p>
				<h4> Here is how: </h4>
				<p>
					<a class="btn btn-secondary editbtn" data-toggle="collapse" href="#referHelp" role="button" aria-expanded="false" 	aria-controls="	collapseExample">
						Steps
					</a>
				</p>
				<div class="collapse" id="referHelp">
				<p>	Step 1: Type in your friends email.</p>
				<p>	Step 2: Make your friend register on the site.</p>
				<p>	Step 3: Make your friend order something on the site</p>
				<p>	Step 4: When step 1,2,3 is done you will get a cupon option on the checkout site!</p>
				<p>	Step 5: Enjoy 30% off!!</p>
				</div>
				<div id="error-oldpass"> 
					<span>Your friends email:</span>
				</div>
				<input  type="text" name="email"> <br>

				<button type="submit" class="btn btn-secondary editbtn" name="refer_submit">Refer
				</button> <br> <br> 
			</form>
		</div>

		<hr>
		<br>

		<!--QUIZ CONTENT -->
		<div class="row">
			<div class="col-sm text-center">
				<h5 id="quiz-text">Join our monthly quiz, and hava a chance to win cool prices!</h5> <br>
				<p>
					<a id="quiz-button" class="btn btn-secondary editbtn"href="quiz.php" role="button">
						QUIZ
					</a>
				</p>
			</div>
		</div>

	</div>

</body>

<script>

	$(function() { // Funksjon for quiz
	var quizTaken = '<?php echo $quizTaken ?>';
	if (quizTaken) {
		$('#quiz-button').addClass('disabled');
		$('#quiz-text').text('You have already taken this monthly quiz');
	}

	var friendRefered = '<?php echo $friendRefered ?>';
	if (friendRefered) {
		$('#refer-button').addClass('disabled');
		$('#refer-text').text('You have already refered your friend!');
	}

  	var loc = window.location.href; // Retunerer urlen
  	if(/errorpass/.test(loc) ) { // Inndatavalideringer -->
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

  		if(/emptyfields/.test(loc) ) {
  			$('#fname').addClass('input-error');
  			$('#lname').addClass('input-error');
  			$('#email').addClass('input-error');
  			$('#tlf').addClass('input-error');
  			alert("Fill in all fields!");
  		}

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

  	if(/quizsubmitted/.test(loc)) {
  		var customerScore = '<?php echo $customerScore; ?>';
  		$('#success').addClass('form-success');
  		$('h3').text("Quiz submitted! Score = " + customerScore + "/5");

  		if (customerScore == 5) {
  			$('h3').text("Quiz submitted! Full score, " + customerScore + "/5" + " you are in the draw!");
  		}
  		else {
  			$('h3').text("Quiz submitted! Score= " + customerScore + "/5" + " sorry, you are not cut for the draw!");
  		}

  	}
  });
</script>

<?php
require 'bottom.php';
?>
</html>