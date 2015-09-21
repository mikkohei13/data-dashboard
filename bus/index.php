<?php

require_once "../../api-key-hsl.php";

$url = "http://api.reittiopas.fi/hsl/prod/?user=" . $HSLtoken . "&pass=" . $HSLpass . "&request=stop&code=2511204"; // Erik Basse, kohti Helsinkiä

$json = file_get_contents($url);
$arr = json_decode($json, TRUE);

//print_r ($arr); exit(); // debug 

foreach ($arr[0]['departures'] as $number => $busArr)
{
	print_r($busArr);
//	$line = explode(" ", $busArr['code']);
	$line = substr($busArr['code'], 1, 3);
	$line = ltrim($line, 0);
	echo "LINE:" . $line . "\n";
}


