<?php

$json = file_get_contents("http://api.sunrise-sunset.org/json?lat=60.19&lng=24.59&date=today&formatted=0");

$arr = json_decode($json, TRUE);

//echo "<pre>"; print_r ($arr); // debug

date_default_timezone_set('Europe/Helsinki');
$helsinkiTime = new DateTimeZone('Europe/Helsinki');

$sunrise = new DateTime($arr['results']['sunrise']);
$sunrise->setTimezone($helsinkiTime);
//echo " Sunrise: " . $sunrise->format('Y-m-d H.i');

$sunset = new DateTime($arr['results']['sunset']);
$sunset->setTimezone($helsinkiTime);
// echo " Sunset: " . $sunset->format('Y-m-d H.i');

$dayLength = gmdate("G", $arr['results']['day_length']) . " <span class=\"unit\">h</span> " . ltrim(gmdate("i", $arr['results']['day_length']), 0) . " <span class=\"unit\">min</span>";

echo " <span class=\"label\">Sunrise</span> <span class=\"value\">" . $sunrise->format('G.i') . "</span>";
echo " &nbsp;<span class=\"label\">set</span> <span class=\"value\">" . $sunset->format('G.i') . "</span>";
echo " &nbsp;<span class=\"label\">day length</span> <span class=\"value\">" . $dayLength . "</span>";
