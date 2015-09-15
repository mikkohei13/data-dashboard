<?php

$im = imagecreatefrompng("testbed-testdata.png");

$color = imagecolorallocate ( $im , 0xFF , 0x00 , 0x00 );

imageline ( $im , 186 , 150 , 385 , 349 , $color ); // 200*200 px box, centered on Kauklahti

if ($im)
{
  header("Content-type: image/png");
  imagepng($im);
}
