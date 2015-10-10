<?php

require_once "../../api-key-hsl.php";

$limit = 4;

$url = "http://api.reittiopas.fi/hsl/prod/?user=" . $HSLtoken . "&pass=" . $HSLpass . "&request=stop&code=2511204&time_limit=360&dep_limit=" . $limit; // Erik Basse, kohti Helsinkiä

$json = file_get_contents($url);
$arr = json_decode($json, TRUE);


//print_r ($arr); exit(); // debug 

echo "<span class=\"label\">Buses</span>";

$i = 0;

if (! is_array($arr[0]['departures']))
{
	exit("<!-- no buses -->");
}

foreach ($arr[0]['departures'] as $number => $busArr)
{
//	print_r($busArr);

//	$line = explode(" ", $busArr['code']);
	$line = substr($busArr['code'], 1, 3);
	$line = ltrim($line, 0);

	if (strlen($busArr['time']) == 4)
	{
		$time = substr($busArr['time'], 0, 2) . "." . substr($busArr['time'], 2, 2);
	}
	elseif (strlen($busArr['time']) == 3)
	{
		$time = substr($busArr['time'], 0, 1) . "." . substr($busArr['time'], 1, 2);
	}
	else
	{
		$time = "FOO";
	}

	echo "&nbsp;<span class=\"value\"><strong>" . $line . "</strong> " . $time . "</span>\n";

	$i++;
}

