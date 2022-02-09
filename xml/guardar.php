<?php

$cache_drivers = 'drivers.xml.cache';
$ageInSeconds_1 = 300; // una semana
if(!file_exists($cache_drivers) || (filemtime($cache_drivers) < (time() - $ageInSeconds_1)) ) {
  $contents_1 = file_get_contents('http://ergast.com/api/f1/2022/driverStandings');
  file_put_contents($cache_drivers, $contents_1);
}
$cache_constructors = 'constructors.xml.cache';
$ageInSeconds_2 = 302; // una semana
if(!file_exists($cache_constructors) || filemtime($cache_constructors) < time() + $ageInSeconds_2) {
  $contents_2 = file_get_contents('http://ergast.com/api/f1/2022/constructorStandings');
  file_put_contents($cache_constructors, $contents_2);
}
$cache_last_race = 'last_race.xml.cache';
$ageInSeconds_3 = 304; // una semana
if(!file_exists($cache_last_race) || filemtime($cache_last_race) < time() + $ageInSeconds_3) {
  $contents_3 = file_get_contents('http://ergast.com/api/f1/current/last/results');
  file_put_contents($cache_last_race, $contents_3);
}

?>