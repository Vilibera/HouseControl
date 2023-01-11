<?php

session_start();

require_once "../configs/dbconfigJobs.php";

if(isset($_POST['insertdata']))
{
    $jname = $_POST['Jname'];
    $dname = $_POST['Dname'];
    $UserId= $_SESSION['id'];
   

    $query = "INSERT INTO ToDoList(`UserId`,`JobName`,`JobDetails`) VALUES ('$UserId','$jname','$dname')";
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