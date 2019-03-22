<?php
session_start();
require 'includes/dbh.inc.php';

if(!isset($_SESSION['customerId'])){
	header("location: ../index.php");
	exit();
}


$id = $_SESSION['customerId'];
$sql = "SELECT * FROM CustomerScore WHERE Customer_IdCustomer ='$id' AND Category_IdCategory";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) {
    header("Location: ../APPGRUPPE2/profile.php");
    exit();
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Quiz</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style_profile.css">
</head>
<body>
	<?php
	require 'top.php';
	?>

	<div class="container contentbox"> <br>
		<h2 class="text-center" style="color: black;"> Welcome to the monthly contest, <?php echo $_SESSION['name'];  ?>. This months quiz is about SPACE</h2>
		<br>

		<div class="row">
			<div class="col-sm text-center">
				<p class="profiletxt">To have a chance to win cool prices, answer correct on all the question. You only have one chance, so answer carefully. Good luck!</p>
			</div>
		</div>
		<br> <br>

		<div class="row">
			<div class="col-sm text-center">
				<form  method="post" action="includes/quiz.inc.php">
					<?php
					$sql = "SELECT * FROM QuizQuestion WHERE Category_IdCategory = 1";
					$result = mysqli_query($conn, $sql);
					$counter = 1;

					while ($row = mysqli_fetch_assoc($result)) {?>

						<h5> <?php echo $row['Question'];?></h5>
						<?php echo $row['Option 1'];?> <input type="radio" name="ans_<?php echo $counter;?>" value="<?php echo $row['Option 1'];?>"/>
						<br/>
						<?php echo $row['Option 2'];?> <input type="radio" name="ans_<?php echo $counter;?>" value="<?php echo $row['Option 2'];?>"/>
						<br/>
						<?php echo $row['Option 3'];?> <input type="radio" name="ans_<?php echo $counter;?>" value="<?php echo $row['Option 3'];?>"/>
						<br/>
						<?php echo $row['Option 4'];?> <input type="radio" name="ans_<?php echo $counter;?>" value="<?php echo $row['Option 4'];?>"/>
						<br/> <br>
						<?php 
						$counter++;
					} 
					?>


					<button type='submit' name="quiz-submit">Submit</button>
				</form>
			</div>
		</div>
	</div>


	<?php
	require 'bottom.php';
	?>
</body>
</html>