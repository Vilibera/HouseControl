<?php

session_start();

require_once "../configs/dbconfigJobs.php";

if(isset($_POST['deletedata']))
{
    $id = $_POST['id'];

    $query = "DELETE FROM ShopList WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("location:ToDo.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}


?>