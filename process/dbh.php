<?php

$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "motorsport";

$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if(!$conn){
	echo "Database Connection Failed";
}

?>