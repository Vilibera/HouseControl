<?php
require_once "../configs/dbconfig.php";

if (isset($_POST['insertinfo'])) {
    $INFO = '';
    $Finame = $_POST['Fname'];
    $SiName = $_POST['Sname'];
    $Username = $_POST['username'];
    $Email = $_POST['email'];
    $Phnumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    if (($Finame =='') && ($SiName == '') && ($Username =='') && ($Email == '') && ($Phnumber == '')) {
        $INFO = 'There is nothing to change';
        header("Location: myinfo.php");
    } else {
        echo $Finame;
        echo $SiName;
        echo $Email;
        echo $Username;
        echo $Phnumber;
        // $query = "INSERT INTO securitydata(`Name`,`Surname`, `Username`, `Email`, `Password`) VALUES ('$Finame','$SiName', '$Username', '$Email', '$Phnumber')";
        // $query_run = mysqli_query($conn, $query);

        // if ($query_run) {
        //     echo '<script> alert("Data saved"); </script>';
        //     header("Location:ToDo.php");

        // } else {
        //     echo '<script> alert("Data Not Saved"); </script>';
        // }
    }
}
?>