<?php
session_start();
require 'dbh.inc.php';
if(isset($_POST['refer_submit'])){
	$id = $_SESSION['email'];
	if($id == $_POST['email']){
		header("Location: ../APPGRUPPE2/profile.php?error=youremail");
		exit();
	}
	else{

		$email = isset($_POST['email']) ? $_POST['email'] : ''; 

		 
	 	//hente ut emailene i customer tabellen og legge de i et array
		$SQLStatement = "SELECT Email FROM Customer";
		$result = mysqli_query($conn,$SQLStatement);
		$emailArray = array();
		$index = 0;
		while($row = mysqli_fetch_assoc($result)){
			$emailArray[$index] = $row;
			$index++;
		}
		// henter ut emailene fra refer_friend tabellen.
		$SQLreferStatement = "SELECT Email FROM Refere_Friend";
		$referResult = mysqli_query($conn,$SQLreferStatement);
		$referArray = array();
		$j = 0;
		while($row = mysqli_fetch_assoc($referResult)){
			$referArray[$j] = $row;
			$j++;
		}


		$customerExists = false;
		//sjekker om emailen ligger i Customer databasen.
		foreach ($emailArray as $key => $value){
			foreach($value as $relationship => $mail){
				if($mail == $email){
					$customerExists = true;
				}
			}
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
			if($customerExists === true && $referExists === false){
				$nyrefer = "INSERT INTO Refere_Friend(IdCustomer,Email)
				SELECT IdCustomer, Email
				FROM Customer
				WHERE Email = '$email'";
					//sjekker om brukeren ble lagt til
				if($conn->query($nyrefer) == TRUE){
					 header("Location: ../APPGRUPPE2/profile.php?refere=succsess");
				}
					
				//error melding hvis brukeren ikke ble lagt til.
				else {
						header("Location: ../APPGRUPPE2/profile.php?error=usernotadded");
				}

			}
				//mailen finens fra før i refer_friend tabell
			elseif($customerExists === true && $referExists === true){
				header("Location: ../APPGRUPPE2/profile.php?error=refertwice");;
			}
				//mailen finnes ikke i customer tabellen
			else{
				header("Location: ../APPGRUPPE2/profile.php?error=emaildonotexist");
			}
	}

}


	?>
