<?php
$dbServername = "database address";
$dbUsername = "database login name";
$dbPassword = "database login password";
$dbName = "database name";

//Create connection

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

//Check connection

if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}






?>