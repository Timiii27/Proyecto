<?php

$cache_drivers = 'drivers.xml.cache';
// generate the cache version if it doesn't exist or it's too old!
$ageInSeconds_1 = 3600; // one hour
if(!file_exists($cache_drivers) || filemtime($cache_drivers) > time() + $ageInSeconds_1) {
  $contents = file_get_contents('http://ergast.com/api/f1/2022/driverStandings');
  file_put_contents($cache_drivers, $contents);
}
$cache_constructors = 'constructors.xml.cache';
// generate the cache version if it doesn't exist or it's too old!
$ageInSeconds_2 = 3600; // one hour
if(!file_exists($cache_constructors) || filemtime($cache_constructors) > time() + $ageInSeconds_2) {
  $contents = file_get_contents('http://ergast.com/api/f1/2022/constructorStandings');
  file_put_contents($cache_constructors, $contents);
}


?>