<?php

$filename = "data/data.txt";

if ("read" == $_GET['action'])
{
	$dataString = file_get_contents($filename);
	$dataArr = explode("\n", $dataString);
	foreach ($dataArr as $nro => $row)
	{
		echo $row . "<br />";
	}
}

