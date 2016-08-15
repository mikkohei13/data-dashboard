<?php

$filename = "data/data.txt";

if ("readlist" == $_GET['action'])
{
	$dataString = file_get_contents($filename);
	$dataArr = explode("\n", $dataString);
	foreach ($dataArr as $nro => $row)
	{
		echo $row . "<br />";
	}
}
if ("readstring" == $_GET['action'])
{
	$itemString = "";
	$dataString = file_get_contents($filename);
	$dataArr = explode("\n", $dataString);
	foreach ($dataArr as $nro => $row)
	{
		$itemString .= $row . ", ";
	}
	$itemString = trim($itemString, ", ");
	echo $itemString;
}
elseif ("reset" == $_GET['action'])
{
	file_put_contents($filename, "");
	echo "ok";
}
elseif ("add" == $_GET['action'])
{
	$itemToAdd = $_GET['item'];
	file_put_contents($filename, ($itemToAdd . "\n"), FILE_APPEND);
	echo "ok";
}



