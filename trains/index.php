<?php
date_default_timezone_set("Europe/Helsinki");
$url = "https://www.vr.fi/cs/Satellite?pagename=VRWeb/vrweb_asemasyote&station=KLH";

$xmlString = file_get_contents($url);

//echo $xmlString;

$xml = simplexml_load_string($xmlString);

$nowTimeInt = date("Gi");
//echo $nowTimeInt;

foreach($xml->channel->item as $train)
{
	if ($train->toStation == "HKI")
	{
		$trainTimeInt = str_replace(":", "", $train->etd); // trim leading zeros?
		if ($trainTimeInt > $nowTimeInt)
		{
//			echo (string) $train->guid . " ";
			echo (string) $train->title . " ";
			echo str_replace(":", ".", $train->etd) . " ";
			echo "<br />";			
		}
		/*
		else
		{
			echo "mennyt juna" . (string) $train->guid;
		}
		*/
	}
}
