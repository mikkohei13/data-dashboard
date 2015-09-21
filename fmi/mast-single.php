<?php

include_once "mast-fetch.php";

?>

<style>

</style>

<div class="widget" id="d-mast-single">
	<span class="label">Latest: 
	<?php

	$scale = 1.2;

	foreach ($measurements['TA'] as $h => $t)
	{
		echo "<span class=\"value\">$t</span><span class=\"unit\">&deg;C</span> ";
		break;
	}
	foreach ($measurements['RH'] as $h => $t)
	{
		$t = round($t, 0);
		echo "&nbsp;<span class=\"value\">$t</span><span class=\"unit\">%</span> ";
		break;
	}
	foreach ($measurements['WS'] as $h => $t)
	{
		echo "&nbsp;<span class=\"value\">$t</span> <span class=\"unit\">m/s</span> ";
		break;
	}
	foreach ($measurements['WD'] as $h => $t)
	{
		$t = $t + 180;
		echo "&nbsp;<span class=\"value\" style=\"-webkit-transform: rotate(" . $t . "deg);\">&#8593;</span> ";
		break;
	}

/*
	foreach ($measurements['TA'] as $h => $t)
	{
		echo "<div style=\"bottom: " . $h . "px; width: " . $t*5 . "px;\">$t</div>";
	}
*/

	?>
	</span>
</div>
<?php
//echo $datetime->format('Y-m-d H.i.s');
