<?php
if (isset($_POST['pwd-submit'])) {
  
  session_start();
  require 'dbh.inc.php';

  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];


  if ($password !== $passwordRepeat) {
    header("Location: ../profile.php?error=passwordnotalike");
    exit();
  }

  else {
  	$id = $_SESSION['customerId'];
  	$sql = "UPDATE Customer SET Password=? WHERE IdCustomer = '$id' ";
  	$stmt = mysqli_stmt_init($conn);

  	if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../profile.php?error=sqlerror1");
        exit();
    }
    else {
    	$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    	mysqli_stmt_bind_param($stmt, "s", $hashedPwd);

    	mysqli_stmt_execute($stmt);
        header("Location: ../profile.php?registration=success");
        exit();
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);


}
else {
    header("Location: ../profile.php");
    exit();
}