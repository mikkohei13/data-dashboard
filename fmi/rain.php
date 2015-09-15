<?php

$indexValues['250-120-255'] = 50;
$indexValues['255-80-60'] = 40;
$indexValues['255-150-50'] = 34;
$indexValues['155-205-20'] = 28;
$indexValues['240-240-20'] = 22;
$indexValues['140-230-20'] = 18;
$indexValues['5-205-170'] = 10;
$indexValues['10-155-225'] = 4;

$masterIndex = 0;

$im = imagecreatefrompng("testbed-testdata.png");

$color = imagecolorallocate ( $im , 0xFF , 0x00 , 0x00 );


// DEBUG
//imageline ( $im , 186 , 150 , 385 , 349 , $color ); // 200*200 px diagonal line, centered on Kauklahti

// 200*200 px box, centered on Kauklahti

/*
imageline ( $im , 186 , 150 , 385 , 150 , $color );
imageline ( $im , 385 , 150 , 385 , 349 , $color );
imageline ( $im , 385 , 349 , 186 , 349 , $color );
imageline ( $im , 186 , 349 , 186 , 150 , $color );

if ($im)
{
  header("Content-type: image/png");
  imagepng($im);
}
*/


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
	echo "row $y / masterIndex: " . $masterIndex . "<br />\n";
}



function add2index($rgb)
{
	global $indexValues;
	global $masterIndex;

	$rgbString = $rgb['red'] . "-" . $rgb['green'] . "-" . $rgb['blue'];

	if (@$indexValues[$rgbString] > 0)
	{
		$masterIndex = $masterIndex + $indexValues[$rgbString];
	}

	//		print_r ($rgb);

}

?>