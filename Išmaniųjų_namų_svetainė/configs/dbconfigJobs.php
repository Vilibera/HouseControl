<?php
$dbServername = "database address";
$dbUsername = "database login name";
$dbPassword = "YOUR_DB_PASSWORD";
$dbName = "database name";

//Create connection

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//Check connection

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}






?>