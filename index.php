<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Data dashboard</title>

    <meta http-equiv="refresh" content="150">
    
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    
    <style type="text/css">
        body
        {
        	margin: 0;
        	padding: 0;
        	background-color: #000;
            color: #fff;
            font-size: 40px;
            font-family: 'Ubuntu Mono', 'Courier New', Courier, monospace, sans-serif;
        }
           	
        #main
        {
            width: 975px;
            height: 735px;

            position: relative;
/*                border: 1px solid red; */
        }

        .widget
        {
/*              border: 1px solid lime; */
            position: absolute;
        }

        #d-clock
        {
            top: -190px; /* positioned this way because scaling leaves empty margins */
            left: -170px;
            z-index: 50;
        }

        #d-trains
        {
            bottom: 120px;
            left: 0px;
        }

        #d-rain
        {
            bottom: 60px;
            left: 0px;
        }

        #d-sun
        {
            bottom: 0px;
            left: 0px;
        }

        .unit
        {
            color: #343;
        }
        .label
        {
            color: #9A9;
        }
        .value
        {

        }
    </style>
    
</head>

<body>

<div id="main">
    <?php include_once "clock/index.php"; ?>
    <?php include_once "fmi/mast.php"; ?>
    <?php include_once "fmi/rain.php"; ?>
    <?php include_once "sun/index.php"; ?>
    <?php include_once "trains/index.php"; ?>
</div>

</body>
	
</html>

