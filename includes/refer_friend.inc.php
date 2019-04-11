<?php
session_start();
require 'dbh.inc.php';
if(isset($_POST['refer_submit'])){
	$id = $_SESSION['email'];
	$customerid = $_SESSION['customerId'];
	if($id === $_POST['email']){
		header("Location: ../profile.php?error=youremail");
		exit();
	}
	else{

		$email = isset($_POST['email']) ? $_POST['email'] : ''; 

		 
	 	
		// henter ut emailene fra refer_friend tabellen.
		$SQLreferStatement = "SELECT Email FROM Refere_Friend";
		$referResult = mysqli_query($conn,$SQLreferStatement);
		$referArray = array();
		$j = 0;
		while($row = mysqli_fetch_assoc($referResult)){
			$referArray[$j] = $row;
			$j++;
		}
		
		//Sjekker om emailen allerede ligger i refer_tabellen. 
		$referExists = false;
		foreach ($referArray as $key => $value) {
			foreach ($value as $relationship => $mail) {
				if($mail == $email){
						$referExists = true;
				}
			}
		}

			//legger den nye mailen i customer tabellen, og den gamle blir lagt over i refer tabellen i db
			if($referExists === false){
				$sql = "INSERT INTO Refere_Friend(IdCustomer, Email) VALUES (?,?);";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../profile.php?refereerror=sqlerror");
					exit();
				}
				else {
					mysqli_stmt_bind_param($stmt, "is", $customerid,$email);
					mysqli_stmt_execute($stmt);
					 header("Location: ../profile.php?referesuccsess=emailadded");
					exit();
				
				}	
				
			}
				//mailen finens fra før i refer_friend tabell
			elseif($customerExists === true && $referExists === true){
				header("Location: ../profile.php?error=refertwice");;
			}
				//mailen finnes ikke i customer tabellen
			else{
				header("Location: ../profile.php?error=emaildonotexist");
			}
	}

}


	?>