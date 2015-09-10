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
        }
        
        #clock {
        	position: relative;
        	width: 600px;
        	height: 600px;
        	margin: 20px auto 0 auto;
        	background: url(images/clock/clockface.jpg);
        	list-style: none;
        	}
        
        #sec, #min, #hour {
        	position: absolute;
        	width: 30px;
        	height: 600px;
        	top: 0px;
        	left: 285px;
        	}
        
        #sec {
        	background: url(images/clock/sechand.png);
        	z-index: 1;
        	opacity: 0.2;
           	}
        #sec img
        {
			
        }
           
        #min {
        	background: url(images/clock/minhand.png);
        	z-index: 4;
           	}
           
        #hour {
        	background: url(images/clock/hourhand.png);
        	z-index: 2;
           	}
           	
        p {
            text-align: center; 
            padding: 10px 0 0 0;
            }
    </style>
    
    <script src="vendor/CSS3Clock/script.js" type="text/javascript"></script>
    <!-- https://css-tricks.com/css3-clock/ -->

</head>

<body>

	<ul id="clock">	
	   	<li id="sec"></li>
	   	<li id="hour"></li>
		<li id="min"></li>
	</ul>
	
</body>
	
</html>

