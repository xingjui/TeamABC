<?php
require_once 'unirestLib/Unirest.php';
Unirest::verifyPeer(false);
//These code snippets use an open-source library. http://unirest.io/php
$response1 = Unirest::post("https://t2s.p.mashape.com/speech/",
  array(
    "X-Mashape-Key" => "K1i0TMRu0mmshSeGuMAOpNqgDuXbp1PTW2Ljsnngs7Aoe3zY2b",
    "Content-Type" => "application/x-www-form-urlencoded"
  ),
  array(
    "lang" => "en",
    "text" => "Hello world This is alvin."
  )
);

$response2 = Unirest::get("https://george-vustrey-weather.p.mashape.com/api.php?location=Selangor",
  array(
    "X-Mashape-Key" => "K1i0TMRu0mmshSeGuMAOpNqgDuXbp1PTW2Ljsnngs7Aoe3zY2b"
  )
);
var_dump($response1);
var_dump($response2);
?>	