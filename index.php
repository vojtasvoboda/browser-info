<?php

// phpbrowscap follows the PSR-0 standard, so just require the composer autoload
require 'vendor/autoload.php';

// The Browscap class is in the phpbrowscap namespace, so import it
use phpbrowscap\Browscap;

// Create a new Browscap object (loads or creates the cache)
$bc = new Browscap('log/');

// Get information about the current browser's user agent
$current_browser = $bc->getBrowser();

// Output the result
echo '<pre>'; // some formatting issues ;)
print_r($current_browser);
echo '</pre>';
