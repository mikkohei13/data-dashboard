<?php
include_once "mast-fetch.php";
header('Content-Type: application/json; charset=utf-8');

if (! empty($measurements))
{
	$json = json_encode($measurements);
	$json['error'] = FALSE;
}
else
{
	$json['error'] = "weather data not available";
}

echo $json;
