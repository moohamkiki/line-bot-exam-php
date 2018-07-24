<?php



require "vendor/autoload.php";

$access_token = 'O+Ic5Z/Mh+cp+mag4+XubhaxQOeXqSFyzi76Udsjt42LikpvP8Dl3y0/wfv3ahA6yqfWtwlrPvH/deA8wxyye8Z96Cx+z1qerbRumV/EqNspm3Y56oohLXlMnT2+4E7+pJ77/UKyNTV0ytlI6GbfFgdB04t89/1O/w1cDnyilFU=';

$channelSecret = 'b85b195d286c2f64822206d0787450b8';

$pushID = 'U6c7cae6af8e053c1b7ffa05d425b2fb7';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('ทัชอปป้าสวัสดีงับ(cony kiss)(cony kiss)(cony kiss)');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







