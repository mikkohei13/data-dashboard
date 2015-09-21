<?php
date_default_timezone_set("Europe/Helsinki");
$url = "https://www.vr.fi/cs/Satellite?pagename=VRWeb/vrweb_asemasyote&station=KLH";

$xmlString = file_get_contents($url);

//echo $xmlString;

$xml = simplexml_load_string($xmlString);

$nowTimeInt = date("Gi");
//echo $nowTimeInt;

echo "<div id=\"d-trains\" class=\"widget\">";
echo "<span class=\"label\">Trains:</span> ";

foreach($xml->channel->item as $train)
{
	if ($train->toStation == "HKI")
	{

		// TODO: This comparison doesn't work after midnight with trains leaving before midnight
		$trainTimeInt = str_replace(":", "", $train->etd); // trim leading zeros?
		if ($trainTimeInt > $nowTimeInt)
		{
//			echo (string) $train->guid . " ";
			echo "&nbsp;<span class=\"value\">" . (string) $train->title . " ";
			if ($train->status == 5)
			{
				echo "<span class=\"cancelled\">peruttu</span>";
			}
			else
			{
				echo "<span class=\"\">" . str_replace(":", ".", $train->etd) . "</span>";
			}
			echo "</span> ";			
		}
		/*
		else
		{
			echo "mennyt juna" . (string) $train->guid;
		}
		*/
	}
}

echo "</div>";

/*
Notes on API
status 1 = normaalitila
status 5 = peruttu

category = 2

lateness = 0

completed = 1

cat = H

<item>
<guid isPermaLink="false">H8323
</guid>
<category>2
</category>
<title>E
</title>
<description>Summary
</description>
<pubDate>Fri, 18 Sep 2015 08:02:01 +0300
</pubDate>
<eta>08:54
</eta>
<etd>08:54
</etd>
<status>5
</status>
<scheduledTime>08:54
</scheduledTime>
<scheduledDepartTime>08:54
</scheduledDepartTime>
<fromStation>HKI
</fromStation>
<toStation>KLH
</toStation>
<reasonCode/>
<lateness>0
</lateness>
<completed>1
</completed>
<cat>H
</cat>
<georss:point>0 0
</georss:point>
</item>

*/