<?php
require_once("dbconfigData.php");

if (isset($_POST["Name"]) ) {
  $Name = $_POST["Name"];
  $Date= "";
  $TempOut = "";
  $TempIns = "";
  $HumIns = "";
  $Value = "";
  $line = "";
}

$getData = "SELECT * FROM collecteddata WHERE Date > '$Name' ";
$rows = mysqli_query($conn,$getData);
$rowcount = mysqli_num_rows($rows);
if($rowcount > 0){
  while($r = mysqli_fetch_array($rows)){
    $TempIns.= '"' . $r["TempInside"] . '",';
    $TempOut.= '"' . $r["TempOutside"] . '",';
    $HumIns.= '"' . $r["HumInside"] . '",';
    $Date.= '"' . $r["Date"] . '",';
  }
}
else{
  echo $Date;
}

//Check connection


$TempIns= substr($TempIns, 0, -1);
$TempOut= substr($TempOut, 0, -1);
$HumIns= substr($HumIns, 0, -1);
$line = '<canvas id="graph" data-settings=
\'{
  "type": "line",
  "data":
  {
  "labels": [' . $Date . ' ],
  "datasets":
  [{
      "label": "' . $Date . ' Value",
      "backgroundColor": "rgba(235, 22, 22, .7)",
      "borderColor": "#6C7293",
      "data": [' . $TempIns . ']
  }]
  },
  "option":
  {
    "legend":
    {
      "display": true
    }
  }}\'></canvas>';


echo $line;
?>