<?php
if(isset($_POST['edit-submit'])) {

	require 'dbh.inc.php';

  	$name = $_POST['name'];
  	$lastName = $_POST['lname'];
  	$email = $_POST['mail'];
  	$tlfNumber = $_POST['tlf'];

// Validation
  	if (empty($name) || empty($lastName) || empty($email) || empty($tlf)) {
  		header("Location: ../profile.php?error=emptyfields&name".$name."&mail=".$email)
  	}
  	else if (!preg_match("/^[a-zA-Z]*$/", $name) && !preg_match("/^[a-zA-Z]*$/", $lastName) && !preg_match("/^[0-9]*$/", $tlfNumber) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	header("Location: ../registration.php?error=invalidnamelnametlfemail");
    	exit();
 	}
  	else if (!preg_match("/^[a-zA-Z]*$/", $name)) {
    	header("Location: ../registration.php?error=invalidname&name=".$name);
    	exit();
  	}
  	else if (!preg_match("/^[a-zA-Z]*$/", $lastName)) {
    	header("Location: ../registration.php?error=invalidlname&lname=".$LastName);
    	exit();
  	}
  	else if (!preg_match("/^[0-9]*$/", $tlfNumber)) {
    	header("Location: ../registration.php?error=invalidltlf&tlf=".$tlfNumber);
    	exit();
  	}  
  	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    	header("Location: ../registration.php?error=invalidmail&mail=".$email);
    	exit();
  	}









}
else {
	header("Location: ../profile.php");
	exit();
}