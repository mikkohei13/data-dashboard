<?php
header('Content-Type: text/html; charset=utf-8');

include_once "../../api-key.php";

//echo $apiKey; // debug

$url = "http://data.fmi.fi/fmi-apikey/" . $apiKey . "/wfs?request=getFeature&storedquery_id=fmi::observations::weather::mast::multipointcoverage&fmisid=101000&timestep=10&";

$xmlStringWithNamespaces = file_get_contents($url);
$xmlString = str_replace(":", "_", $xmlStringWithNamespaces);

//echo $xmlString;

$xml = simplexml_load_string($xmlString);

$datetime = FALSE;

foreach($xml->wfs_member as $member)
{
	// Time
	if ($datetime === FALSE)
	{
		$timeRaw = $member->omso_ProfileObservation->om_resultTime->gml_TimeInstant->gml_timePosition;
		$timeRaw = str_replace("_", ":", $timeRaw); // includes timezone

		date_default_timezone_set('Europe/Helsinki');
		$datetime = new DateTime($timeRaw);
		$helsinkiTime = new DateTimeZone('Europe/Helsinki');
		$datetime->setTimezone($helsinkiTime);
	//	echo $datetime->format('Y-m-d H.i.s'); // debug
	}

	// Measurements
	$multiPointCoverage = $member->omso_ProfileObservation->om_result->gmlcov_MultiPointCoverage;
	$att = $multiPointCoverage->attributes();

	// Temperature and height
	if ($att['gml_id'] == "mpcv1-1")
	{
		$heightsString = $multiPointCoverage->gml_domainSet->gmlcov_SimpleMultiPoint->gmlcov_positions;
		$heightsString = trim($heightsString);
		$heights = explode(" ", $heightsString);

		$measurementsStrings = $multiPointCoverage->gml_rangeSet->gml_DataBlock->gml_doubleOrNilReasonTupleList;
		$measurementsStrings = trim($measurementsStrings);
		$measurements = explode(" ", $measurementsStrings);

		foreach ($heights as $nro => $height)
		{
			echo "x";
			$heightTuples[$height] = $measurements[$nro];
		}
	}
	// Temperature and height
	elseif ($att['gml_id'] == "mpcv1-2")
	{
		$heightsString = $multiPointCoverage->gml_domainSet->gmlcov_SimpleMultiPoint->gmlcov_positions;
		$heightsString = trim($heightsString);
		$heights = explode(" ", $heightsString);

		$measurementsStrings = $multiPointCoverage->gml_rangeSet->gml_DataBlock->gml_doubleOrNilReasonTupleList;
		$measurementsStrings = trim($measurementsStrings);
		$measurements = explode(" ", $measurementsStrings);

		foreach ($heights as $nro => $height)
		{
			echo "x";
			$humidityTuples[$height] = $measurements[$nro];
		}
	}




}

// Results debug
echo $datetime->format('Y-m-d H.i.s');
print_r ($heights);
print_r ($measurements);
print_r ($heightTuples);
print_r ($humidityTuples);



?>
