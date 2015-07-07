<?php
/**
 * Configuration
 * @package Food Recalls Dashboard
 * @author OneSpring.net
 * @copyright 2015
 * @version Id: config.php, v1.00 2015-06-29 10:12:05
 */
  if (!defined("_VALID_PHP"))
      die('Direct access to this location is not allowed.');
    //error_reporting(E_ALL);

    $url = $_SERVER['REQUEST_URI']; //returns the current URL
    $parts = explode('/',$url);
    $dir = $_SERVER['SERVER_NAME'];
    for ($i = 0; $i < count($parts) - 1; $i++) {
        $dir .= $parts[$i] . "/";
    }
    // Automatically set the base URL of the dashboard... Change to https if needed
    $BASEURL = "http://".$dir;
    $API_BASEURL = "https://api.fda.gov/food/enforcement.json?";

    define("BASEURL", $BASEURL);
    define("API_BASEURL", $API_BASEURL);