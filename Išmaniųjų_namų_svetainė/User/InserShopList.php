<?php

session_start();

require_once "../configs/dbconfigJobs.php";

if(isset($_POST['insertshoplist']))
{
    $siname = $_POST['SIname'];
    $sqname = $_POST['SQname'];
   

    $query = "INSERT INTO ShopList(`JobName`,`JobDetails`) VALUES ('$siname','$sqname')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data saved"); </script>';
        header("Location:ToDo.php"); 

    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>