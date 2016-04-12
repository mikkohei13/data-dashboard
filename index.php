<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Data dashboard</title>

    <meta http-equiv="refresh" content="300">
    
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
            top: -210px; /* positioned this way because scaling leaves empty margins */
            left: -190px;
            z-index: 50;
        }

        #d-mast-single
        {
            font-size: 50px;
            bottom: 240px;
            left: 0px;
            font-weight: bold;
        }
        
        /*
        #d-rain
        {
            bottom: 180px;
            left: 0px;
        }
        */

        #d-suncalc
        {
            bottom: 120px;
            left: 0px;
                width: 100%;
            line-height: 120%;
        }

        #d-suncalc p
        {
            margin: 0;
        }

        #sunazimutharrow, #sunazimuthhomearrow
        {
            display: inline-block;
            font-weight: bold;
        }

        /*
        #d-sun
        {
            bottom: 120px;
            left: 0px;
        }
        */

        #d-bus
        {
            bottom: 60px;
            left: 0px;
        }

        #d-trains
        {
            bottom: 0px;
            left: 0px;
        }

        #d-birds
        {
            bottom: 310px;
            left: 0px;
        }


        .unit
        {
            color: #343; /* too dark */
            color: #676;
        }
        .label
        {
            color: #9A9;
        }
        .value
        {

        }

        #rainmap
        {
            position: absolute;
            z-index: 99;
            width: 300px;
            height: 254px;
            left: 250px;
            top: 10px;
            border-radius: 10px;
            /*
            bottom: 200px;
            right: 200px;
                border: 1px solid red;
            */
        }

        #aurora_hov
        {
            position: absolute;
            z-index: 50;
            width: 200px;
            height: 150px;
            left: 260px;
            top: 270px;
                left: 555px;
                top: 10px;
            border-radius: 10px;
        }
        #aurora_dyn
        {
            position: absolute;
            z-index: 50;
            width: 200px;
            height: 150px;
            left: 260px;
            top: 270px;
                left: 555px;
                top: 160px;
            border-radius: 10px;
        }

        .cancelled, .late
        {
            color: #d00;
        }

    </style>

    <script>

        $.get( "fmi/mast.php", function( data ) {
          $( "#d-mast" ).html( data );
        });
        $.get( "fmi/mast-single.php", function( data ) {
          $( "#d-mast-single" ).html( data );
        });
        $.get( "bus/index.php", function( data ) {
          $( "#d-bus" ).html( data );
        });
        /*
        $.get( "sun/index.php", function( data ) {
          $( "#d-sun" ).html( data );
        });
        */
        $.get( "trains/index.php", function( data ) {
          $( "#d-trains" ).html( data );
        });
        /*
        $.get( "fmi/rain.php", function( data ) {
          $( "#d-rain" ).html( data );
        });
        */
        $.get( "linnut-slave/espoolajit.php", function( data ) {
          $( "#d-birds" ).html( data );
        });

    </script>
    
</head>

<body>

<div id="main">

    <div class="widget" id="d-mast"></div>
    <div class="widget" id="d-mast-single"></div>
    <div class="widget" id="d-bus"></div>
<!--    <div class="widget" id="d-sun"></div>-->
    <div id="d-trains" class="widget"></div>
    <div class="widget" id="d-birds"></div>

<!--    <div class="widget" id="d-rain"></div>-->

    <div id="d-clock" class="widget">
        <?php include_once "clock/index.php"; ?>
    </div>

    <div id="d-suncalc" class="widget">
        <?php include_once "sun/suncalc.php"; ?>
    </div>

    <?php if (!isset($_GET['public'])) { ?>
        <img src="fmi/rain.php?image" id="rainmap" />
        <img src="auroras/?loc=HOV" id="aurora_hov" />
        <img src="auroras/?loc=DYN" id="aurora_dyn" />
    <?php } ?>
</div>

</body>
</html>

