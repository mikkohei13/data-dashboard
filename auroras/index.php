<?php
date_default_timezone_set("Europe/Helsinki");

if (@$_GET['loc'] == "HOV")
{
	$imageUrl ="http://aurora.fmi.fi/public_service/pienempi_HOV.jpg";
}
else
{
	$imageUrl ="http://aurora.fmi.fi/public_service/latest_pieni_DYN.jpg";
}

//echo $imageUrl;
$exif = exif_read_data($imageUrl);

$imageTimestamp = strtotime($exif['DateTime']);
$imageAgeSeconds = time() - $imageTimestamp - (3*60*60); // substract clock error
$imageAgeMinutes = round(($imageAgeSeconds / 60), 0);

//echo "image age: " . $imageAgeSeconds;

//echo "\n" . gmdate("Y-m-d H:i:s", $imageTimestamp) . "\n"; // debug

//print_r ($exif);


//exit("END");

$im = imagecreatefromjpeg($imageUrl);

$textcolor = imagecolorallocate($im, 255, 255, 255);
imagestring ( $im , 10 , 5 , 5 , ($imageAgeMinutes . " min") , $textcolor );

if ($im)
{
  header("Content-type: image/jpg");
  imagejpeg($im);
}