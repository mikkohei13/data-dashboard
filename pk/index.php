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

    <span class="addItem" data-item="s-sukat">S sukat</span>
    <span class="addItem" data-item="v-housut">V housut</span>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <script>
            <?php
                // Automatic base url, https://gist.github.com/mikkohei13/9312936
                $base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
                $base_url .= "://".$_SERVER['HTTP_HOST'];
                $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

                echo "var rootUrl = \"" . $base_url . "\";\n" // http://192.168.56.10/data-dashboard/pk/
            ?>

			var className = "";
            $( ".addItem" ).click(function() {
              className = $(this).attr('data-item');
			  logger(className);
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
			    console.log(loggerResponse);
			  });
			}
        </script>


    </body>
</html>
