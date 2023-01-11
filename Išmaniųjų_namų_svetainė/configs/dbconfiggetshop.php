<?php
require "dbconfigJobs.php";


$query = "SELECT id as 'Jid' , ItemName as 'sname' , Quantity as 'Aname' FROM ShopList ";

$shop = mysqli_query($conn,$query);



?>
