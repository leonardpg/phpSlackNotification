<?php
/**
 * @author Pat Leonard <leonard.56@osu.edu>
 * @version 0.1
 */

include('Slack.php');

$slack = new Slack();
$slack->setURL('Incoming Hook URL goes here');
$slack->setMessage('Your words here');

$resp = $slack->send();
if ($resp) {
	echo "Message posted.\n";
} else {
	echo "An error occurred. Response Code: " . $slack->getResponseCode() . "\n";
} 

?>