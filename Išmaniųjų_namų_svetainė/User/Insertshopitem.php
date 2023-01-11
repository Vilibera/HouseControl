<?php

session_start();

require_once "../configs/dbconfigJobs.php";

if(isset($_POST['insertdata']))
{
    $sname = $_POST['Sname'];
    $aname = $_POST['Aname'];
   
    $query = "INSERT INTO ShopList(`ItemName`,`Quantity`) VALUES ('$sname','$aname')";
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