
<?php

// example: https://github.com/onlinetuts/line-bot-api/blob/master/php/example/chapter-01.php

include ('line-bot-api/php/line-bot.php');

$channelSecret = 'b85b195d286c2f64822206d0787450b8';
$access_token  = 'bD/LUWMz3ny45E5H+FAvJX8YRaqZ70lE1m7GLeIPlOfG5hi69i7Bnkti2S+2FlHtyqfWtwlrPvH/deA8wxyye8Z96Cx+z1qerbRumV/EqNvY8mW/RfQXrbn7Volv3ZxBEqAftdYq4ZWuvQFXVmCEAAdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
	$bot->replyMessageNew($bot->replyToken, json_encode($bot->message));

	if ($bot->isSuccess()) {
		echo 'Succeeded!';
		exit();
	}

	// Failed
	echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
	exit();

}
?>
