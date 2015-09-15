<?php

include "mast.php";



?>

<style>
#box
{
	border: 1px solid blue;
	position: relative;
	height: 400px;
}
#box div
{
	border: 1px solid lime;
	position: absolute;
	left: 0px;

}
</style>

<div id="box">
	<?php

	foreach ($measurements['TA'] as $h => $t)
	{
		echo "<div style=\"bottom: " . $h . "px; width: " . $t*5 . "px;\">$t</div>";
	}

	?>
</div>
