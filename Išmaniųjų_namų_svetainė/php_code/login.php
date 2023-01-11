<?php
session_start();
$Email = $_POST['Email'];
$usererror = null;
$validerror = null;
$password = $_POST['password'];
//Include config file
require_once "../configs/dbconfig.php";
//Validate credentials
$hash = password_hash($password, PASSWORD_DEFAULT);
$sql = "SELECT * FROM securitydata WHERE Email ='$Email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 1) {

    $row = mysqli_fetch_assoc($result);
    $pw  = $row['Password'];
    $hash = password_verify($password,$pw);
    if ($hash != 0 ) {
        $_SESSION['Email'] = $row['Email'];
        $_SESSION['Username'] = $row['Username'];
        $_SESSION['Recognition'] = $row['Recognition'];
        $_SESSION['password'] = $row['Password'];
        $_SESSION['Phone'] = $row['PhoneNumber'];
        $_SESSION['Validation'] = $row['Validation'];
        $_SESSION['Name'] = $row['Name'];
        $_SESSION['Surname'] = $row['Surname'];
        $_SESSION['id'] = $row['id'];
        if ($row['Recognition'] == 'client' && $row['Validation'] == 2) {
           header("Location: ../User/HomePage.php");
           exit();
            
        }elseif ($row['Recognition'] == 'admin' && $row['Validation'] == 3) {
              header("Location: ../Admin/AdminPage.php");
              exit();
            
        }
        else echo 'Wrong password or email';
    }
}
$conn->close();

?>