<?php

include_once "../../api-key.php";

$url = "http://data.fmi.fi/fmi-apikey/" . $apiKey . "/wfs?request=getFeature&storedquery_id=fmi::forecast::hirlam::surface::point::timevaluepair&place=kauklahti&";

$xmlStringWithNamespaces = file_get_contents($url);
$xmlString = str_replace(":", "_", $xmlStringWithNamespaces);

//echo $xmlString; // debug

$xml = simplexml_load_string($xmlString);

$datetime = FALSE;
$measurements = Array();

date_default_timezone_set('Europe/Helsinki');


foreach($xml->wfs_member as $member)
{

	$timeseries = $member->omso_PointTimeSeriesObservation->om_result->wml2_MeasurementTimeseries;

	$att = $timeseries->attributes();
	$id = (string) $att['gml_id'];

	echo $id . "<br />";

	foreach ($timeseries->wml2_point as $point)
	{
		echo getHour($point->wml2_MeasurementTVP->wml2_time);
		echo ": ";
		echo (string) $point->wml2_MeasurementTVP->wml2_value . "<br />";
	}


}

function getHour($time)
{
	$time = (string) $time;
//	2015-10-18T02_00_00Z
	$parts = explode("T", $time);
	$hour = substr($parts[1], 0, 2);
	return $hour;
}


/*

mts-1-1-GeopHeight
mts-1-1-Temperature
mts-1-1-Pressure
mts-1-1-Humidity
mts-1-1-WindDirection
mts-1-1-WindSpeedMS
mts-1-1-WindUMS
mts-1-1-WindVMS
mts-1-1-MaximumWind
mts-1-1-WindGust
mts-1-1-DewPoint
mts-1-1-TotalCloudCover
mts-1-1-WeatherSymbol3
mts-1-1-LowCloudCover
mts-1-1-MediumCloudCover
mts-1-1-HighCloudCover
mts-1-1-Precipitation1h
mts-1-1-PrecipitationAmount
mts-1-1-RadiationGlobalAccumulation
mts-1-1-RadiationLWAccumulation
mts-1-1-RadiationNetSurfaceLWAccumulation
mts-1-1-RadiationNetSurfaceSWAccumulation
mts-1-1-RadiationDiffuseAccumulation

*/



//print_r ($measurements); exit("\nEND");
/*
function parseMember($member)
{
	// Codes
	$code['mpcv1-1'] = "TA";
	$code['mpcv1-2'] = "RH";
	$code['mpcv1-3'] = "TD";
	$code['mpcv1-4'] = "WS";
	$code['mpcv1-5'] = "WD";
	$code['mpcv1-6'] = "WG";

	// Measurements
	$multiPointCoverage = $member->omso_ProfileObservation->om_result->gmlcov_MultiPointCoverage;

	$att = $multiPointCoverage->attributes();
	$id = (string) $att['gml_id'];

//	exit($id);

	// Temperature and height
	if (isset($code[$id]))
	{
		$heightsString = $multiPointCoverage->gml_domainSet->gmlcov_SimpleMultiPoint->gmlcov_positions;
		$heightsString = trim($heightsString);
		$heights = explode(" ", $heightsString);

		$measurementsStrings = $multiPointCoverage->gml_rangeSet->gml_DataBlock->gml_doubleOrNilReasonTupleList;
		$measurementsStrings = trim($measurementsStrings);
		$measurements = explode(" ", $measurementsStrings);

		foreach ($heights as $nro => $height)
		{
			$tuples[$height] = $measurements[$nro];
		}

		$ret[$code[$id]] = $tuples;
		return $ret;
	}
	else
	{
		return Array();
	}
}
*/

// Results debug
//echo $datetime->format('Y-m-d H.i.s');

//print_r ($measurements); // debug




?>
