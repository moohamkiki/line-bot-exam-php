<?php
$access_token = 'fC61xWc4hmBLaZepCXJIZaSdUZLXc/jzv7H2YAqcIzo0lqmzMX5Wkc0aoWoarUAgyqfWtwlrPvH/deA8wxyye8Z96Cx+z1qerbRumV/EqNuFdSLZoFHK2wECs0kLY0f2pwpK7dMv/fS2mnoqO9kNJwdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
