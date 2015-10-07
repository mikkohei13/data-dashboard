<?php

include_once "mast-fetch.php";

?>

<style>
#d-mast
{
/*	border: 1px solid blue; */
	position: absolute;
	right: 0;
	height: 430px;
	width: 280px;
	font-size: 20px;
}
#d-mast div
{
	padding: 2px;
	position: absolute;
}
.TA
{
	right: 0px;
}
.RH
{
	right: 70px;
}
.WS
{
	right: 120px;
}
.WD
{
	right: 200px;
	font-size: 140%;
	font-weight: bold;
	margin-bottom: -8px;
}
</style>

	<?php

	if (! empty($measurements))
	{
		$scale = 1.2;

		foreach ($measurements['TA'] as $h => $t)
		{
			echo "<div class=\"TA\" style=\"bottom: " . $h*$scale . "px;\"><span class=\"value\">$t</span><span class=\"unit\">&deg;C</span></div>";
		}
		foreach ($measurements['RH'] as $h => $t)
		{
			$t = round($t, 0);
			echo "<div class=\"RH\" style=\"bottom: " . $h*$scale . "px;\"><span class=\"value\">$t</span><span class=\"unit\">%</span></div>";
		}
		foreach ($measurements['WS'] as $h => $t)
		{
			echo "<div class=\"WS\" style=\"bottom: " . $h*$scale . "px;\"><span class=\"value\">$t</span><span class=\"unit\">m/s</span></div>";
		}
		foreach ($measurements['WD'] as $h => $t)
		{
			$t = $t + 180;
			echo "<div class=\"WD\" style=\"bottom: " . $h*$scale . "px; -webkit-transform: rotate(" . $t . "deg);\"><span class=\"value\">&#8593;</span></div>";
		}

	/*
		foreach ($measurements['TA'] as $h => $t)
		{
			echo "<div style=\"bottom: " . $h . "px; width: " . $t*5 . "px;\">$t</div>";
		}
	*/
	}
	else
	{
		echo "<!-- Mastohavaintoja ei saatavilla -->";
	}

	?>
<?php
//echo $datetime->format('Y-m-d H.i.s');
