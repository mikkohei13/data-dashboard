<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <title>Data dashboard</title>
    
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    
    <style type="text/css">
        * {
        	margin: 0;
        	padding: 0;
        	background-color: #000;
            color: #fff;
        }
           	
        p {
            text-align: center; 
            padding: 10px 0 0 0;
            }

        .widget
        {
            border: 1px solid cyan;
        }

        #d-clock
        {
            position: absolute;
            top: -150px; /* positioned this way because scaling leaves empty margins */
            left: -150px;
            z-index: 50;
        }

        #d-rain
        {

        }

        #d-mast
        {

        }
    </style>
    
</head>

<body>

<?php include_once "clock/index.php"; ?>
<?php include_once "fmi/mast.php"; ?>
<?php include_once "fmi/rain.php"; ?>
	
</body>
	
</html>

