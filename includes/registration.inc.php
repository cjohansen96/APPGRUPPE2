<?php
if (isset($_POST['reg-submit'])) {


  require 'dbh.inc.php';

  $name = $_POST['name'];
  $lastName = $_POST['lname'];
  $email = $_POST['mail'];
  $tlfNumber = $_POST['tlf']; 
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];


  // Inndatavalideringer
  if (empty($name) || empty($lastName) || empty($email) || empty($tlfNumber) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../registration.php?error=emptyfields");
    exit();
  }
  else if (!preg_match("/^[a-zA-ZæøåÆØÅ]*$/", $name)) {
    header("Location: ../registration.php?error=invalidfname");
    exit();
  }
  else if (!preg_match("/^[a-zA-ZæøåÆØÅ]*$/", $lastName)) {
    header("Location: ../registration.php?error=invalidlname&name=$name");
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../registration.php?error=invalidmail&name=$name&lname=$lastName");
    exit();
  }
  else if (!preg_match("/^[0-9]{8}+$/", $tlfNumber)) {
    header("Location: ../registration.php?error=invalidtlf&name=$name&lname=$lastName&mail=$email");
    exit();
  }  
  elseif (!preg_match('@[A-Z]@', $password)) {
    header("Location: ../registration.php?error=uppercase&name=$name&lname=$lastName&mail=$email&tlf=$tlfNumber");
    exit();
  }
  elseif (!preg_match('@[a-z]@', $password)) {
    header("Location: ../registration.php?error=lowercase&name=$name&lname=$lastName&mail=$email&tlf=$tlfNumber");
    exit();
  }
  elseif (!preg_match('@[0-9]@', $password)) {
    header("Location: ../registration.php?error=onenumber&name=$name&lname=$lastName&mail=$email&tlf=$tlfNumber");
    exit();
  }
  elseif (!preg_match("/^.{8,}$/", $password)) {
    header("Location: ../registration.php?error=minimum8&name=$name&lname=$lastName&mail=$email&tlf=$tlfNumber");
    exit();
  }
  else if ($password !== $passwordRepeat) {
    header("Location: ../registration.php?error=notmatching&name=$name&lname=$lastName&mail=$email&tlf=$tlfNumber");
    exit();
  }

  else {

    $sql = "SELECT Email FROM Customer WHERE Email=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../registration.php?error=sqlerror1");
      exit();
    }
    else {

      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCount = mysqli_stmt_num_rows($stmt);
      mysqli_stmt_close($stmt);

      if ($resultCount > 0) {
        header("Location: ../registration.php?error=usertaken&mail=".$email);
        exit();
      }
      
      else {
        $sql = "INSERT INTO Customer (First_Name, Last_Name, Email, Phone, Password) VALUES (?, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../registration.php?error=sqlerror2");
          exit();
        }
        else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sssss", $name, $lastName, $email, $tlfNumber, $hashedPwd);

          mysqli_stmt_execute($stmt);
          header("Location: ../registration.php?registration=success");
          exit();

        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}

else {
    header("Location: ../registration.php");
    exit();
  }

