<?php
$ageInSeconds= 50; // una semana
$cache_drivers = '../drivers.json';

/* if(!file_exists($cache_drivers) || (filemtime($cache_drivers) < (time() - $ageInSeconds)) ) {
  $contents_1 = file_get_contents('http://ergast.com/api/f1/2022/driverStandings');
  $xml_drivers= simplexml_load_string($contents_1);
  $json_drivers = json_encode($xml_drivers); // convert the XML string to JSON

  file_put_contents($cache_drivers, $json_drivers);
}
$cache_constructors = './constructors.json';

if(!file_exists($cache_constructors) || filemtime($cache_constructors) < time() + $ageInSeconds) {
  $contents_2 = file_get_contents('http://ergast.com/api/f1/2022/constructorStandings');
  $xml_constructors = simplexml_load_string($contents_2);
  $json_constructors = json_encode($xml_constructors); // convert the XML string to JSON

  file_put_contents($cache_constructors, $json_constructors);
}  */
$cache_last_race = '../last_race.json';

if(!file_exists($cache_last_race) || filemtime($cache_last_race) < time() + $ageInSeconds) {
  $contents_3 = file_get_contents('http://ergast.com/api/f1/current/2/results');
  $xml_last_race= simplexml_load_string($contents_3);
  $json_last_race = json_encode($xml_last_race); // convert the XML string to JSON

  file_put_contents($cache_last_race, $json_last_race);
}
$cache_quali = '../quali.json';

if(!file_exists($cache_quali) || filemtime($cache_last_race) < time() + $ageInSeconds) {
  $contents_4 = file_get_contents('http://ergast.com/api/f1/2021/2/qualifying');
  $xml_quali= simplexml_load_string($contents_4);
  $json_quali = json_encode($xml_quali); // convert the XML string to JSON

  file_put_contents($cache_quali, $json_quali);
}
 
?>