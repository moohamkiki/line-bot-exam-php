<?php



require "vendor/autoload.php";

$access_token = 'fz6k1nlg7WMZUPIq7poinhHOFt/ZfegTEe78HuvQiYjLJsRxBcbdICTSBWg5aNeOyqfWtwlrPvH/deA8wxyye8Z96Cx+z1qerbRumV/EqNvTizXLx7YfRlq0DGaINpDw9UbHI9oRYcVkoUn8oig3HwdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'b85b195d286c2f64822206d0787450b8';

$pushID = 'U6c7cae6af8e053c1b7ffa05d425b2fb7';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('ทัชอปป้าสวัสดีงับ');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







