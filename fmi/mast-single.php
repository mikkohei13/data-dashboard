<?php

include_once "mast-fetch.php";

?>

<style>

</style>

<div class="widget" id="d-mast-single">
	<span class="label">Latest</span> 
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
		echo "<strong><span class=\"value\" style=\"-webkit-transform: rotate(" . $t . "deg); display: inline-block;\">&#8593;</span></strong> ";
		break;
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
//echo $datetime->format('Y-m-d H.i.s');
