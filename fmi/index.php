<?php

include "mast.php";



?>

<style>
#box
{
/*	border: 1px solid blue; */
	position: relative;
	height: 400px;
}
#box div
{
	padding: 2px;
	background-color: #eee;
	position: absolute;
}
.TA
{
	left: 0px;
}
.RH
{
	left: 60px;
}
.WS
{
	left: 120px;
}
.WD
{
	left: 180px;
	font-size: 120%;
}
</style>

<div id="box">
	<?php

	foreach ($measurements['TA'] as $h => $t)
	{
		echo "<div class=\"TA\" style=\"bottom: " . $h . "px;\">$t &deg;C</div>";
	}
	foreach ($measurements['RH'] as $h => $t)
	{
		$t = round($t, 0);
		echo "<div class=\"RH\" style=\"bottom: " . $h . "px;\">$t %</div>";
	}
	foreach ($measurements['WS'] as $h => $t)
	{
		echo "<div class=\"WS\" style=\"bottom: " . $h . "px;\">$t m/s</div>";
	}
	foreach ($measurements['WD'] as $h => $t)
	{
		$t = $t + 180;
		echo "<div class=\"WD\" style=\"bottom: " . $h . "px; -webkit-transform: rotate(" . $t . "deg);\">&#8593;</div>";
	}

/*
	foreach ($measurements['TA'] as $h => $t)
	{
		echo "<div style=\"bottom: " . $h . "px; width: " . $t*5 . "px;\">$t</div>";
	}
*/

	?>
</div>
<?php
echo $datetime->format('Y-m-d H.i.s');
