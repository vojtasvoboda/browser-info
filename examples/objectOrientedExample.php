<?php

require 'Browser/Browser.php';
$browser = new Browser();

echo '<pre>';
echo 'UserAgent: ' . $userAgent . '<br />';
$platform = $browser->getPlatform();
echo 'Platform: ' . $platform[0] . ' ' . $platform[1];
echo '<br />';
$browser = $browser->getBrowser();
echo 'Browser: ' . $browser[0] . ' ' . $browser[1];
echo '<br />';
echo 'IP adress: ' . $browser->getIpAddress();
