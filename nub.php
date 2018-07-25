<?php
require "vendor/autoload.php";
$access_token = 'bD/LUWMz3ny45E5H+FAvJX8YRaqZ70lE1m7GLeIPlOfG5hi69i7Bnkti2S+2FlHtyqfWtwlrPvH/deA8wxyye8Z96Cx+z1qerbRumV/EqNvY8mW/RfQXrbn7Volv3ZxBEqAftdYq4ZWuvQFXVmCEAAdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'b85b195d286c2f64822206d0787450b8';
$idPush = 'xxxxxx'
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($idPush, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
