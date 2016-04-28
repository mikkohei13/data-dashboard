<?php
header('Content-Type: application/json; charset=utf-8');
include_once "mast-fetch.php";

if (empty($measurements))
{
	$measurements['error'] = "data not available";
}
else
{
	$measurements['error'] = FALSE;
}

$json = json_encode($measurements);
echo $json;