<?php
$UserId= $_SESSION['id'];

require "dbconfigJobs.php";


$query = "SELECT id as 'Jid' , JobName as 'Jbname' , JobDetails as 'JDname' FROM ToDoList WHERE UserId = $UserId ";

$res = mysqli_query($conn,$query);



?>
