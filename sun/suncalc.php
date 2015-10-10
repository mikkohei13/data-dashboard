
<span class="label">Sunrise</span> <span class="value" id="sunrise"></span>
&nbsp;<span class="label">set</span> <span class="value" id="sunset"></span>
&nbsp;<span class="label">day length</span> <span class="value"></span>

<script>

<?php include 'vendor/suncalc-master/suncalc-wo-function.js'; ?>

var lat = 60.19;
var lng = 24.59;

var times = SunCalc.getTimes(new Date(), lat, lng);

// format times from the Date object
var sunriseStr = times.sunrise.getHours() + '.' + times.sunrise.getMinutes();
var sunsetStr = times.sunset.getHours() + '.' + times.sunset.getMinutes();

</script>
<script>

$( "#sunrise" ).text( sunriseStr );
$( "#sunset" ).text( sunsetStr );

</script>



<?php

/*
$dayLength = gmdate("G", $arr['results']['day_length']) . " <span class=\"unit\">h</span> " . ltrim(gmdate("i", $arr['results']['day_length']), 0) . " <span class=\"unit\">min</span>";

echo " <span class=\"label\">Sunrise</span> <span class=\"value\">" . $sunrise->format('G.i') . "</span>";
echo " &nbsp;<span class=\"label\">set</span> <span class=\"value\">" . $sunset->format('G.i') . "</span>";
echo " &nbsp;<span class=\"label\">day length</span> <span class=\"value\">" . $dayLength . "</span>";
*/