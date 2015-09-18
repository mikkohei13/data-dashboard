<?php
date_default_timezone_set("Europe/Helsinki");
$url = "https://www.vr.fi/cs/Satellite?pagename=VRWeb/vrweb_asemasyote&station=KLH";

$xmlString = file_get_contents($url);

//echo $xmlString;

$xml = simplexml_load_string($xmlString);

$nowTimeInt = date("Gi");
//echo $nowTimeInt;

foreach($xml->channel->item as $train)
{
	if ($train->toStation == "HKI")
	{
		$trainTimeInt = str_replace(":", "", $train->etd); // trim leading zeros?
		if ($trainTimeInt > $nowTimeInt)
		{
//			echo (string) $train->guid . " ";
			echo "<span class=\"label\">" . (string) $train->title . "</span> ";
			if ($train->status == 5)
			{
				echo "<span class=\"value cancelled\">peruttu</span>";
			}
			else
			{
				echo "<span class=\"value\">" . str_replace(":", ".", $train->etd) . "</span>";
			}
			echo "<br />";			
		}
		/*
		else
		{
			echo "mennyt juna" . (string) $train->guid;
		}
		*/
	}
}

/*
Notes on API
status 5 = peruttu

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