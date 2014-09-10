<?php

$userAgent = $_SERVER['HTTP_USER_AGENT'];
$userIpAddress = $_SERVER['REMOTE_ADDR'];

/**
 * Return users platform
 *
 * @param $userAgent
 *
 * @return bool|string
 */
function getPlatform($userAgent)
{
    $platform = false;
    if (preg_match('/linux/i', $userAgent)) {
        $platform = 'Linux';
    } elseif (preg_match('/mac os x/i', $userAgent)) {
        $reg = 'Mac OS X';
        $platform = 'Mac OS';
    } elseif (preg_match('/macintosh/i', $userAgent)) {
        $reg = 'Macintosh';
        $platform = 'Mac OS';
    } elseif (preg_match('/windows/i', $userAgent)) {
        $reg = 'Windows';
        $platform = 'Windows';
    } elseif (preg_match('/win32/i', $userAgent)) {
        $reg = 'Win32';
        $platform = 'Windows';
    }

    return array(
        $platform,
        getPlatformVersion($userAgent, $reg),
    );
}

/**
 * Get platform version
 *
 * @param $userAgent
 * @param $name
 *
 * @return array
 */
function getPlatformVersion($userAgent, $name)
{
    $start = strpos($userAgent, $name) + strlen($name);
    $stop = strpos($userAgent, ')');
    $version = substr($userAgent, $start + 1, $stop - $start - 1);
    $explode = explode(';', $version);

    return str_replace('_', '.', $explode[0]);
}

/**
 * Return users browser
 *
 * @param $userAgent
 *
 * @return bool|string
 */
function getBrowser($userAgent)
{
    // get browser name
    $browser = false;
    if (preg_match('/MSIE/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
        $browserName = 'Internet Explorer';
        $browser = 'MSIE';
    } elseif (preg_match('/Firefox/i', $userAgent)) {
        $browserName = 'Mozilla Firefox';
        $browser = 'Firefox';
    } elseif (preg_match('/Chrome/i', $userAgent)) {
        $browserName = 'Google Chrome';
        $browser = 'Chrome';
    } elseif (preg_match('/Safari/i', $userAgent)) {
        $browserName = 'Apple Safari';
        $browser = 'Safari';
    } elseif (preg_match('/Opera/i', $userAgent)) {
        $browserName = 'Opera';
        $browser = 'Opera';
    } elseif (preg_match('/Netscape/i', $userAgent)) {
        $browserName = 'Netscape';
        $browser = 'Netscape';
    } elseif (preg_match('/Konqueror/i', $userAgent)) {
        $browserName = 'Konqueror';
        $browser = 'Konqueror';
    }

    // get the correct version number
    $known = array('Version', $browser, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $userAgent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        // we will have two since we are not using 'other' argument yet
        // see if version is before or after the name
        if (strripos($userAgent, "Version") < strripos($userAgent, $browser)) {
            $version = $matches['version'][0];
        } else {
            $version = $matches['version'][1];
        }
    } else {
        $version = $matches['version'][0];
    }

    return array(
        $browserName,
        $version,
    );
}

echo '<pre>';
echo 'UserAgent: ' . $userAgent . '<br />';
$platform = getPlatform($userAgent);
echo 'Platform: ' . $platform[0] . ' ' . $platform[1];
echo '<br />';
$browser = getBrowser($userAgent);
echo 'Browser: ' . $browser[0] . ' ' . $browser[1];
echo '<br />';
echo 'IP adress: ' . $userIpAddress;
