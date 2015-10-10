
<span class="label">Sunrise</span> <span class="value" id="sunrise"></span>
&nbsp;<span class="label">set</span> <span class="value" id="sunset"></span>
&nbsp;<span class="label">day length</span> <span class="value" id="daylength"></span>
<br />
<span class="label">noon</span> <span class="value" id="noon"></span>
&nbsp;<span class="label">night</span> <span class="value" id="night"></span>
&nbsp;<span class="label">nadir</span> <span class="value" id="nadir"></span>

<script>

<?php include 'vendor/suncalc-master/suncalc-wo-function.js'; ?>

function dhm(t){
    var cd = 24 * 60 * 60 * 1000,
        ch = 60 * 60 * 1000,
        d = Math.floor(t / cd),
        h = Math.floor( (t - d * cd) / ch),
        m = Math.round( (t - d * cd - h * ch) / 60000),
        pad = function(n){ return n < 10 ? '0' + n : n; };
  if( m === 60 ){
    h++;
    m = 0;
  }
  if( h === 24 ){
    d++;
    h = 0;
  }
  return pad(h) +' h ' + pad(m) + ' min';
}

function leadingZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}


var lat = 60.19;
var lng = 24.59;

// TIMES
var times = SunCalc.getTimes(new Date(), lat, lng);

// format times from the Date object
var sunriseStr = times.sunrise.getHours() + '.' + leadingZero(times.sunrise.getMinutes());
var sunsetStr = times.sunset.getHours() + '.' + leadingZero(times.sunset.getMinutes());

var dayLengthMillisec =  times.sunset.getTime() - times.sunrise.getTime();
var dayLengthStr = dhm(dayLengthMillisec);

var noonStr = times.solarNoon.getHours() + '.' + leadingZero(times.solarNoon.getMinutes());
var nightStr = times.night.getHours() + '.' + leadingZero(times.night.getMinutes());
var nadirStr = times.nadir.getHours() + '.' + leadingZero(times.nadir.getMinutes());

</script>
<script>

$( "#sunrise" ).text( sunriseStr );
$( "#sunset" ).text( sunsetStr );
$( "#daylength" ).text( dayLengthStr );
$( "#noon" ).text( noonStr );
$( "#night" ).text( nightStr );
$( "#nadir" ).text( nadirStr );

</script>



<?php

/*
$dayLength = gmdate("G", $arr['results']['day_length']) . " <span class=\"unit\">h</span> " . ltrim(gmdate("i", $arr['results']['day_length']), 0) . " <span class=\"unit\">min</span>";

echo " <span class=\"label\">Sunrise</span> <span class=\"value\">" . $sunrise->format('G.i') . "</span>";
echo " &nbsp;<span class=\"label\">set</span> <span class=\"value\">" . $sunset->format('G.i') . "</span>";
echo " &nbsp;<span class=\"label\">day length</span> <span class=\"value\">" . $dayLength . "</span>";
*/