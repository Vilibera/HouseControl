<?php

$fname = $_POST['fname'];
$sname = $_POST['sname'];
$Username = $_POST['Username'];
$email = $_POST['email'];
$PhoneNumber = $_POST['PhoneNumber'];
//$Password = $_POST['Password'];
$hash = password_hash($_POST['Password'], PASSWORD_DEFAULT);

//Include config file
require_once "../configs/dbconfig.php";

$sql = "INSERT INTO securitydata (Recognition, Name, Surname, Username, Email, Password, PhoneNumber) VALUES ('client', '$fname', '$sname', '$Username', '$email', '$hash', '$PhoneNumber')";

if ($conn->query($sql)==TRUE){
        header("Location: ../index.html");
	echo "New record created successfully";
}
else{
	echo "Error: ". $sql . "<br>" . $conn->error;
}

$conn->close();


?>
