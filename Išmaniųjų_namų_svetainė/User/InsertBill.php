<?php

session_start();

require_once "../configs/dbconfigJobs.php";

if(isset($_POST['insertdata']))
{
    $BillName = $_POST['BillName'];
    $Month = $_POST['Month'];
    $Value= $_POST['Value'];
    $curYear = date('Y');

    $query = "INSERT INTO Bills(`Monthname`,`Name`,`Value`) VALUES ('$Month','$BillName','$Value')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data saved"); </script>';
        header("Location:HomePage.php"); 

    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>