<?php
$googleApiUrl = "https://api.meteo.lt/v1/places/kaunas/forecasts/long-term";

$ch = curl_init();

curl_setopt($ch,CURLOPT_URL,$googleApiUrl);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response,true);

echo $data['forecastTimestamps'][0]['forecastTimeUtc'];
die();
?>
