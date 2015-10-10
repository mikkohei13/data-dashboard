<?php

if ($_GET['loc'] == "HOV")
{
	$imageUrl ="http://aurora.fmi.fi/public_service/pienempi_HOV.jpg";
}
else
{
	$imageUrl ="http://aurora.fmi.fi/public_service/latest_pieni_DYN.jpg";
}

$im = imagecreatefromjpeg($imageUrl);

if ($im)
{
  header("Content-type: image/jpg");
  imagejpeg($im);
}