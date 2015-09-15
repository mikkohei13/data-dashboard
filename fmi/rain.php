<?php

$im = imagecreatefrompng("testbed-testdata.png");

$color = imagecolorallocate ( $im , 0xFF , 0x00 , 0x00 );

//imageline ( $im , 186 , 150 , 385 , 349 , $color ); // 200*200 px diagonal line, centered on Kauklahti

// 200*200 px box, centered on Kauklahti
imageline ( $im , 186 , 150 , 385 , 150 , $color );
imageline ( $im , 385 , 150 , 385 , 349 , $color );
imageline ( $im , 385 , 349 , 186 , 349 , $color );
imageline ( $im , 186 , 349 , 186 , 150 , $color );

for ($y=150; $y <= 349; $y++)
{ 
	for ($x=186; $x <= 385; $x++)
	{ 
		imagesetpixel ( $im , $x , $y , $color );
	}
}


if ($im)
{
  header("Content-type: image/png");
  imagepng($im);
}
