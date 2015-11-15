<?php

include_once "mast-fetch.php";

?>

<style>

</style>

<!--	<span class="label">Latest</span> -->
	<?php

	$scaleStyle = "";

	if ($_GET['showscale'])
	{
		echo "TEMP:<br />";
		for ($x = -30; $x <= 30; $x++)
		{
			$style = setScaleStyle($x, "temp");
			echo "<p $style>$x</p>";
		}

		echo "WIND:<br />";
		for ($x = 0; $x <= 30; $x++)
		{
			$style = setScaleStyle($x, "wind");
			echo "<p $style>$x</p>";
		}

		end();
	}


	if (! empty($measurements))
	{
		$scale = 1.2;

		foreach ($measurements['TA'] as $h => $t)
		{
			$scaleStyle = setScaleStyle($t, "temp");
			echo "<span class=\"value\" $scaleStyle>$t</span><span class=\"unit\">&deg;C</span> ";
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
			$scaleStyle = setScaleStyle($t, "wind");
			echo "&nbsp;<span class=\"value\" $scaleStyle>$t</span><span class=\"unit\">m/s</span> ";
			break;
		}
		foreach ($measurements['WS'] as $h => $t)
		{
			$scaleStyle = setScaleStyle($t, "wind");
			echo "&nbsp;<span class=\"value\" $scaleStyle>" . ms2bof($t) . "</span><span class=\"unit\">BFT</span> ";
			break;
		}
		foreach ($measurements['WD'] as $h => $t)
		{
			$t = $t + 180;
			echo "<strong><span class=\"value\" style=\"-webkit-transform: rotate(" . $t . "deg); display: inline-block; font-weight: bold;\">&#8593;</span></strong> ";
			break;
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

function setScaleStyle($val, $measurement)
{
	if ("temp" == $measurement)
	{
		$ret = "";
		if ($val < -25 ) 	 { $ret = "4e00b4"; }
		elseif ($val < -20 ) { $ret = "3500ff"; }
		elseif ($val < -15 ) { $ret = "2943ff"; }
		elseif ($val < -10 ) { $ret = "02a0ff"; }
		elseif ($val < -5 )  { $ret = "03fcff"; }
		elseif ($val < 0 )   { $ret = "02ffa5"; }
		elseif ($val < 5 )   { $ret = "05ff48"; }
		elseif ($val < 10 )  { $ret = "10ff00"; }
		elseif ($val < 15 )  { $ret = "6dff00"; }
		elseif ($val < 20 )  { $ret = "c9ff00"; }
		elseif ($val < 25 )  { $ret = "ffd700"; }
		elseif ($val < 30 )  { $ret = "ff7c02"; }
		else 				 { $ret = "ff2102"; }
	}
	elseif ("wind" == $measurement)
	{
		$ret = "";
		if ($val < 0.3 ) 	 { $ret = "4e00b4"; }
		elseif ($val < 1.5 ) { $ret = "3500ff"; }
		elseif ($val < 3.3 ) { $ret = "2943ff"; }
		elseif ($val < 5.5 ) { $ret = "02a0ff"; }
		elseif ($val < 8 )   { $ret = "03fcff"; }
		elseif ($val < 10.8 ){ $ret = "02ffa5"; }
		elseif ($val < 13.9 ){ $ret = "05ff48"; }
		elseif ($val < 17.2 ){ $ret = "10ff00"; }
		elseif ($val < 20.7 ){ $ret = "6dff00"; }
		elseif ($val < 24.5 ){ $ret = "c9ff00"; }
		elseif ($val < 28.4 ){ $ret = "ffd700"; }
		elseif ($val < 32.6 ){ $ret = "ff7c02"; }
		else 				 { $ret = "ff2102"; }
	}

	$ret = "style=\"border-bottom: 8px solid #$ret\"";
	return $ret;

/*
Rainbow colors

	1by1
1 	4e00b4
9 	3500ff
17 	2943ff
25 	02a0ff
33 	03fcff
41 	02ffa5
49 	05ff48
57	10ff00
65	6dff00
73	c9ff00
81 	ffd700
89 	ff7c02
97	ff2102

	3by3	1by1
0	5306b5	4e00b4
	3900db	3900db
10	3500ff	3500ff
	302cff	302cff
20	0b67ff	0668ff
	01a0ff	02a0ff
30	01daff	01dbff
	01ffe9	02ffe8
40	02ffb1	03ffb0
	01ff76	03ffb0
50 	03ff3c	02ff3c
	03ff06	01ff04
60	34ff00	33ff00
	6dff00	6dff00
70	a6ff00	a4ff00
	e0ff01	e0ff01
80	ffe300	ffe401
	ffaa00	ffaa01
90	ff7101	ff7001
	ff3800	ff3800
100	ff160a	ff1913


*/

}

function ms2bof($ms)
{
	if     ($ms < 0.3 ) { $bof = 0; }
	elseif ($ms < 1.5 ) { $bof = 1; }
	elseif ($ms < 3.3 ) { $bof = 2; }
	elseif ($ms < 5.5 ) { $bof = 3; }
	elseif ($ms < 8 )   { $bof = 4; }
	elseif ($ms < 10.8 ){ $bof = 5; }
	elseif ($ms < 13.9 ){ $bof = 6; }
	elseif ($ms < 17.2 ){ $bof = 7; }
	elseif ($ms < 20.7 ){ $bof = 8; }
	elseif ($ms < 24.5 ){ $bof = 9; }
	elseif ($ms < 28.4 ){ $bof = 10; }
	elseif ($ms < 32.6 ){ $bof = 11; }
	else 				{ $bof = 12; }

	return $bof;
}

