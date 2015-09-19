<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Data dashboard</title>
    
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    
    <style type="text/css">
        body
        {
        	margin: 0;
        	padding: 0;
        	background-color: #000;
            color: #fff;
            font-size: 40px;
            font-family: Helvetica;
        }
           	
        #main
        {
            width: 976px;
            height: 736px;
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
            left: 10px;
        }

        #d-rain
        {
            bottom: 60px;
            left: 10px;
        }

        #d-sun
        {
            bottom: 0px;
            left: 10px;
        }

        .unit
        {
            color: #666;
        }
        .label
        {
            color: #999;
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

