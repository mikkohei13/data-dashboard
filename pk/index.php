<?php
header('Content-Type: text/html; charset=utf-8');
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Päiväkoti</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
    </head>
    <body>

    <div id="addedItem"></div>

	<div>
		<h3>Verna</h3>
	    <span class="addItem" data-item="v-paita">Paita</span>
	    <span class="addItem" data-item="v-housut">Housut</span>
	    <span class="addItem" data-item="v-kura">Kuravaate</span>
	    <span class="addItem" data-item="v-kertsi">Kertsejä</span>
	    <span class="addItem" data-item="v-paperi">Paperi</span>
	    <span class="addItem" data-item="v-muu">Muu</span>
	</div>

	<div>
		<h3>Silva</h3>
	    <span class="addItem" data-item="s-paita">Paita</span>
	    <span class="addItem" data-item="s-housut">Housut</span>
	    <span class="addItem" data-item="s-kura">Kuravaate</span>
	    <span class="addItem" data-item="s-paperi">Paperi</span>
	    <span class="addItem" data-item="s-muu">Muu</span>
	</div>

	<div>
		<h3>Listalla nyt:</h3>
		<div id="currentList"></div>
	</div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <script>
            <?php
                // Automatic base url, https://gist.github.com/mikkohei13/9312936
                $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
                $base_url .= "://".$_SERVER['HTTP_HOST'];
                $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

                echo "var rootUrl = \"" . $base_url . "\";\n" // http://192.168.56.10/data-dashboard/pk/
            ?>

            // Load list of items on startup
	        $.get( "api.php", { action: "readlist" }, function( readResponse ) {
			  	$( "#currentList" ).html(readResponse);
			    console.log("start: " + readResponse);
			});


			var className = "";

			// Add item and update list of items
            $( ".addItem" ).click(function() {
              className = $(this).attr('data-item');
			  logger(className);

			  // get data from url
			  // add content to element
			});

			/*

            $( "#s-sukat" ).click(function() {
			  logger("s-sukat");
			});
            $( "#v-housut" ).click(function() {
			  logger("v-housut");
			});
			*/

            function logger(logData)
			{
			//  console.log(navigator);
			//  console.log(window);

			  $.get( "api.php", { action: "add", item: logData }, function( loggerResponse ) {
			    console.log("added: " + loggerResponse);

			    // show what was added
  			 	$( "#addedItem" ).html("Added <strong>" + logData + "</strong>");

			    // update list of items
			    $.get( "api.php", { action: "readlist" }, function( readResponse ) {
  			  		$( "#currentList" ).html(readResponse);
  			    	console.log("current: " + readResponse);
			  	});

			  });
			}
        </script>


    </body>
</html>
