<?php
if(isset($_POST['save-submit'])) {

  session_start();
	require 'dbh.inc.php';

  $name = $_POST['name'];
  $lastName = $_POST['lname'];
  $email = $_POST['mail'];
  $tlfNumber = $_POST['tlf'];

// Validation
  /*
  	if (empty($name) || empty($lastName) || empty($email) || empty($tlf)) {
  		header("Location: ../profile.php?errorfag=emptyfields&name".$name."&mail=".$email);
      exit();
  	}*/
  	if (!preg_match("/^[a-zA-Z]*$/", $name) && !preg_match("/^[a-zA-Z]*$/", $lastName) && !preg_match("/^[0-9]*$/", $tlfNumber) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	header("Location: ../profile.php?error=invalidnamelnametlfemail");
    	exit();
 	  }
  	else if (!preg_match("/^[a-zA-Z]*$/", $name)) {
    	header("Location: ../profile.php?error=invalidname&name=".$name);
    	exit();
  	}
  	else if (!preg_match("/^[a-zA-Z]*$/", $lastName)) {
    	header("Location: ../profile.php?error=invalidlname&lname=".$LastName);
    	exit();
  	}
  	else if (!preg_match("/^[0-9]*$/", $tlfNumber)) {
    	header("Location: ../profile.php?error=invalidltlf&tlf=".$tlfNumber);
    	exit();
  	}  
  	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	header("Location: ../profile.php?error=invalidmail&mail=".$email);
    	exit();
  	}

    else {
      
      $id = $_SESSION['customerId'];
      
      $sql = "UPDATE Customer SET First_Name=?, Last_Name=?, Email=?, Phone=? WHERE IdCustomer ='$id'";
      $stmt = mysqli_stmt_init($conn);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../profile.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "ssss", $name, $lastName, $email, $tlfNumber); 

        mysqli_stmt_execute($stmt);
        header("Location: ../profile.php?update=success");
        exit();
      }
      
    }
}

else {
	header("Location: ../profile.php");
	exit();
}