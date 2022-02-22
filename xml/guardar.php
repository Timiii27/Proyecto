<?php

$cache_drivers = 'drivers.json';
$ageInSeconds_1 = 1000; // una semana
if(!file_exists($cache_drivers) || (filemtime($cache_drivers) < (time() - $ageInSeconds_1)) ) {
  $contents_1 = file_get_contents('http://ergast.com/api/f1/2022/driverStandings');
  $xml_drivers= simplexml_load_string($contents_1);
  $json_drivers = json_encode($xml_drivers); // convert the XML string to JSON

  file_put_contents($cache_drivers, $json_drivers);
}
$cache_constructors = 'constructors.json';
$ageInSeconds_2 = 1000; // una semana
if(!file_exists($cache_constructors) || filemtime($cache_constructors) < time() + $ageInSeconds_2) {
  $contents_2 = file_get_contents('http://ergast.com/api/f1/2022/constructorStandings');
  $xml_constructors = simplexml_load_string($contents_2);
  $json_constructors = json_encode($xml_constructors); // convert the XML string to JSON

  file_put_contents($cache_constructors, $json_constructors);
}
$cache_last_race = 'last_race.json';
$ageInSeconds_3 = 1000; // una semana
if(!file_exists($cache_last_race) || filemtime($cache_last_race) < time() + $ageInSeconds_3) {
  $contents_3 = file_get_contents('http://ergast.com/api/f1/current/last/results');
  $xml_last_race= simplexml_load_string($contents_3);
  $json_last_race = json_encode($xml_last_race); // convert the XML string to JSON

  file_put_contents($cache_last_race, $json_last_race);
}

?>