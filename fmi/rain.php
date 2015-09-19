<?php

/*
Debug:
http://localhost/data-dashboard/fmi/rain.php?debug

Normal:
http://localhost/data-dashboard/fmi/rain.php

*/

$indexValues['250-120-255'] = 50;
$indexValues['255-80-60'] = 40;
$indexValues['255-150-50'] = 34;
$indexValues['155-205-20'] = 28;
$indexValues['240-240-20'] = 22;
$indexValues['140-230-20'] = 18;
$indexValues['5-205-170'] = 10;
$indexValues['10-155-225'] = 4;

$masterIndex = 0;
$masterCover = 0;

$divider = 100;

// ----------------------

// TODO: more change-tolerant way of getting the file?
$testbedHTML = file_get_contents("http://testbed.fmi.fi/");

$start = strpos($testbedHTML, '<img src="data/area/radar/temperature/');
$end = strpos($testbedHTML, '.png" width=600 height=508 border=0');

$len = $end - $start;

$imageUrl = "http://testbed.fmi.fi/" . substr($testbedHTML, $start+10, $len-6);
//echo $imageUrl;

$im = imagecreatefrompng($imageUrl);
//$im = imagecreatefrompng("testbed-testdata.png"); // debug

$color = imagecolorallocate ( $im , 0xFF , 0x00 , 0x00 );


// DEBUG
//imageline ( $im , 186 , 150 , 385 , 349 , $color ); // 200*200 px diagonal line, centered on Kauklahti


if (isset($_GET['debug']))
{
	// 200*200 px box, centered on Kauklahti
	imageline ( $im , 186 , 150 , 385 , 150 , $color );
	imageline ( $im , 385 , 150 , 385 , 349 , $color );
	imageline ( $im , 385 , 349 , 186 , 349 , $color );
	imageline ( $im , 186 , 349 , 186 , 150 , $color );

	if ($im)
	{
	  header("Content-type: image/png");
	  imagepng($im);
	}
}

$allCover = 200 * 200; // defines amount of pixels

for ($y=150; $y <= 349; $y++)
{ 
	for ($x=186; $x <= 385; $x++)
	{ 
		$colorIndex = imagecolorat ( $im , $x , $y );
		$rgb = imagecolorsforindex($im, $colorIndex);
//		print_r ($rgb);
		add2index($rgb);
		imagesetpixel ( $im , $x , $y , $color );
	}
//	echo "row $y / masterIndex: " . ($masterIndex / $divider) . "<br />\n";
}

echo "<div class=\"widget\" id=\"d-rain\">
 <span class=\"label\">Rain Σ</span> <span class=\"value\">" . round(($masterIndex / $divider), 0) . " </span><span class=\"unit\">dBZ</span>
 &nbsp;<span class=\"label\">cover</span> <span class=\"value\">" . round(($masterCover * 100 / $allCover), 0) . "</span><span class=\"unit\">%</span>
 &nbsp;<span class=\"label\">average</span> <span class=\"value\">" . round(($masterIndex / $masterCover), 0) . " </span><span class=\"unit\">dBZ</span>
</div>";


function add2index($rgb)
{
	global $indexValues;
	global $masterIndex;
	global $masterCover;

	$rgbString = $rgb['red'] . "-" . $rgb['green'] . "-" . $rgb['blue'];

	if (@$indexValues[$rgbString] > 0)
	{
		$masterIndex = $masterIndex + $indexValues[$rgbString];
		$masterCover++;
	}

	//		print_r ($rgb);

}



?>