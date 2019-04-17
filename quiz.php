<?php
session_start();
require 'includes/dbh.inc.php';

if(!isset($_SESSION['customerId'])){
	header("Location: ../APPGRUPPE2/index.php");
	exit();
}


$id = $_SESSION['customerId'];
$sql = "SELECT * FROM CustomerScore WHERE Customer_IdCustomer ='$id' AND Category_IdCategory = 2";
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
	<link rel="stylesheet" type="text/css" href="css/style_quiz.css">
	
</head>
<body style="background: url('Bilder/worldmapbg.jpg') no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  background-size: cover;
  -o-background-size: cover;">
	<?php
	require 'top.php';
	?>
	

	<div class="container contentbox col-lg-6 col-md-8 col-sm-12" style="margin-bottom: 20px; margin-top: 20px; background-color: rgba(232, 232, 232, 0.9);"> <br>
		<h2 class="text-center" style="color: black;"> Welcome to the monthly contest, <?php echo $_SESSION['name'];  ?>. This months quiz is about GEOGRAPHY</h2>
		<br>

		<div class="row">
			<div class="col-sm text-center">
				<p class="profiletxt">To have a chance to win cool prices, answer correct on all the questions. You only have one chance, so answer carefully. Good luck!</p>
			</div>
		</div>
		<br> <br>

		<div class="row">
			<div class="col-sm text-center">
				<form  method="post" action="includes/quiz.inc.php">
					<?php
					$sql = "SELECT * FROM QuizQuestion WHERE Category_IdCategory = 2";
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


					<button class="btn btn-default qbt" type='submit' name="quiz-submit" style="margin-bottom: 10px; ">Submit</button>
				</form>
			</div>
		</div>
	</div>


	<?php
	require 'bottom.php';
	?>
</body>
</html>