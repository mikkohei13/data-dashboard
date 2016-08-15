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



