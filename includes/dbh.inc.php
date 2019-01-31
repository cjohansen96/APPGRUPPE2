<?php

$servername = "itfag.usn.no";
$dBUsername = "h18gr2";
$dBPassord = "pw2";
$dBName = "h18grdb2";

$conn = mysqli_connect($servername, $dBUsername, $dBPassord, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}