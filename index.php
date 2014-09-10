<?php

$userAgent = $_SERVER['HTTP_USER_AGENT'];

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
    } elseif (preg_match('/macintosh|mac os x/i', $userAgent)) {
        $platform = 'Mac OS';
    } elseif (preg_match('/windows|win32/i', $userAgent)) {
        $platform = 'Windows';
    }

    return $platform;
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
    $browser = false;
    if (preg_match('/MSIE/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
        $browser = 'Internet Explorer';
    } elseif (preg_match('/Firefox/i', $userAgent)) {
        $browser = 'Mozilla Firefox';
    } elseif (preg_match('/Chrome/i', $userAgent)) {
        $browser = 'Google Chrome';
    } elseif (preg_match('/Safari/i', $userAgent)) {
        $browser = 'Apple Safari';
    } elseif (preg_match('/Opera/i', $userAgent)) {
        $browser = 'Opera';
    } elseif (preg_match('/Netscape/i', $userAgent)) {
        $browser = 'Netscape';
    }

    return $browser;
}

echo '<pre>';
print_r(getPlatform($userAgent));
echo '<br />';
print_r(getBrowser($userAgent));
echo '<br />';
print_r($_SERVER);
