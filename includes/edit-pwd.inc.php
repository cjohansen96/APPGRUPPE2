<?php
if (isset($_POST['pwd-submit'])) {

  session_start();
  require 'dbh.inc.php';

  $oldPassword = $_POST['old-pwd'];
  $newPassword = $_POST['new-pwd'];
  $passwordRepeat = $_POST['pwd-repeat'];

  if (empty($oldPassword) || empty($newPassword) || empty($passwordRepeat)) {
    header("Location: ../profile.php?errorpass=emptyfields");
    exit();
  }  
  elseif (!preg_match('@[A-Z]@', $newPassword)) {
    header("Location: ../profile.php?errorpass=uppercase");
    exit();
  }
  elseif (!preg_match('@[a-z]@', $newPassword)) {
    header("Location: ../profile.php?errorpass=lowercase");
    exit();
  }
  elseif (!preg_match('@[0-9]@', $newPassword)) {
    header("Location: ../profile.php?errorpass=onenumber");
    exit();
  }
  elseif (!preg_match("/^.{8,}$/", $newPassword)) {
    header("Location: ../profile.php?errorpass=minimum8");
    exit();
  }
  else if ($newPassword !== $passwordRepeat) {
    header("Location: ../profile.php?errorpass=notmatching");
    exit();
  }
  else if ($newPassword == $oldPassword) {
    header("Location: ../profile.php?errorpass=same");
    exit();
  }


  else {
    $id = $_SESSION['customerId'];
    $sql = "SELECT * FROM Customer WHERE IdCustomer=?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../profile.php?errorpass=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $id);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($oldPassword, $row['Password']);

        if ($pwdCheck == false) {
          header("Location: ../profile.php?errorpass=wrongpassword");
          exit();
        }
        else if($pwdCheck == true) {

          $sqlUpdate = "UPDATE Customer SET Password=? WHERE IdCustomer = '$id';";
          $stmtUpdate = mysqli_stmt_init($conn);

          if (!mysqli_stmt_prepare($stmtUpdate, $sqlUpdate)) {
            header("Location: ../profile.php?errorpass=sqlerror");
            exit();
          }
          else {
            $hashedPwd = password_hash($newPassword, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmtUpdate, "s", $hashedPwd);

            mysqli_stmt_execute($stmtUpdate);
            header("Location: ../profile.php?passwordchange=successpass");
            exit();
          }

          mysqli_stmt_close($stmtUpdate);
          mysqli_stmt_close($stmt);
          mysqli_close($conn);
        }
      }
    }
  }


}
else {
  header("Location: ../profile.php");
  exit();
}