<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassord = "";
$dBName = "h18grdb2";


$conn = mysqli_connect($servername, $dBUsername, $dBPassord, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	
}
mysqli_set_charset($conn, 'utf8');