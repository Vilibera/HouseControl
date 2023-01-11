<?php
require_once("dbconfigJobs.php");

if (isset($_POST["Name"]) && ($_POST["Year"])) {
  $Name = $_POST["Name"];
  $Monthname = "";
  $Year = $_POST["Year"];
  $Value = "";
  $bar_graph = "";
  $curYear = date('Y');
}

$getData = "SELECT * FROM Bills WHERE Name = '$Name' And Year = '$Year' ";
$rows = mysqli_query($conn,$getData);
$rowcount = mysqli_num_rows($rows);
if($rowcount > 0){
  while($r = mysqli_fetch_array($rows)){
    $Monthname .= '"' . $r["Monthname"] . '",';
    $Value .= '"' . $r["Value"] . '",';
  }
}
else{
  echo $Name;
}

//Check connection


$Monthname = substr($Monthname, 0, -1);
$Value = substr($Value, 0, -1);
$bar_graph = '<canvas id="graph" data-settings=
\'{
  "type": "bar",
  "data":
  {
  "labels": [' . $Monthname . ' ],
  "datasets":
  [{
      "label": "' . $Name . ' Value",
      "backgroundColor": "rgba(235, 22, 22, .7)",
      "borderColor": "#6C7293",
      "data": [' . $Value . ']
  }]
  },
  "option":
  {
    "legend":
    {
      "display": true
    }
  }}\'></canvas>';


echo $bar_graph;
?>