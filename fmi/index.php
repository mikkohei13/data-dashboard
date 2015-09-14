<?php
header('Content-Type: text/html; charset=utf-8');

include_once "../../api-key.php";

//echo $apiKey; // debug

$url = "http://data.fmi.fi/fmi-apikey/" . $apiKey . "/wfs?request=getFeature&storedquery_id=fmi::observations::weather::mast::multipointcoverage&fmisid=101000&timestep=10&";

$xmlStringWithNamespaces = file_get_contents($url);
$xmlString = str_replace(":", "_", $xmlStringWithNamespaces);

//echo $xmlString;

$xml = simplexml_load_string($xmlString);

foreach($xml->wfs_member as $member)
{
	$multiPointCoverage = $member->omso_ProfileObservation->om_result->gmlcov_MultiPointCoverage;
	$att = $multiPointCoverage->attributes();

	if ($att['gml_id'] == "mpcv1-1")
	{
		echo "jee!";
	}
	else
	{
		echo "buu!";
	}
	print_r ($att['gml_id']);
	exit("\nEND");
}

//print_r ($array); // debug


?>
