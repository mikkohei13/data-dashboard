    <!--
    https://css-tricks.com/css3-clock/
    http://freedesignfile.com/40901-different-clock-design-vector-03/
        Creative Commons (Attribution 3.0)
    -->

    <style type="text/css">
       
        #clock {

        	width: 600px;
        	height: 600px;
        	background: url(clock/images/clockface.png);
        	list-style: none;
				-webkit-transform: scale(0.5,0.5); /* Safari */
				transform: scale(0.5,0.5);

        	}
        
        #sec, #min, #hour {
        	position: absolute;
        	width: 30px;
        	height: 600px;
        	top: 0px;
        	left: 285px;
        	}
        
        #sec {
        	background: url(clock/images/sechand.png);
        	z-index: 1;
        	opacity: 0.35;
           	}
        #sec img
        {
			
        }
           
        #min {
        	background: url(clock/images/minhand.png);
        	z-index: 4;
           	}
           
        #hour {
        	background: url(clock/images/hourhand.png);
        	z-index: 2;
           	}
           	
    </style>

    <script src="vendor/CSS3Clock/script.js" type="text/javascript"></script>

	<ul id="clock">	
	   	<li id="sec"></li>
	   	<li id="hour"></li>
		<li id="min"></li>
	</ul>
<