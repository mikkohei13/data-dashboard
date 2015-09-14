<?php
header('Content-Type: text/html; charset=utf-8');

include_once "../../api-key.php";

//echo $apiKey; // debug

$url = "http://data.fmi.fi/fmi-apikey/" . $apiKey . "/wfs?request=getFeature&storedquery_id=fmi::observations::weather::mast::multipointcoverage&fmisid=101000&timestep=10&";

$xmlString = file_get_contents($url);

$xml = simplexml_load_string($xmlString);
$namespaces = $xml->getNameSpaces(true);

print_r ($namespaces); // debug

$i = 0;

$wfs = $xml->children($namespaces['wfs']);

print_r ($wfs); // debug



?>
