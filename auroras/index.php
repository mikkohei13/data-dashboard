<?php

$imageUrl ="http://aurora.fmi.fi/public_service/latest_pieni_DYN.jpg";
$imageUrl ="http://aurora.fmi.fi/public_service/pienempi_HOV.jpg";

$im = imagecreatefromjpeg($imageUrl);

if ($im)
{
  header("Content-type: image/jpg");
  imagejpeg($im);
}