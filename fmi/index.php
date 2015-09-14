<?php
header('Content-Type: text/html; charset=utf-8');

include_once "../../api-key.php";

//echo $apiKey; // debug

$url = "http://data.fmi.fi/fmi-apikey/" . $apiKey . "/wfs?request=getFeature&storedquery_id=fmi::observations::weather::mast::multipointcoverage&fmisid=101000&timestep=10&";

$xmlString = file_get_contents($url);

// http://www.ohjelmointiputka.net/keskustelu/27950-php-ja-ilmatieteen-laitoksen-avoin-data/sivu-1

$dom = new DomDocument();
$dom->loadXML($xmlString);

$mittaukset = $dom->getElementsByTagNameNS("http://www.opengis.net/wfs/2.0", "member");

foreach ($mittaukset as $m)
	{
	echo "<li> uusi mittaus alkaa";
	$results = $m->getElementsByTagNameNS("http://www.opengis.net/om/2.0", "result");
	foreach ($results as $r) {
		echo "<li> uusi tulos alkaa";
		echo "<li> aika: " . $r->getElementsByTagName("time")->item(0)->nodeValue;
		echo "<li> arvo: " . $r->getElementsByTagName("value")->item(0)->nodeValue;
	}
}

http://www.opengis.net/gmlcov/1.0

//print_r ($array); // debug


?>
