<?php
require_once("dbconfigDevices.php");

if (isset($_POST["DName"]) ) {
  $DName = $_POST["DName"];
  $status = "";
}

$getData = "SELECT * FROM lights WHERE DeviceName = '$DName' AND Date = (SELECT max(Date) from lights where DeviceName = '$DName')";
$rows = mysqli_query($conn,$getData);
$rowcount = mysqli_num_rows($rows);
if($rowcount > 0){
  while($r = mysqli_fetch_array($rows)){
    $status = $r["Status"] ;
  }
}


//Check connection
echo $status;
?>