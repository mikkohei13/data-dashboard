<?php

$im = imagecreatefrompng("testbed-testdata.png");

if ($im)
{
  header("Content-type: image/png");
  imagepng($im);
}
