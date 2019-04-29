<?php
if(isset($_POST['save-submit'])) {

  session_start();
	require 'dbh.inc.php';

  $name = $_POST['name'];
  $lastName = $_POST['lname'];
  $email = $_POST['mail'];
  $tlfNumber = $_POST['tlf'];

// Inndatavalidering
  
  if (empty($name) || empty($lastName) || empty($email) || empty($tlfNumber)) {
    header("Location: ../profile.php?errorprofile=emptyfields");
    exit();
  }
  	if (!preg_match("/^[a-zA-ZæøåÆØÅ]*$/", $name)) {
    	header("Location: ../profile.php?errorprofile=invalidfname");
    	exit();
  	}
  	else if (!preg_match("/^[a-zA-ZæøåÆØÅ]*$/", $lastName)) {
    	header("Location: ../profile.php?errorprofile=invalidlname");
    	exit();
  	}
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: ../profile.php?errorprofile=invalidmail");
      exit();
    }
  	else if (!preg_match("/^[0-9]{8}+$/", $tlfNumber)) {
    	header("Location: ../profile.php?errorprofile=invalidltlf");
    	exit();
  	}  

    else {
      
      $id = $_SESSION['customerId'];
      
      $sql = "UPDATE Customer SET First_Name=?, Last_Name=?, Email=?, Phone=? WHERE IdCustomer ='$id'";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../profile.php?errorprofile=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $lastName, $email, $tlfNumber); 

        mysqli_stmt_execute($stmt);
        header("Location: ../profile.php?update=successprofile");
        exit();
      }
      
    }
}

else {
	header("Location: ../profile.php");
	exit();
}