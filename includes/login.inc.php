<?php

if(isset($_POST['login-submit'])) {

	require 'dbh.inc.php';

	$email = $_POST['mail'];
	$password = $_POST['pwd'];

	// Inndatavalidering. Sjekker om det tom inndata fra bruker
	if (empty($email) || empty($password)) {
    	header("Location: ../index.php?error=emptyfields&mail".$email."&pwd=".$password);
    	exit();
	}
	// Sender sql med placeholders inn til databasen, så fyller vi det inn med inn data fra brukeren senere.
	else {
    	$sql = "SELECT * FROM Customer WHERE Email=?;";
    	$stmt = mysqli_stmt_init($conn);

    	if (!mysqli_stmt_prepare($stmt, $sql)) {
    		header("Location: ../index.php?error=sqlerror");
    		exit();
    	}
    	else {
      		mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);  
            $result = mysqli_stmt_get_result($stmt);

            // Sjekker om passordet er riktig
            if ($row = mysqli_fetch_assoc($result)) {
        		$pwdCheck = password_verify($password, $row['Password']); 
        		
        		if ($pwdCheck == false) {
        			header("Location: ../index.php?error=wrongpassword");
        			exit();
        		}       
        		else if($pwdCheck == true) {
        			session_start();

        			$_SESSION['email'] = $row['Email'];
                    $_SESSION['customerId'] = $row['IdCustomer'];  
                    $_SESSION['name'] = $row['First_Name'];
                           			
        			header("Location: ../index.php?login=success");
        			exit();
        		}
        	}	   		
        	else {
        		header("Location: ../index.php?login=wrongemailpwd");
        		exit();

            }		    		
    	}
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else {
	header("location: ../APPGRUPPE2/index.php");
	exit();
}

