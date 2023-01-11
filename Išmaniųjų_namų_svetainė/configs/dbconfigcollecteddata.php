<?php
require "dbconfigData.php";
$query = "select Date as 'Datam', TempInside as 'Tnamai',TempOutside as 'TempOutside', HumInside as 'Huminside' from collecteddata.collecteddata where Date = (select max(Date) from collecteddata.collecteddata)";
$res = mysqli_query($conn,$query);
$data = mysqli_fetch_array($res);

$googleApiUrl = "https://api.meteo.lt/v1/places/kaunas/forecasts/long-term";

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$googleApiUrl);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$response = curl_exec($ch);
curl_close($ch);
$result = json_decode($response,true);

?>
