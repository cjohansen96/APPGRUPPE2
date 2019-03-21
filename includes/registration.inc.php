<?php
if (isset($_POST['reg-submit'])) {


  require 'dbh.inc.php';

  $name = $_POST['name'];
  $lastName = $_POST['lname'];
  $email = $_POST['mail'];
  $tlfNumber = $_POST['tlf'];
  $password = $_POST['pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];


  // Inndata validering av de forskjellige inndata bruker skriver inn i registrering skjema, mange forskjellige valideringer
  // man kan ha, men jeg valgte de som jeg trodde var mest viktige for våres applikasjon.
  if (empty($name) || empty($lastName) || empty($email) || empty($tlfNumber) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../registration.php?error=emptyfields&name".$name."&mail=".$email);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z]*$/", $name) && !preg_match("/^[a-zA-Z]*$/", $lastName) && !preg_match("/^[0-9]{8}+$/", $tlfNumber) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
  else if (!preg_match("/^[0-9]{8}+$/", $tlfNumber)) {
    header("Location: ../registration.php?error=invalidltlf&tlf=".$tlfNumber);
    exit();
  }  
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../registration.php?error=invalidmail&mail=".$email);
    exit();
  }
  elseif (!preg_match('@[A-Z]@', $password)) {
    header("Location: ../registration.php?error=passwordNeedsOneUppercase");
    exit();
  }
  elseif (!preg_match('@[a-z]@', $password)) {
    header("Location: ../registration.php?error=passwordNeedsOneLowercase");
    exit();
  }
  elseif (!preg_match('@[0-9]@', $password)) {
    header("Location: ../registration.php?error=passwordNeedsOneNumber");
    exit();
  }
  elseif (!preg_match("/^.{8,}$/", $password)) {
    header("Location: ../registration.php?error=passwordMinimum8lettersLong");
    exit();
  }
  else if ($password !== $passwordRepeat) {
    header("Location: ../registration.php?error=passwordcheck&name=".$name."&mail=".$email);
    exit();
  }

  else {

    // Hvis brukeren ikke har gjort noen feil, så starter skritpet med å finne ut om email allerede er registrert.
    // Bruker da prepared statments for å sikre at det ikke blir noen sqlinjections.
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
      // Hvis brukeren ikke eksisterer kan vi da begynne å sette inn brukeren i databasen med et hashed passord.
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

