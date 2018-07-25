<?php
    $accessToken = "OKp94drK8e/Vjgx6U8cQj8HmpzeREco9LNFv+4F7UUM+12pfhS+f9P0X2qD4N6CDyqfWtwlrPvH/deA8wxyye8Z96Cx+z1qerbRumV/EqNt5QbrdSe0+IIJCMTBHy/SvwwqdcDPr2iA2HforJPLWWQdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
#ตัวอย่าง Message Type "Text"
    if($message == "cause"||"No"||"no"||"num"||"Cause"||"CAUSE"||"Num"||"NUM"||"."||"help"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "1 - Unallocated (unassigned) number.\n2 - No route to specified transit network (national use).\n3 - No route to destination.\nCause No. 4 - send special information tone.\nCause No. 5 - misdialed trunk prefix (national use).\nCause No. 6 - channel unacceptable.\nCause No. 7 - call awarded. being delivered in an established channel.\nCause No. 8 - preemption.\nCause No. 9 - preemption - circuit reserved for reuse\n";
        replyMsg($arrayHeader,$arrayPostData);     
    }
     else if($message == "1EN"or"1en"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "Cause No. l - Unallocated (unassigned) number.";
        $arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "This cause indicates that the destination requested by the calling user cannot be reached because, although the number is in a valid format, it is not currently assigned (allocated).";
        $arrayPostData['messages'][2]['type'] = "text";
        $arrayPostData['messages'][2]['text'] = "What it usually means:\n 1.The SPIDS may be incorrectly entered in the router or the Telco switch, giving a SPID failure in the router logs.\n 2.The ISDN phone number being dialed by the router is invalid and the telco switch cannot locate the number to complete the call, as it is invalid.\n 3.On long distance calls, the call cannot be properly routed to its destination.";
         replyMsg($arrayHeader,$arrayPostData);
    }
#else if($message == "1EN"or"1en"){
        #$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        #$arrayPostData['messages'][0]['type'] = "text";
        #$arrayPostData['messages'][0]['text'] = "Cause No. l - Unallocated (unassigned) number.";
        #$arrayPostData['messages'][1]['type'] = "text";
        #$arrayPostData['messages'][1]['text'] = "This cause indicates that the destination requested by the calling user cannot be reached because, although the number is in a valid format, it is not currently assigned (allocated).";
        #$arrayPostData['messages'][2]['type'] = "text";
        #$arrayPostData['messages'][2]['text'] = "What it usually means:\n 1.The SPIDS may be incorrectly entered in the router or the Telco switch, giving a SPID failure in the router logs.\n 2.The ISDN phone number being dialed by the router is invalid and the telco switch cannot locate the number to complete the call, as it is invalid.\n 3.On long distance calls, the call cannot be properly routed to its destination.";
         #replyMsg($arrayHeader,$arrayPostData);
    #}
function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }

   exit;
?>
